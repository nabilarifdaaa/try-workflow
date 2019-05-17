<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin=Auth::user();
        $count_regis = DB::table('states')
            ->where('states.state','=','registered')
            ->count();
        $count_acc = DB::table('states')
            ->where('states.state','=','accepted')
            ->count();
        $count_reject = DB::table('states')
            ->where('states.state','=','rejected')
            ->count();
        $count_review = DB::table('states')
            ->where('states.state','=','review_cv')
            ->count();
        $count_tes = DB::table('states')
            ->where('states.state','=','technical_test')
            ->count();
        $count_interview = DB::table('states')
            ->where('states.state','=','interview')
            ->count();

        return view('home', compact('admin','count_regis','count_acc','count_reject','count_review','count_tes','count_interview'));
    }
}
