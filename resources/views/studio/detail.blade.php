@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $studio->studio_name }}</h3>
        <hr />
        <div class="d-flex flex-row">
            <div class="d-flex flex-column w-25">
                <img src="{{ $studio->studio_logo }}" alt="{{ $studio->studio_name }}" class="bg-primary mb-3"
                    style="object-fit: cover; object-position: top; width: 100%; height: auto; aspect-ratio: 1/1;" />
                <h3 class="mb-0">Information</h3>
                <hr />
                <p>name: {{ $studio->studio_name }}</p>
                <p>{{ $studio->studio_description }}</p>
            </div>
            <div class="d-flex flex-column flex-grow-1 w-75" style=" margin-left: 2rem;">
                <h3 class="mb-4">Products in {{ $studio->studio_name }}</h3>
                <div class="d-flex flex-row flex-wrap" style="gap: 1rem;">
                    @foreach ($studio->anime as $anime)
                        <div class="rounded-0 border-0 d-flex flex-row gap-4">
                            <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}"
                                class="bg-primary"
                                style="object-fit: cover; object-position: top; width: 9rem; height: 13rem; " />
                            <div class="">

                                <a href="{{ route('anime', $anime) }}">
                                    <p class="card-title fw-semibold mb-2 anime-title">{{ $anime->anime_name }}
                                    </p>
                                </a>
                                <p>{{ $anime->total_episodes }} eps, scored: {{ $anime->mal_score }}</p>
                                <p>{{ number_format($anime->views) }} views</p>
                                <p class="line-clamp-3">
                                    {{ $anime->synopsis }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
