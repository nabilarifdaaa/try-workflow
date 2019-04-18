<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['nama','id_posisi', 'gambar', 'content'];
    
    public function posisi(){
    	return $this->hasOne(Posisi::class, "id", "id_posisi");  
    }
}
