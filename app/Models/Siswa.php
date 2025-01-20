<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['name'];

    public function nisn(){
        return $this->hasOne(Nisn::class);
    }

    public function hobi(){
        return $this->belongsToMany(Hobi::class,'siswa_hobi');
    }

    public function telepon(){
        return $this->hasMany(Telepon::class);
    }
}
