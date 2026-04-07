<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MovieController extends Controller
{
    public function index() {

    $movies = DB::table('movie')
        ->where('popularity', '>', 450)
        ->where('vote_average', '>', 7)
        ->orderBy('release_date', 'desc')
        ->limit(12)
        ->get();

    return view('movie.index', compact('movies'));
}
    public function theloai($id)
{
    $movies = DB::table('movie')
        ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie') // sửa ở đây
        ->where('movie_genre.id_genre', $id) // sửa ở đây
        ->orderBy('movie.release_date', 'desc')
        ->limit(12)
        ->select('movie.*')
        ->get();

    $genre = DB::table('genre')->get(); // sửa tên bảng luôn

    return view('movie.theloai', compact('movies', 'genre'));
}
public function timkiem(Request $request)
{
    $keyword = $request->input('keyword'); // GET hoặc POST đều được
    $movies = DB::table('movie')
                ->where('movie_name_vn', 'like', "%{$keyword}%")
                ->get();
    $genre = DB::table('genre')->get();

    return view('movie.timkiem', compact('movies', 'genre', 'keyword'));
}
}
