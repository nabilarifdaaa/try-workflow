<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Activity;

class ActivityController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Activity::query())
            ->addColumn('action', function ($activity) {
                    return 
                    '<a href="' . route("activity.detail", ["id" => $activity->id]) . '" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
                    <a href="' . route("activity.edit", ["id" => $activity->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                    <button data-id="' . $activity->id .'" onclick="deletedata(this)" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>';
            })->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action'],
        ]);
        
        return view('activity.activity', compact('html'));
    }

    public function detail($id)
    {
        try{
            $activity= Activity::where('id',$id)->firstOrFail();
            return view('activity.detailactivity', compact('activity'));
        }
        catch(xexception $exception){

        }
        
    }

    public function create()
    {
        return view('activity.createactivity');
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'gambar' => 'required',
		]);

        if ($validator->fails()) {
            return redirect('activity/create')
                ->withErrors($validator)
                ->withInput();
        }
         
        $uploadFile = $request->file('gambar');
        $path = $uploadFile->store('public/upload/activity');

        Activity::create([
            'title' => $request->title,
            'gambar' => $path,
            ]); 

        return redirect()->route('activity');
    }

    public function edit($id)
    {
        $activity= Activity::where('id',$id)->first();
        return view('activity.editactivity', compact('activity'));
    }

    public function update(Request $request, $id)
    {
       $activity= Activity::where('id', $id)->first();

        $data_to_update = [
            'title' => $request->title,
            ]; 

         if($request->hasFile("gambar")){
            Storage::delete($activity->gambar);
            $uploadFile = $request->file('gambar');
            $path = $uploadFile->store('public/upload/activity');
            $data_to_update["gambar"] = $path;
         }

        $activity->update($data_to_update);
        return redirect()->route('activity');
    }
    
    public function destroy($id)
    {
        $activity = Activity::where('id', $id)->first();
        $activity->delete();

        return response()->json("Success");
    }
}
