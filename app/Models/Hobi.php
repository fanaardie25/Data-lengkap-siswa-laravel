<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $fillable = ['name'];

    public function siswa(){
        return $this->belongsToMany(Siswa::class,'siswa_hobi');
    }

}

