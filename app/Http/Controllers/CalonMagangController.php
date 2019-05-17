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
    protected $flow;

    public function __construct(){
        $this->middleware('auth');
        $flowClasses = new Parser();
        $this->flow = $flowClasses->allfile();
    }

    public function index(Builder $builder){  
        if (request()->ajax()) {            
            return DataTables::of(CalonMagang::with("posisi","infomagang"))
            ->addColumn('action', function ($calonmagang) { 
                if($calonmagang->flow === NULL){
                    return  
                    '<a href="' . route("calonmagang.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-info mr-1"><i class="material-icons">visibility</i></a> 
                    <a href="' . route("calonmagang.edit", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                    <button data-id="' . $calonmagang->id .'" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a> </button>';
                }
                else{
                    return  
                    '<a href="' . route("calonmagang.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-info mr-1"><i class="material-icons">visibility</i></a> 
                    <a href="' . route("calonmagang.edit", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                    <button data-id="' . $calonmagang->id .'" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a> </button>
                    <a href="' . route("wms.detail", ["id" => $calonmagang->id]) . '" class="mb-2 btn btn-sm btn-secondary mr-1"><i class="material-icons">settings</i>&nbsp;State</a>  
                    ';
                }
            })->addColumn('flow', function ($calonmagang) { 
                $listFlow ="";
                foreach($this->flow as $key){
                    $listFlow .= '<button class="dropdown-item" data-id="' . $calonmagang->id . '" data-flow="' . $key . '" onclick="setFlow(this)" type="button">' . $key . '</button>';
                }
                if($calonmagang->status === "registered"){
                    return '
                        <div class="btn-group" >
                            <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ' .$calonmagang->flow. '
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                ' .$listFlow. '
                            </div>
                        </div>';
                }else{
                    return '
                        <div class="btn-group" >
                            <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ' .$calonmagang->flow. '
                            </button>
                        </div>';
                }
            })->addColumn('status', function ($calonmagang) {
                if($calonmagang->status == "accepted"){
                    return  
                    '<p class="badge badge-pill badge-success">'.$calonmagang->status.'</p>';
                } 
                elseif($calonmagang->status == "rejected"){
                    return  
                    '<p class="badge badge-pill badge-danger">'.$calonmagang->status.'</p>';
                } 
                else{
                    return  
                    '<p class="badge badge-pill badge-secondary">'.$calonmagang->status.'</p>'; 
                }
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

    public function setState($id){
       
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
            // dd($user->flow);
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
            if($userStatus->status === "accepted") {
                Mail::send('email.lolosfinal', [
                    'email' => $userStatus->email,
                    'nama' => $userStatus->nama,
                    'posisi' => $userStatus->posisi->nama_posisi,
                    'tgl_awal' => $userStatus->tgl_awal,
                    'tgl_akhir' => $userStatus->tgl_akhir,
                    'status' => $userStatus->status,
                ], function ($message) use ($userStatus)
                {
                    $message->from('internship@dot-indonesia.com', 'DOT Internship' );
                    $message->to($userStatus->email)->subject('Informasi Seleksi Penerimaan Magang DOT');
                }); 
            }
            Mail::send('email.lolos', [
            'email' => $userStatus->email,
            'nama' => $userStatus->nama,
            'status' => $userStatus->status,
            ], function ($message) use ($userStatus)
            {
                $message->from('internship@dot-indonesia.com', 'DOT Internship');
                $message->to($userStatus->email)->subject('Informasi Seleksi Penerimaan Magang DOT');
            }); 
        }
        else if($request->action==="reject")
        {
            Mail::send('email.reject', ['email' => $userStatus->email,'nama' => $userStatus->nama], function ($message) use ($userStatus)
            {
                $message->from('internship@dot-indonesia.com', 'DOT Internship');
                $message->to($userStatus->email)->subject('Informasi Seleksi Penerimaan Magang DOT');
            }); 
        }

        return redirect()->route('wms.detail', ["id" => $id]);
    }

    public function setFlow($id,$flow){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $data_to_update = ['flow' => "$flow"];
        $calonmagang->update($data_to_update);
        dd($data_to_update);
        return response()->json("calonmagang");
    }

    public function listFlow(){
        $flowClasses = new Parser();
        $all = $flowClasses->parseAll($this->flow);
        $flowName = $this->flow;
        // dd($flowName);
        return view('wms.listflow',compact('all','flowName'));
    }
    
    public function restartFlow($id){
        $calonmagang = CalonMagang::where('id', $id)->first();
        $history = History::where('user_id', $id)->first();
        $state = State::where('user_id', $id)->first();
        
        $calonmagang->update(['flow'=>NULL,
                            'status'=>'registered']);
        $history->delete();
        $state->update(['state'=>'registered']);
        
        return response()->json("calonmagang");
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

        $request["status"] = "registered";
        $calon = CalonMagang::create($request->except("_token"));
        
        $state = DB::table('states')->insert([
            'user_id' => $calon->id,
            'state' => $calon->status
        ]); 
        return redirect()->route('calonmagang');
        // return 
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
