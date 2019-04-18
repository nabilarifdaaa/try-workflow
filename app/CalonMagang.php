<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalonMagang extends Model
{
    protected $fillable = ['id_posisi', 'kampus','nama', 'jurusan', 'telp', 'tgl_awal', 'tgl_akhir', 'facebook', 'instagram','email', 'alasan', 'alasan_posisi','id_info', 'cv', 'portofolio','status'];

    public function posisi(){
    	return $this->hasOne(Posisi::class, "id", "id_posisi");
    }

     public function InfoMagang(){
    	return $this->hasOne(InfoMagang::class, "id", "id_info");
    }

}
