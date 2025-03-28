<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensi";
    protected $fillable = ['pendaftaran_id','status','eskul_id','nilai','catatan'];

    public function namaMurid(){
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id','id_pendaftaran');
    }

    public function namaEskul(){
        return $this->belongsTo(Eskul::class, 'eskul_id','id_eskul');
    }

    public function pendaftaranEskul()
{
    return $this->hasOne(PendaftaranEskul::class, 'pendaftaran_id', 'pendaftaran_id')
                ->where('status', 'approve'); // Hanya ambil yang statusnya "approve"
}

}
