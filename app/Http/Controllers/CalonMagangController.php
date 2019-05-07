<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalonMagang;
use App\InfoMagang;
use App\Posisi;
use App\State;
use App\History;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\CalonMagangRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use WMS\src\Services\Parser;
use WMS\src\Services\StateManager;

class CalonMagangController extends Controller
{
    protected $userFlow,$userState,$getFlow,$currentState;

    public function __construct(){
    // public function __construct(StateManager $statemanager, $getFlow,$currentState) {
        // $stateManager = new StateManager();
        // $userFlow = $stateManager->getFlow($getFlow);
        // $userState = $stateManager->getStateDetail($currentState,$getFlow);
        // $det = $stateManager->nextState();
        // dd($det);
        $this->middleware('auth');
    }

    public function getAll(){
        $flowClasses = new Parser();
        $flow = $flowClasses->parseYaml();
        return $flow;
    }


    public function det($id){
        
        $user = DB::table('calon_magangs')
            ->join('states', 'calon_magangs.id', '=', 'states.user_id')
            ->select('calon_magangs.id','calon_magangs.flow', 'states.state')
            ->where('calon_magangs.id','=',$id)
            ->first();
        
        $history = DB::table('histories')
            ->select('passed_state','status','created_at')
            ->where('user_id','=',$id)
            ->get();

            // dd($history);

        $getFlow = $user->flow;
        $currentState = $user->state;

        $stateManager = new StateManager($getFlow);

        // $stateDetail = $stateManager->getStateDetail($currentState);
        // dd($stateDetail);
        $flow = $stateManager->getFlow();
        if ($currentState === "accepted" || $currentState === "rejected" ){
            $stateDetail = "end";
        }
        else{
            $stateDetail = $stateManager->getStateDetail($currentState);
        }
        // dd($stateDetail);

        return view('wms.detail',compact('user','flow','stateDetail','history'));
    }

    public function action($id, Request $request)
    {   
        // dd($request->all());
        $stateManager = new StateManager($request->flow);
        $stateDetail = array_keys($stateManager->getStateDetail($request->state));
        // dd($stateDetail[0]);
        $nextState = "";

        if($request->action === "approve"){
            $nextState = $stateDetail[0];
        }elseif($request->action === "reject"){
            $nextState = $stateDetail[1];
        }

        // UPDATE 2 TABEL
        $states = State::where('user_id', $id)->first();
        // dd($id);
        $userStatus = CalonMagang::where('id', $id)->first();

        $data_to_update = [
            'state' => $nextState
        ]; 
        $data_to_update_status = [
            'status' => $nextState
        ]; 
        $states->update($data_to_update);
        $userStatus->update($data_to_update_status);

        // CREATE pd tb HISTORY
        $history = History::create([
            'user_id' => $id,
            'passed_state' => $nextState,
            'status' => $request->action
        ]); 

        return redirect()->route('wms.detail', ["id" => $id]);
        // $someName = $request->someName; 
    }

   
    
