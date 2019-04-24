<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoMagang;
use App\Posisi;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

class InfoMagangController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Builder $builder){
        if (request()->ajax()) {
            return DataTables::of(InfoMagang::query())
            ->addColumn('action', function ($infomagang) {
                return  
                '<a href="' . route("infomagang.edit", ["id" => $infomagang->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                <button data-id="' .$infomagang->id .'" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a> </button>    
                 ';
            })->toJson();
        }

    $html = $builder->columns([
        ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
        ['data' => 'info', 'name' => 'info', 'title' => 'Info'],
        ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);

    return view('infomagang.infomagang', compact('html'));
    }
     
    public function create()
    {
        return view('infomagang.createinfomagang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'info' => 'required|min:6|string',]);
        InfoMagang::create($request->all());

        return redirect()->route('infomagang');
    }

    public function edit($id)
    {
        $infomagang= InfoMagang::where('id',$id)->first();
        
        return view('infomagang.editinfomagang', compact('infomagang'));
    }

    public function update(Request $request, $id)
    {
        $infomagang=InfoMagang::where('id',$id)->first();
        $request->validate([
            'info' => 'required',
        ]);
        $infomagang->update([
            'info' => $request->info,
        ]);

        return redirect()->route('infomagang');
    }

    public function destroy($id)
    {
        $infomagang = InfoMagang::where('id', $id)->first();
        $infomagang->delete();

        return response()->json("Success");
    }
}
