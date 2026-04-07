<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieController3 extends Controller
{
    public function quanly()
    {
        $movies = Movie::where('status', 1)->orderBy('id', 'desc')->get();
        
        return view('components.quanly', compact('movies'));
    }

    public function create()
    {
        
        return view('components.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_name' => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d',
            'overview_vn'   => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ], [
            'original_name.required' => 'Tên tiếng Anh không được để trống.',
            'movie_name_vn.required' => 'Tên tiếng Việt không được để trống.',
            'release_date.required'  => 'Ngày phát hành không được để trống.',
            'release_date.date_format'=> 'Ngày phát hành phải nhập đúng định dạng yyyy-mm-dd.',
            'overview_vn.required'   => 'Mô tả không được để trống.',
            'image.required'         => 'Ảnh đại diện không được để trống.',
            'image.image'            => 'File tải lên phải là định dạng ảnh.',
            'image.mimes'            => 'Ảnh phải có đuôi jpeg, png, jpg, gif hoặc webp.'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public'), $filename);          
            $imagePath = $filename;
        }

        $newId = Movie::max('id') + 1;

        Movie::insert([
            'id'            => $newId,
            'movie_name'    => $request->original_name,
            'original_name' => $request->original_name,
            'movie_name_vn' => $request->movie_name_vn,
            'release_date'  => $request->release_date,
            'overview_vn'   => $request->overview_vn,
            'image'         => $imagePath,
            'status'        => 1 // Trạng thái mặc định là 1
        ]);

        return redirect()->route('quanly')->with('success', 'Thêm bộ phim thành công!');
    }

    public function destroy($id)
    {
        Movie::where('id', $id)->update(['status' => 0]);
        return redirect()->route('quanly')->with('success', 'Đã xóa bộ phim!');
    }
}