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

    public function pendaftarans()
    {
        return $this->belongsToMany(Pendaftaran::class, 'pendaftaran_eskul', 'eskul_id', 'pendaftaran_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function absensi(){
        return $this->hasMany(Absensi::class, 'eskul_id', 'id_eskul');
    }
}
