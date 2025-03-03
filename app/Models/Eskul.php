<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    protected $table = 'eskul';
    protected $primaryKey = 'id_eskul';
    protected $fillable = ['nama_eskul','deskripsi','hari','pembina','jam_mulai','jam_selesai','tempat','gambar'];

    public function guru(){
        return $this->belongsTo(Guru::class,'pembina','id_guru');
    }
}
