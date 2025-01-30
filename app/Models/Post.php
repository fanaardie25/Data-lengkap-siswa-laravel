<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','content','user_id','image'];

public function getRouteKeyName()
{
    return 'slug';
}

public function images(){
    return $this->hasMany(Image::class);
}

public function user(){
    return $this->belongsTo(User::class);
}

}
