<x-movie-layout>
    <x-slot name="title">Thêm phim mới</x-slot>

    <div class="container mt-4">
        <h3 class="text-center text-primary text-uppercase fw-bold mb-4">Thêm Phim Mới</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Lỗi nhập liệu:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên tiếng Anh <span class="text-danger">*</span></label>
                        <input type="text" name="original_name" class="form-control" value="{{ old('original_name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên tiếng Việt <span class="text-danger">*</span></label>
                        <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ngày phát hành <span class="text-danger">*</span></label>
                        <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả <span class="text-danger">*</span></label>
                        <textarea name="overview_vn" class="form-control" rows="5">{{ old('overview_vn') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ảnh đại diện <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5">Lưu phim</button>
                        <a href="{{ route('quanly') }}" class="btn btn-secondary px-4 ms-2">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-movie-layout>