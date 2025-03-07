<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nama_guru','no_telp','password','role'];

    public function eskul(){
        return $this->hasMany(Eskul::class,'pembina','id_eskul');
    }
}
