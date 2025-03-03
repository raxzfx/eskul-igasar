<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{



    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa','no_telp','password','nama_jurusan','tingkat_kelas'];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'nama_jurusan','id_jurusan');
    }

}
