<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable =  ['nama_jurusan'];

    public function siswa()
    {
       return $this->hasMany(Siswa::class,'jurusan','id_jurusan');
    }
}
