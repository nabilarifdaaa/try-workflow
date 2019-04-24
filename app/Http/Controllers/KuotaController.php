<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kuota;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

class KuotaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Builder $builder){
        if (request()->ajax()) {
        return DataTables::of(Kuota::query())
            ->addColumn('action', function ($kuota) {
                return 
                '<a href="' . route("kuota.edit", ["id" => $kuota->id]) . '" class="mb-2 btn btn-sm btn-warning mr-1"><i class="material-icons">create</i></a>  
                <button data-id="' . $kuota->id . '" onclick="deletedata(this)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i></a>  </button>
                 ';
            })->toJson();
        }

        $html = $builder->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
                ['data' => 'waktu', 'name' => 'waktu', 'title' => 'Waktu'],
                ['data' => 'jumlah', 'name' => 'jumlah', 'title' => 'Jumlah'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);

        return view('kuota.kuota', compact('html'));
    }

    public function create()
    {
        return view('kuota.createkuota');
    }

    public function store(Request $request)
    {
        $request->validate([
            'waktu' => 'required|unique:kuotas',
            'jumlah' => 'required|integer',
            ]);
        Kuota::create($request->all());
        return redirect()->route('kuota');
    }

    public function edit($id)
    {
        $kuota= Kuota::where('id',$id)->first();
        return view('kuota.editkuota', compact('kuota'));
    }

    public function update(Request $request, $id)
    {
        $kuota=Kuota::where('id',$id)->first();
        $request->validate([
            'waktu' => 'required',
            'jumlah' => 'required|integer',
            ]);
            $kuota->update([
                'waktu' => $request->waktu,
                'jumlah' => request('jumlah'),
            ]);

        return redirect()->route('kuota');
    }

    public function destroy($id)
    {
        $kuota= Kuota::where('id', $id)->first();
        $kuota->delete();

        return response()->json("Success");
    }
}
