@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="mb-4">Add New Anime</h3>

        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="anime_name" class="form-label">Anime Name</label>
                        <input type="text" class="form-control @error('anime_name') is-invalid @enderror" id="anime_name"
                            name="anime_name" value="{{ old('anime_name') }}" required>
                        @error('anime_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="views" class="form-label">Views</label>
                        <input type="number" class="form-control @error('views') is-invalid @enderror" id="views"
                            name="views" value="{{ old('views', 0) }}">
                        @error('views')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis" rows="6"
                            required>{{ old('synopsis') }}</textarea>
                        @error('synopsis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_episodes" class="form-label">Total Episodes</label>
                        <input type="number" class="form-control @error('total_episodes') is-invalid @enderror"
                            id="total_episodes" name="total_episodes" value="{{ old('total_episodes') }}" required>
                        @error('total_episodes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="studio_id" class="form-label">Studio</label>
                        <select class="form-select @error('studio_id') is-invalid @enderror" id="studio_id" name="studio_id"
                            required>
                            <option value="" disabled {{ old('studio_id') ? '' : 'selected' }}>Select a Studio
                            </option>
                            @foreach ($studios as $studio)
                                <option value="{{ $studio->id }}"
                                    {{ old('studio_id') == $studio->id ? 'selected' : '' }}>
                                    {{ $studio->studio_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('studio_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="season_id" class="form-label">Season</label>
                        <select class="form-select @error('season_id') is-invalid @enderror" id="season_id" name="season_id"
                            required>
                            <option value="" disabled {{ old('season_id') ? '' : 'selected' }}>Select a Season
                            </option>
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}"
                                    {{ old('season_id') == $season->id ? 'selected' : '' }}>
                                    {{ $season->season_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('season_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                            id="release_date" name="release_date" value="{{ old('release_date') }}" required>
                        @error('release_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mal_score" class="form-label">MAL Score</label>
                        <input type="number" step="0.01" class="form-control @error('mal_score') is-invalid @enderror"
                            id="mal_score" name="mal_score" value="{{ old('mal_score') }}" required>
                        @error('mal_score')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="trailer_url" class="form-label">Trailer URL</label>
                        <input type="text" class="form-control @error('trailer_url') is-invalid @enderror"
                            id="trailer_url" name="trailer_url" value="{{ old('trailer_url') }}"
                            placeholder="https://www.youtube.com/watch?v=...">
                        @error('trailer_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                            required>
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
                            <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" accept="image/*" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="genres">Genre</label>
                        <div class="row">
                            @foreach ($genres as $index => $genre)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input @error('genres') is-invalid @enderror"
                                            type="checkbox" value="{{ $genre->id }}" id="genre{{ $genre->id }}"
                                            name="genres[]"
                                            {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genre{{ $genre->id }}">
                                            {{ $genre->genre_name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('genres')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <h3>Characters</h3>
                </div>
                <hr />
                <div class="col-12" id="characters-container">
                    @if (old('character_name'))
                        @foreach (old('character_name') as $index => $characterName)
                            <div class="character-entry mb-3">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-3">
                                        <label for="character_image_url[]" class="form-label">Character Image URL</label>
                                        <input type="url"
                                            class="form-control @error('character_image_url.' . $index) is-invalid @enderror"
                                            name="character_image_url[]"
                                            value="{{ old('character_image_url.' . $index) }}"
                                            placeholder="https://example.com/image.jpg">
                                        @error('character_image_url.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="character_name[]" class="form-label">Character Name</label>
                                        <input type="text"
                                            class="form-control @error('character_name.' . $index) is-invalid @enderror"
                                            name="character_name[]" value="{{ $characterName }}" required>
                                        @error('character_name.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="voice_actor_id[]" class="form-label">Voice Actors</label>
                                        <select
                                            class="form-select @error('voice_actor_id.' . $index) is-invalid @enderror"
                                            name="voice_actor_id[]" required>
                                            <option value="" disabled
                                                {{ old('voice_actor_id.' . $index) ? '' : 'selected' }}>Select a Voice
                                                Actor</option>
                                            @foreach ($voiceActors as $voiceActor)
                                                <option value="{{ $voiceActor->id }}"
                                                    {{ old('voice_actor_id.' . $index) == $voiceActor->id ? 'selected' : '' }}>
                                                    {{ $voiceActor->voice_actor_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('voice_actor_id.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-sm remove-character-btn"
                                            style="display: {{ $loop->first && count(old('character_name')) == 1 ? 'none' : 'inline-block' }};">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="character-entry mb-3">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-3">
                                    <label for="character_image_url[]" class="form-label">Character Image URL</label>
                                    <input type="url"
                                        class="form-control @error('character_image_url.*') is-invalid @enderror"
                                        name="character_image_url[]" placeholder="https://example.com/image.jpg">
                                    @error('character_image_url.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="character_name[]" class="form-label">Character Name</label>
                                    <input type="text"
                                        class="form-control @error('character_name.*') is-invalid @enderror"
                                        name="character_name[]" required>
                                    @error('character_name.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="voice_actor_id[]" class="form-label">Voice Actors</label>
                                    <select class="form-select @error('voice_actor_id.*') is-invalid @enderror"
                                        name="voice_actor_id[]" required>
                                        <option value="" disabled selected>Select a Voice Actor</option>
                                        @foreach ($voiceActors as $voiceActor)
                                            <option value="{{ $voiceActor->id }}">
                                                {{ $voiceActor->voice_actor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('voice_actor_id.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-character-btn"
                                        style="display: none;">Remove</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-secondary" id="add-character-btn">Add Character</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add Anime</button>
                </div>
            </div>


        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const charactersContainer = document.getElementById('characters-container');
            const addCharacterBtn = document.getElementById('add-character-btn');
            let characterCount = 1;

            // Add character functionality
            addCharacterBtn.addEventListener('click', function() {
                characterCount++;

                const newCharacterEntry = document.createElement('div');
                newCharacterEntry.className = 'character-entry mb-3';
                newCharacterEntry.innerHTML = `
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="character_image_url[]" class="form-label">Character Image URL</label>
                            <input type="url" class="form-control" name="character_image_url[]" placeholder="https://example.com/image.jpg">
                        </div>
                        <div class="col-md-3">
                            <label for="character_name[]" class="form-label">Character Name</label>
                            <input type="text" class="form-control" name="character_name[]" required>
                        </div>
                        <div class="col-md-4">
                            <label for="voice_actor_id[]" class="form-label">Voice Actors</label>
                            <select class="form-select" name="voice_actor_id[]" required>
                                <option value="" disabled selected>Select a Voice Actor</option>
                                @foreach ($voiceActors as $voiceActor)
                                    <option value="{{ $voiceActor->id }}">{{ $voiceActor->voice_actor_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-character-btn">Remove</button>
                        </div>
                    </div>
                `;

                charactersContainer.appendChild(newCharacterEntry);
                updateRemoveButtons();
            });

            // Remove character functionality
            charactersContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-character-btn')) {
                    e.target.closest('.character-entry').remove();
                    characterCount--;
                    updateRemoveButtons();
                }
            });

            // Function to show/hide remove buttons
            function updateRemoveButtons() {
                const characterEntries = charactersContainer.querySelectorAll('.character-entry');
                const removeButtons = charactersContainer.querySelectorAll('.remove-character-btn');

                removeButtons.forEach(button => {
                    if (characterEntries.length > 1) {
                        button.style.display = 'inline-block';
                    } else {
                        button.style.display = 'none';
                    }
                });
            }

            // Initial setup
            updateRemoveButtons();
        });
    </script>
@endsection
