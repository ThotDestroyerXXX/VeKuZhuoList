@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center p-2 bg-secondary" style="--bs-bg-opacity: .4">
            <h3>{{ $voiceActor->voice_actor_name }}</h3>
        </div>
        <div class="d-flex flex-row mt-4">
            <div class="d-flex flex-column w-25">
                <img src="{{ $voiceActor->voice_actor_image }}" alt="{{ $voiceActor->name }}" class="bg-primary mb-3"
                    style="object-fit: cover; object-position: top; width: 100%; height: auto;" />
            </div>
            <div class="d-flex flex-column flex-grow-1 w-75" style=" margin-left: 2rem;">
                <h3 class="mb-0">Voice acting roles</h3>
                <hr />
                <div class="d-flex flex-column" style="gap: 1rem;">
                    @foreach ($voiceActor->character as $character)
                        <div class="d-flex flex-row mb-3 justify-content-between" style="gap: 5rem;">
                            <div class="d-flex flex-row gap-4">
                                <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}"
                                    class="bg-primary"
                                    style="width: 5rem; height: auto; object-fit: cover; object-position: top;" />
                                <p class="mb-1 fw-semibold">{{ $character->character_name }}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">

                                @if ($character->anime)
                                    <a href="{{ route('anime', $character->anime) }}"
                                        class="d-flex flex-row gap-4 text-center text-decoration-none text-light">
                                        <p class="mb-0">{{ $character->anime->anime_name }}</p>
                                        <img src="{{ asset('storage/' . $character->anime->image_url) }}"
                                            alt="{{ $character->anime->anime_name }}" class="bg-primary"
                                            style="width: 5rem; height: auto; object-fit: cover; object-position: top;" />
                                    </a>
                                @else
                                    <p class="mb-0">Unknown</p>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
