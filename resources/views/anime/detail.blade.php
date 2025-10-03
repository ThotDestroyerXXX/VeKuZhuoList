@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center p-2 bg-secondary" style="--bs-bg-opacity: .4">
            <h3>{{ $anime->anime_name }}</h3>
            <a href="{{ route('anime.edit', $anime) }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="d-flex flex-column flex-lg-row gap-4 my-4">
            <div class='d-flex flex-column px-4 flex-shrink-0' style="width: 20rem; gap: 1rem;">
                <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}" class="bg-primary my-3"
                    style="object-fit: cover; object-position: top; width: 100%; height: auto; aspect-ratio: 3/4;" />
                <div class="justify-content-around d-flex flex-row">
                    <div class="text-center">
                        <div class="badge bg-primary text-light">Score</div>
                        <p class="fw-semibold">{{ $anime->mal_score }}</p>
                    </div>
                    <div class="text-center">
                        <div class="badge bg-primary text-light">Views</div>
                        <p class="fw-semibold">{{ number_format($anime->views) }}</p>
                    </div>
                </div>
                <div>
                    <h4>Information</h4>
                    <hr />
                    <p>Name: {{ $anime->anime_name }}</p>
                    <p>Release Date: {{ $anime->release_date }}</p>
                    <p>Episodes: {{ $anime->total_episodes }} eps</p>
                    <p>Studio: <a href="{{ route('studio', $anime->studio) }}">{{ $anime->studio->studio_name }}</a></p>

                    <div class="d-flex flex-row flex-wrap" style="gap: 0.5rem;">
                        <p>Genres:</p>
                        @foreach ($anime->genres as $genre)
                            <a href="{{ route('genre', $genre) }}">{{ $genre->genre_name }}</a>
                        @endforeach
                    </div>
                    <p>Season: <a href="{{ route('season', $anime->season) }}">{{ $anime->season->season_name }}</a></p>
                </div>
                <div>
                    <h4>Statistic</h4>
                    <hr />
                    <p>Score: {{ $anime->mal_score }}</p>
                    <p>Views: {{ number_format($anime->views) }}</p>
                </div>
            </div>
            <div class='d-flex flex-column gap-4'>
                <div>
                    <h4>Synopsis</h4>
                    <hr />
                    <p>{{ $anime->synopsis }}</p>
                </div>
                <div>
                    <h4>Trailer</h4>
                    <hr />
                    @if ($anime->trailer_url)
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/{{ $anime->trailer_url }}" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    @else
                        <p class="text-muted">No trailer available.</p>
                    @endif
                </div>
                <div>
                    <h4>Characters & Voice Actors</h4>
                    <hr />
                    @foreach ($anime->characters as $character)
                        <div class="d-flex flex-row align-items-center mb-3 justify-content-between" style="gap: 5rem;">
                            <div class="d-flex flex-row align-items-center gap-4">
                                <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}"
                                    class="bg-primary"
                                    style="width: 5rem; height: auto; object-fit: cover; object-position: top;" />
                                <p class="mb-1 fw-semibold">{{ $character->character_name }}</p>
                            </div>
                            <div class="d-flex flex-row align-items-center gap-4">

                                @if ($character->voiceActor)
                                    <a href="{{ route('voice-actor', $character->voiceActor) }}"
                                        class="d-flex flex-row gap-4 align-items-center text-center text-decoration-none text-light">
                                        <p class="mb-0">VA: {{ $character->voiceActor->voice_actor_name }}</p>
                                        <img src="{{ $character->voiceActor->voice_actor_image }}"
                                            alt="{{ $character->voiceActor->voice_actor_name }}" class="bg-primary"
                                            style="width: 5rem; height: auto; object-fit: cover; object-position: top;" />
                                    </a>
                                @else
                                    <p class="mb-0">VA: Unknown</p>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
