<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa','no_telp','password','jurusan','tingkat_kelas'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'jurusan','id_jurusan');
    }

}
