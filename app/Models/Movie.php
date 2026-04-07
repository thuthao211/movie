<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $table = 'movie';

    public $timestamps = false; 
    
    protected $fillable = [
        'id', 'movie_name', 'original_name', 'movie_name_vn', 
        'image', 'release_date', 'overview_vn', 'status'
    ];
}