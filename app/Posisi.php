<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    protected $fillable = ['nama_posisi','slug', 'gambar', 'deskripsi', 'aksi'];
}
