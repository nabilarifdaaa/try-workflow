<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posisi;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PosisiRequest;
 
class  PosisiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Builder $builder){
        if (request()->ajax()) {
        return DataTables::of(Posisi::query())
            ->addColumn('action', function ($posisi) {
                return 
                '<a href="' . route("posisi.detail", ["id" => $posisi->id]) . '" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
                <a href="' . route("posisi.edit", ["id" => $posisi->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                <button data-id="' . $posisi->id . '" onclick="deletedata(this)" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>    
                 ';
            })->addColumn('actions', function ($posisi) {
                if ($posisi->aksi === "false") {
                    return '
                        <div class="btn-group" >
                            <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ' .$posisi->aksi. '
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" data-id="' . $posisi->id . '"  onclick="setTrue(this)" type="button">True</button>
                                <button class="dropdown-item" data-id="' . $posisi->id . '"  onclick="setFalse(this)" type="button">False</button>
                            </div>
                        </div>';
                }  
                elseif ($posisi->aksi === "true"){
                    return
                    '<div class="btn-group" >
                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' .$posisi->aksi. '
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" data-id="' . $posisi->id . '"  onclick="setTrue(this)" type="button">True</button>
                            <button class="dropdown-item" data-id="' . $posisi->id . '"  onclick="setFalse(this)" type="button">False</button>
                        </div>
                    </div>'  ;
                } 
            })->rawColumns(['action', 'actions'])->toJson();
        }

        $html = $builder->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
                ['data' => 'nama_posisi', 'name' => 'nama_posisi', 'title' => 'Posisi'],
                ['data' => 'actions', 'name' => 'actions', 'title' => 'Tampilkan'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);

        return view('posisi.posisi', compact('html'));
    }

    public function create()
    {
        return view('posisi.createposisi');
    }

    public function store(Request $request) {
         $validator = Validator::make($request->all(), [
            'nama_posisi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'aksi' =>'required',
        ]);

        if ($validator->fails()) {
            return redirect('posisi/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $uploadFile = $request->file('gambar');
        $path = $uploadFile->store('public/upload/posisi');

        Posisi::create([
            'nama_posisi' => $request->nama_posisi,
            'slug' => str_slug(request('nama_posisi'), '-'),
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
            'aksi' => $request->aksi,
            ]); 

        return redirect()->route('posisi');
    }

    public function detail($id){
        $posisi= Posisi::where('id',$id)->first();

        return view('posisi.detailposisi', compact('posisi'));
    }

    public function edit($id){
        $posisi= Posisi::where('id',$id)->first();

        return view('posisi.editposisi', compact('posisi'));
    }

    public function update(PosisiRequest $request, $id){
        $posisi = Posisi::where('id', $id)->first();

        $data_to_update = [
                'nama_posisi' => $request->nama_posisi,
                'deskripsi' => request('deskripsi'),
                'slug' => str_slug(request('nama_posisi'), '-'),
                'aksi' => request('aksi'),
                ]; 

        if($request->hasFile("gambar")){
            Storage::delete($posisi->gambar);
            $uploadFile = $request->file('gambar');
            $path = $uploadFile->store('public/upload/posisi');
            $data_to_update["gambar"] = $path;
        }

        $posisi->update($data_to_update);

        return redirect()->route('posisi');
    }

    public function setTrue($id){
        $posisi = Posisi::where('id', $id)->first();
        $data_to_update = ['aksi' => "true"];
        $posisi->update($data_to_update);

        return response()->json("posisi");
    }

    public function setFalse($id){
        $posisi = Posisi::where('id', $id)->first();
        $data_to_update = ['aksi' => "false"];
        $posisi->update($data_to_update);

        return response()->json("posisi");
    }

    public function setStatus(){
        $posisi = Posisi::where('aksi', 'false')->update(['aksi' => 'true']);

        return response()->json("posisi");
    }

    public function setStatusFalse(){
        $posisi = Posisi::where('aksi', 'true')->update(['aksi' => 'false']);
        
        return response()->json("posisi");
    }

    public function destroy($id)
    {
        $posisi = Posisi::where('id', $id)->first();
        $posisi->delete();

        return response()->json("success");
    }
}
