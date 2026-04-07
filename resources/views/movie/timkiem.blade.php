<x-movie-layout>

    <x-slot name="title">
        Kết quả tìm kiếm
    </x-slot>

    <h3>Kết quả cho: "{{ $keyword }}"</h3>

    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie" style="width:200px; display:inline-block; margin:10px">

                <a href="{{ url('/chitiet/'.$movie->id) }}">
                    <img src="{{ asset('storage/'.$movie->image) }}" style="width:100%">
                </a>

                    <h6>{{ $movie->movie_name_vn }}</h6>
                    <p>{{ $movie->release_date }}</p>

            </div>
        @endforeach
    </div>

</x-movie-layout>