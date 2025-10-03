@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Search Results for "{{ $query }}"</h2>

        @if ($animes->count() > 0)
            <h4>Anime ({{ $animes->count() }})</h4>
            <div class="d-flex flex-row flex-wrap gap-3 p-4">
                @foreach ($animes as $anime)
                    <div class="rounded-0 border-0 d-flex flex-row gap-4">
                        <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}" class="bg-primary"
                            style="object-fit: cover; object-position: top; width: 8rem; height: 12rem;" />
                        <div class="">
                            <a href="{{ route('anime', $anime) }}">
                                <p class="fw-semibold text-truncate anime-title line-clamp-1">
                                    {{ $anime->anime_name }}</p>
                            </a>
                            <p>{{ $anime->total_episodes }} eps, scored: {{ $anime->mal_score }}</p>
                            <p>{{ $anime->views }} views</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($studios->count() > 0)
            <h4>Studios ({{ $studios->count() }})</h4>
            <div class="d-flex flex-row flex-wrap gap-3 p-4">
                @foreach ($studios as $studio)
                    <div class="rounded-0 border-0 d-flex flex-column gap-4 align-items-center" style="width: 10rem;">
                        <img src="{{ $studio->studio_logo }}" alt="{{ $studio->studio_name }}" class="bg-primary"
                            style="object-fit: cover; object-position: top; width: 10rem; height: 10rem;" />
                        <div class="align-items-center text-center">
                            <a href="{{ route('studio', $studio) }}">
                                <p class="fw-semibold text-truncate anime-title line-clamp-1">
                                    {{ $studio->studio_name }}</p>
                            </a>
                            <p>{{ $studio->anime->count() }} anime</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($voiceActors->count() > 0)
            <h4>Voice Actors ({{ $voiceActors->count() }})</h4>
            <div class="d-flex flex-row flex-wrap gap-3 p-4">
                @foreach ($voiceActors as $voiceActor)
                    <div class="rounded-0 border-0 d-flex flex-column gap-4" style="width: 9rem; ">
                        <img src="{{ $voiceActor->voice_actor_image }}" alt="{{ $voiceActor->voice_actor_name }}"
                            class="bg-primary"
                            style="object-fit: cover; object-position: top; width: 9rem; height: 13rem;" />
                        <div class="align-items-center text-center">
                            <a href="{{ route('voice-actor', $voiceActor) }}">
                                <p class="fw-semibold text-truncate anime-title line-clamp-1">
                                    {{ $voiceActor->voice_actor_name }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($animes->count() == 0 && $studios->count() == 0 && $voiceActors->count() == 0)
            <p class="text-muted">No results found for "{{ $query }}"</p>
        @endif
    </div>
@endsection
