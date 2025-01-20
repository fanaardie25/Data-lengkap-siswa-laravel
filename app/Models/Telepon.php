<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $fillable = ['telepon', 'siswa_id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

    
}
