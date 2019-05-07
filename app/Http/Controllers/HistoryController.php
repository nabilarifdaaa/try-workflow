<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\CalonMagang;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

class HistoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Builder $builder){
        if (request()->ajax()) {
            return DataTables::of(History::with("calonmagang"))->toJson();
        }
        $html = $builder->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
                ['data' => 'user_id', 'name' => 'user_id', 'title' => 'User Id'],
                ['data' => 'calonmagang.nama', 'name' => 'nama', 'title' => 'Nama'],
                ['data' => 'passed_state', 'name' => 'passed_state', 'title' => 'Passed'],
                ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
                ['data' => 'created_at', 'name' => 'time', 'title' => 'time'],
        ]);

        return view('wms.history', compact('html'));
    }

}