    public function index(Builder $builder){  
        if (request()->ajax()) {            
            return DataTables::of(CalonMagang::with("posisi","infomagang"))
            ->addColumn('action', function ($calonmagang) { 
                return  
                '<a href="' . route("calonmagang.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-info mr-1"><i class="material-icons">visibility</i></a> 
                <a href="' . route("calonmagang.edit", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                <button data-id="' . $calonmagang->id .'" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a> </button>
                <a href="' . route("wms.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-secondary mr-1"><i class="material-icons">waves</i></a>  
                 ';
        })->addColumn('flow', function ($calonmagang) { 
                return '
                    <div class="btn-group" >
                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' .$calonmagang->flow. '
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow1(this)" type="button">Flow 1</button>
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow2(this)" type="button">Flow 2</button>
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow3(this)" type="button">Flow 3</button>
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow4(this)" type="button">Flow 4</button>
                        </div>
                    </div>';
            
        })->addColumn('status', function ($calonmagang) { 
            return  
            '<p class="badge badge-pill badge-success">'.$calonmagang->status.'</p>';
        })->rawColumns(['action','flow','status'])->toJson();
    }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama'],
            ['data' => 'posisi.nama_posisi', 'name' => 'posisi.nama_posisi', 'title' => 'Posisi'],
            ['data' => 'tgl_awal', 'name' => 'tgl_awal', 'title' => 'Tanggal Mulai'],
            ['data' => 'tgl_akhir', 'name' => 'tgl_akhir', 'title' => 'Tanggal Akhir'],
            ['data' => 'flow', 'name' => 'flow' , 'title' => 'flow'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);

        return view('calonmagang.calonmagang', compact('html'));
    }
    
    public function create()
    {
        $posisis = Posisi::all();
        $infos = InfoMagang::all();

        return view('calonmagang.createcalonmagang',compact('posisis','infos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|min:20|string',
            'alasan_posisi' => 'required|min:20|string',
            'kampus' => 'required|string',
            'nama' => 'required|min:3|string',
            'jurusan' => 'required|string',
            'tgl_awal'      => 'required|before:tgl_akhir',
            'tgl_akhir'     => 'required|after:tgl_awal',
            ]);

        $calon = CalonMagang::create([
            'kampus' => $request->kampus,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'telp' => $request->telp,
            'email' => $request->email,
            'id_posisi' =>$request->id_posisi,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'tgl_awal' => $request->tgl_awal,
            'cv' =>$request->cv,
            'portofolio' => $request->portofolio,
            'tgl_akhir' => $request->tgl_akhir,
            'alasan' => $request->alasan,
            'status' => "Registered",
            'flow' => "flow1",
            'alasan_posisi' => $request->alasan_posisi,
            'id_info' => $request->id_info,
            ]);
        
        $state = DB::table('states')->insert([
            'user_id' => $calon->id,
            'state' => $calon->status
        ]); 
        return redirect()->route('calonmagang');
        // return 
    }

    public function setFlow1($id){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = ['flow' => "flow1"];
        $calonmagang->update($data_to_update);
        dd($data_to_update);
        return response()->json("calonmagang");
    }

    public function setFlow2($id){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = ['flow' => "flow2"];
        $calonmagang->update($data_to_update);

        return response()->json("calonmagang");
    }

    public function setFlow3($id){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = ['flow' => "flow3"];
        $calonmagang->update($data_to_update);

        return response()->json("calonmagang");
    }

    public function setFlow4($id){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = ['flow' => "flow4"];
        $calonmagang->update($data_to_update);

        return response()->json("calonmagang");
    }

    public function detail($id)
    {
        $calonmagang= CalonMagang::where('id',$id)->first();

        return view('calonmagang.detailcalonmagang', compact('calonmagang'));
    }

    
    public function edit($id)
    {
        $calonmagang= CalonMagang::where('id',$id)->first();
        $posisis = Posisi::all();
        $infos = InfoMagang::all();

        return view('calonmagang.editcalonmagang', compact('calonmagang','posisis','infos'));
    }

   
    public function update(CalonMagangRequest $request, $id)
    {
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = [
            'id_posisi' => request('posisi'),
            'kampus' => $request->kampus,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'telp' => $request->telp,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'tgl_awal' => $request->tgl_awal,
            'cv' =>$request->cv,
            'portofolio' => $request->portofolio,
            'tgl_akhir' => $request->tgl_akhir,
            'alasan' => $request->alasan,
            'id_info' => request('info'),
            'status' => $request->status,
            ]; 
        $calonmagang->update($data_to_update);

        return redirect()->route('calonmagang');
    }
     public function destroy($id)
    {
        $calonmagang = CalonMagang::where('id', $id)->first();
        $calonmagang->delete();

        return response()->json("Success");
    }
}
