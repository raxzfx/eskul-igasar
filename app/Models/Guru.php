<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nama_guru','username','no_telp','password','role'];

    public function eskul(){
        return $this->hasMany(Eskul::class,'pembina','id_eskul');
    }
}
