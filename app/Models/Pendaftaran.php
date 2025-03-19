<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = ['nama_murid', 'nis', 'hobi', 'alasan', 'tgl_daftar'];

    public function eskuls()
    {
        return $this->belongsToMany(Eskul::class, 'pendaftaran_eskul', 'pendaftaran_id', 'eskul_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function absen(){
        return $this->hasMany(Absensi::class, 'pendaftaran_id', 'id_pendaftaran');
    }
}

