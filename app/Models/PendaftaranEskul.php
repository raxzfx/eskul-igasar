<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendaftaranEskul extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_eskul';
    protected $fillable = ['pendaftaran_id', 'eskul_id', 'status'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }

    public function eskuls()
    {
        return $this->belongsTo(Eskul::class, 'eskul_id');
    }
}

