<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['user_id','state'];

    public function CalonMagang(){
    	return $this->hasOne(CalonMagang::class, "user_id","id");
    }
}
