@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="mb-4">{{ $genre->genre_name }} animes</h3>
        <div class="row gy-4 gx-4">
            @foreach ($animes as $anime)
                <div class="col-12 col-md-6 col-lg-4">
                    <div>
                        <a href="{{ route('anime', $anime) }}">
                            <p class="card-title fw-semibold mb-2 anime-title text-center">{{ $anime->anime_name }}</p>
                        </a>
                        <div class="text-center d-flex flex-row" style="justify-content: center; gap: 1rem;">
                            <p class="text-center text-secondary">{{ $anime->release_date }}</p>
                            <p class="text-secondary">{{ $anime->total_episodes }} eps</p>
                        </div>
                        <div class="bg-secondary d-flex flex-row p-2 justify-content-center"
                            style="--bs-bg-opacity: .4; gap: 0.5rem;">
                            @foreach ($anime->genres as $genre)
                                <span class="badge bg-secondary">{{ $genre->genre_name }}</span>
                            @endforeach
                        </div>
                        <div class="d-flex flex-row h-100 mt-4" style="gap: 1rem;">
                            <div style="flex-shrink: 0;">
                                <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}"
                                    class="img-fluid"
                                    style="object-fit: cover; object-position: top; height: 18rem; width: 12rem;" />
                            </div>
                            <div class="flex-grow-1 d-flex flex-column" style="height: 18rem;">
                                <div class="card-body d-flex flex-column h-100 p-2">
                                    <div class="flex-grow-1 synopsis-container">
                                        <p class="card-text text-light">
                                            {{ $anime->synopsis }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-row align-items-center justify-content-center mt-3" style="gap: 2rem;">
                        <p class='text-secondary'>Rating: {{ $anime->mal_score }}</p>
                        <p class='text-secondary'>Views: {{ number_format($anime->views) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
