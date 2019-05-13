<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'passed_state','status','id_admin'];

    public function CalonMagang(){
    	return $this->hasOne(CalonMagang::class, "id", "user_id");
    }
}
