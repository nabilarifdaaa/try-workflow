<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalonMagang;
use App\InfoMagang;
use App\Posisi;
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
    public function __construct() {  
        $this->middleware('auth');
    }

    public function getAll(){
        $flowClasses = new Parser();
        $flow = $flowClasses->parseYaml();
        return $flow;
    }

    public function state()
    {
        $stateManager = new StateManager();
        //$users = User::latest()->paginate(5);
        $user = DB::table('calon_magangs')
                    ->join('states', 'calon_magangs.id', '=', 'states.user_id')
                    ->join('posisis', 'calon_magangs.id_posisi', '=', 'posisis.id')
                    ->select('calon_magangs.*', 'states.state', 'posisis.nama_posisi')
                    ->get();
        foreach($user as $users) {
            $stateDetail = $stateManager->getStateDetail($users->state);
            $users->state_detail = $stateDetail;
        }
        $state = DB::table('states')
            ->join('calon_magangs', 'states.user_id', '=', 'calon_magangs.id')
            ->join('posisis', 'calon_magangs.id_posisi', '=', 'posisis.id')
            ->select('states.*','calon_magangs.nama', 'posisis.nama_posisi')
            ->get();
        // dd($state);
        return view('wms.home',compact('user','stateDetail','state'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function index(Builder $builder){  
        if (request()->ajax()) {            
            return DataTables::of(CalonMagang::with("posisi","infomagang"))
            ->addColumn('action', function ($calonmagang) { 
                return  
                '<a href="' . route("calonmagang.detail", ["id" => $calonmagang->id]) . '" class="btn btn-xs btn-info btn-style-icon"><i class="fa fa-eye"></i></a> 
                <a href="' . route("calonmagang.edit", ["id" => $calonmagang->id]) . '" class="btn btn-xs btn-primary btn-style-icon"><i class="fa fa-edit"></i></a>  
                <button data-id="' . $calonmagang->id .'" onclick="deletedata(this)" class="btn btn-xs btn-danger btn-style-icon"><i class="fa fa-trash-o"></i></button>    
                 ';
        })->addColumn('flow', function ($calonmagang) { 
           if ($calonmagang->flow === "flow1") {
                return '
                    <div class="btn-group" >
                        <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' .$calonmagang->flow. '
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow1(this)" type="button">Flow 1</button>
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow2(this)" type="button">Flow 2</button>
                        </div>
                    </div>';
            }  
            elseif ($calonmagang->flow === "flow2"){
                return
                '<div class="btn-group" >
                    <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ' .$calonmagang->flow. '
                    </button>
                   <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow1(this)" type="button">Flow 1</button>
                            <button class="dropdown-item" data-id="' . $calonmagang->id . '"  onclick="setFlow2(this)" type="button">Flow 2</button>
                        </div>
                </div>'  ;
            } 
        })->rawColumns(['action','flow'])->toJson();
    }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'nama', 'name' => 'nama', 'title' => 'nama'],
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
