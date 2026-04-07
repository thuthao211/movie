<x-movie-layout :genre="$genre">
    <x-slot name="title">
        {{ $movie->movie_name_vn }}
    </x-slot>
    <div class="row" style="color: #333; background: #fff; padding:20px; border-radius:10px;">
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$movie->image) }}" style="width:100%; border-radius: 10px; box-shadow:0 4px 10px rgba(0,0,0,0.3);">
        </div>
        <div class="col-md-8">
            <h2 style="font-weight:bold;">
                {{ $movie->movie_name_vn }} - {{ $movie->movie_name }}
            </h2>
            <p><b>Ngày phát hành:</b> {{ date('Y-m-d', strtotime($movie->release_date)) }}</p>
            <p><b>Quốc gia:</b> {{ $movie->country_name }}</p>
            <p><b>Thời gian:</b> {{ $movie->runtime }} phút</p>
            <p><b>Doanh thu:</b> {{ number_format($movie->revenue) }}</p>
            <hr>
            <h4><b>Mô tả:</b></h4>
            <p style="text-align: justify;">
                {{ $movie->overview_vn}}
            </p>
            @if($movie->trailer)
                <a href="{{ $movie->trailer }}" 
                   target="_blank"
                   style="background:#28a745; color:white; padding:8px 15px; border-radius:5px; text-decoration:none;">
                   Xem trailer
                </a>
            @endif
        </div>
    </div>
</x-movie-layout>