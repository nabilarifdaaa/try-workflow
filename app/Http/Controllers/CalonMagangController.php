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
use Illuminate\Support\Facades\Auth;
use WMS\src\Services\Parser;
use Illuminate\Support\Facades\Mail;
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
            ->join('posisis', 'calon_magangs.id_posisi','=','posisis.id')
            ->select('calon_magangs.*', 'states.state','posisis.nama_posisi')
            ->where('calon_magangs.id','=',$id)
            ->first();
        
        $history = DB::table('histories')
            ->join('users', 'histories.id_admin','=','users.id')
            ->select('histories.passed_state','histories.status','users.name','histories.created_at')
            ->where('histories.user_id','=',$id)
            ->get();
            // dd($history);
        $getFlow = $user->flow;
        $currentState = $user->state;

        $stateManager = new StateManager($getFlow);

        $flow = $stateManager->getFlow();
        if ($currentState === "accepted" || $currentState === "rejected" ){
            $stateDetail = "end";
        }
        else{
            $stateDetail = $stateManager->getStateDetail($currentState);
        }

        return view('wms.detail',compact('user','flow','stateDetail','history'));
    }

    public function action($id, Request $request)
    {   
        $stateManager = new StateManager($request->flow);
        $stateDetail = array_keys($stateManager->getStateDetail($request->state));
        $nextState = "";

        if($request->action === "approve"){
            $nextState = $stateDetail[0];
        }elseif($request->action === "reject"){
            $nextState = $stateDetail[1];
        }

        // UPDATE 2 TABEL
        $states = State::where('user_id', $id)->first();
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
        $admin=Auth::user()->id;
        //dd($admin);
        $history = History::create([
            'user_id' => $id,
            'passed_state' => $nextState,
            'status' => $request->action,
            'id_admin' => $admin
        ]); 

        if($request->action === "approve")
        {
           Mail::send('email.lolos', ['email' => $userStatus->email], function ($message) use ($userStatus)
        {
            $message->from('internship@dot-indonesia.com', 'DOT Internship');
            $message->to($userStatus->email);
        }); 
        }
        else if($request->action==="reject")
        {
            Mail::send('email.reject', ['email' => $userStatus->email], function ($message) use ($userStatus)
        {
            $message->from('internship@dot-indonesia.com', 'DOT Internship');
            $message->to($userStatus->email);
        }); 
        }

        return redirect()->route('wms.detail', ["id" => $id]);
    }

   
    
    public function index(Builder $builder){  
        if (request()->ajax()) {            
            return DataTables::of(CalonMagang::with("posisi","infomagang"))
            ->addColumn('action', function ($calonmagang) { 
                return  
                '<a href="' . route("calonmagang.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-info mr-1"><i class="material-icons">visibility</i></a> 
                <a href="' . route("calonmagang.edit", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                <button data-id="' . $calonmagang->id .'" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a> </button>
                <a href="' . route("wms.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-secondary mr-1"><i class="material-icons">settings</i></a>  
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

       $request["status"] = "Registered";
        $calon = CalonMagang::create($request->except("_token"));
        
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

   
    public function update(Request $request, $id)
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
            'tgl_akhir' => $request->tgl_akhir,
            'cv' =>$request->cv,
            'portofolio' => $request->portofolio,
            'alasan' => $request->alasan,
            'alasan_posisi' => $request->alasan_posisi,
            'id_info' => request('info'),
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
