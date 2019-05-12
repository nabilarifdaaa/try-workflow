<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posisi;
use App\Testimoni;
use App\Activity;
use App\Mail\Success;
use App\CalonMagang;
use Illuminate\Support\Facades\Mail;
use App\InfoMagang;
use App\Kuota;
use App\State;
use App\Http\Requests\CalonMagangRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use \Carbon\Carbon as Carbon;
use \Carbon\CarbonPeriod as CarbonPeriod;

class UserController extends Controller
{
    protected $range;
    protected $quota;
    protected $total_registered;

    public function index(){
    	$posisi= Posisi::all();
        $testimoni = Testimoni::all();
        $activity = Activity::all();

        return view('usercalonmagang.index',compact('posisi','testimoni','activity'));
    }

    public function detail($id){
        $posisi = Posisi::where('id', $id)->first();

        return view('usercalonmagang.detailposition',compact('posisi') );
    }

    public function register($id){
        $posisi = Posisi::where('id', $id)->first();
        $infos = InfoMagang::all();

        return view('usercalonmagang.register',compact('posisi','infos'));
    }

    function getMonthRange(){
        $period = CarbonPeriod::create(request()->get('tgl_awal'), '1 month', request()->get('tgl_akhir'));
        foreach ($period as $dt) {
            $result[] = $dt->format("m");
        }
        $this->range = $result;
    }

    function getResult () {
        $this->quota->transform(function ($q) {
            $q->remains = $q->jumlah;
            return $q;
        });

        foreach ($this->total_registered as $registered) {
            $tgl_awal = Carbon::parse($registered->tgl_awal)->firstOfMonth();
            $tgl_akhir = Carbon::parse($registered->tgl_akhir)->lastOfMonth();
            foreach ($this->quota as $quota) {
                $waktu = Carbon::parse($quota->waktu)->firstOfMonth();
                if ($this->inRange($waktu, $tgl_awal, $tgl_akhir)) {
                    $quota->remains--;
                }    
            }
        }

        $this->quota = $this->quota->filter(function ($value, $key) {
            return $value->remains === 0;
        });        
    }

    public function inRange($waktu, $tgl_awal, $tgl_akhir){
        return ($waktu->month >= $tgl_awal->month && $waktu->month <= $tgl_akhir->month);
    }

    public function autoMail(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);
        $newsletter = new CalonMagang();
        $newsletter->email = $request->input('email');
         if ($newsletter->save())
        {
            Mail::to($newsletter->email)->send(new Success($newsletter));
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    public function store(Request $request) {
        \Log::info('hola');
        // try{

            $request->validate([
            'alasan' => 'required|min:10|string',
            'alasan_posisi' => 'required|min:10|string',
            'kampus' => 'required|string',
            'nama' => 'required|min:3|string',
            'jurusan' => 'required|string',
            'tgl_awal'      => 'required|before:tgl_akhir',
            'tgl_akhir'     => 'required|after:tgl_awal',
            ]);

        $this->getMonthRange();
        $this->total_registered = CalonMagang::where(\DB::raw('MONTH(tgl_akhir)'), '>=', reset($this->range))
            ->where(\DB::raw('MONTH(tgl_akhir)'), '<=', end($this->range))
            ->orWhere(\DB::raw('MONTH(tgl_akhir)'), '>', end($this->range))
            ->where("status", "Approved")
            ->select('id', \DB::raw('DATE_FORMAT(tgl_awal, "%Y-%m") as tgl_awal'), 
                \DB::raw('DATE_FORMAT(tgl_akhir, "%Y-%m") as tgl_akhir')) 
            ->get();
            
        $this->quota = Kuota::whereIn(\DB::raw('MONTH(waktu)'), $this->range)
            ->select('id', \DB::raw('DATE_FORMAT(waktu, "%Y-%m") as waktu'), 'jumlah')
            ->orderBy('waktu')->get();

        $this->getResult();

        if($this->quota->count()>=1) {
            $this->quota = $this->quota->pluck('waktu')->transform(function($waktu){
                return Carbon::parse($waktu)->format("F");
            });
            if($this->quota->count()>=1){
                $this->quota = implode(",", $this->quota->toArray());
                // return response()->json("Kuota bulan " . $this->quota. "telah penuh, silahkan pilih bulan lain.");    
                return response()
                ->json([
                    'message' => "Kuota bulan " . $this->quota. " telah penuh, silahkan pilih bulan lain.",
                    'status' => 422
                ], 422);    
            }
        } 

        $request["status"] = "Registered";
        $calon = CalonMagang::create($request->except("_token"));
        State::create([
            'user_id' => $calon->id,
            'state' => "Registered"
        ]); 
        

       //  $newsletter = new CalonMagang();
       //  $newsletter->email = $request->input('email');
       // // dd($newsletter->email);

        
            Mail::send('email.success', ['email' => $request->email], function ($message) use ($calon)
            {
                $message->from('revinaaniver@gmail.com', 'Goodness Kayode');
                $message->to($calon->email);
            });
            //return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
       
        
        
        // return redirect()->route('usercalonmagang.sukses');
        // } catch(\Exception $exception)
        // {
        //     dd($exception);
        // }


    }
    

    public function sukses(){
        return view("usercalonmagang.sukses");
    }
}
