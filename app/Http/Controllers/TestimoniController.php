<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use App\Posisi;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\TestimoniRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class TestimoniController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Builder $builder){
        if (request()->ajax()) {
        return DataTables::of(Testimoni::with("posisi"))
        ->addColumn('action', function ($testimoni) {
            return 
            '<a href="' . route("testimoni.detail", ["id" => $testimoni->id]) . '" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
            <a href="' . route("testimoni.detail", ["id" => $testimoni->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
            <button data-id="' . $testimoni->id .'" onclick="deletedata(this)" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>    
             ';
        })->toJson();
    }

        $html = $builder->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
                ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama'],
                ['data' => 'posisi.nama_posisi', 'name' => 'nama_posisi', 'title' => 'Posisi'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);

        return view('testimoni.testimoni', compact('html'));
    }

    public function detail($id){
        $testimoni= Testimoni::where('id',$id)->first();
        $posisis = Posisi::all();

        return view('testimoni.detailtestimoni', compact('testimoni','posisis'));
    }

    public function create()
    {
        $posisis = Posisi::all();

        return view('testimoni.createtestimoni', compact('posisis'));
    }

    public function store(Request $request) {
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gambar' => 'required',
            'content' => 'required',
		]);

        if ($validator->fails()) {
            return redirect('testimoni/create')
                        ->withErrors($validator)
                        ->withInput();
        }
         
        $uploadFile = $request->file('gambar');
        $path = $uploadFile->store('public/upload/testimoni');

        Testimoni::create([
            'nama' => $request->nama,
            'id_posisi' => request('posisi'),
            'gambar' => $path,
            'content' => request('content'),
            ]); 

        return redirect()->route('testimoni');
    }

    public function edit($id){
        $testimoni= Testimoni::where('id',$id)->first();
        $posisis = Posisi::all();
        
        return view('testimoni.edittestimoni', compact('testimoni','posisis'));
    }

    public function update(TestimoniRequest $request, $id){
       $testimoni= Testimoni::where('id', $id)->first();

        $data_to_update = [
                'nama' => $request->nama,
                'id_posisi' => request('posisi'),
                'content' => request('content'),
                ]; 

         if($request->hasFile("gambar")){
            Storage::delete($testimoni->gambar);
            $uploadFile = $request->file('gambar');
            $path = $uploadFile->store('public/upload/testimoni');
            $data_to_update["gambar"] = $path;
         }

        $testimoni->update($data_to_update);

        return redirect()->route('testimoni');
    }
    public function destroy($id)
    {
        $testimoni = Testimoni::where('id', $id)->first();
        $testimoni->delete();

        return response()->json("Success");
    }
}
