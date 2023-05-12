<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // We have a category and it hasMany posts

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function blogs(){
        return $this->hasMany(Blogs::class);
    }

    public function products(){
        return $this->hasMany(Products::class);
    }

}
