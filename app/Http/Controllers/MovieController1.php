<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class MovieController1 extends Controller
{
    public function chitiet($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();
        $genre = DB::table('genre')->get();
        if (!$movie) {
            return abort(404, 'Phim không tồn tại');
        }
        return view('movie.chitiet', compact('movie', 'genre'));
    }
}