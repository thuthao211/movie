<x-movie-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <x-slot name="title">Quản lý phim</x-slot>

    <div class="container mt-4">
        <h2 style='text-align:center'>DANH SÁCH PHIM</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('create') }}" class="btn btn-success mb-3">Thêm</a>

        <table id="id-table" class="table table-bordered ">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày chiếu</th>
                    <th>Điểm</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td class="text-center" style="width: 100px;">
                        <img src="{{ asset('storage/'.$movie->image) }}" style="width:100%;">
                    </td>
                    
                    <td class="fw-bold">{{ $movie->movie_name_vn }}</td>
                    <td>{{ Str::limit($movie->overview_vn, 60) }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->vote_average }}</td>
                    
                    <td style="min-width: 110px;">
                        <a href="/chitiet" class="btn btn-primary btn-sm">Xem</a>
                        <a href="{{ route('delete', $movie->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?');">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                bStateSave: true
            });
        });
    </script>
</x-movie-layout>