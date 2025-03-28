<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{



    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa','no_telp','password','nama_jurusan','tingkat_kelas','username'];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'nama_jurusan','id_jurusan');
    }

}
