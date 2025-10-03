<div class="d-flex flex-column w-100 overflow-hidden p-0">
    <div class=" p-2 m-0 bg-secondary d-flex flex-row justify-content-between" style="--bs-bg-opacity: .4;">
        <p class="mb-0 fw-semibold">Top Rated Anime
        </p>
        <a href="{{ route('top-rated') }}">See All</a>
    </div>
    <div class="d-flex flex-column gap-3 p-4">
        @foreach ($animes as $anime)
            <div class="rounded-0 border-0 w-100 d-flex flex-row gap-4">
                <div>
                    <span>{{ $loop->iteration }}</span>
                </div>
                <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}" class="bg-primary"
                    style="object-fit: cover; object-position: top; width: 8rem; height: 12rem;" />
                <div class="">
                    <a href="{{ route('anime', $anime) }}">
                        <p class="fw-semibold text-truncate anime-title">
                            {{ $anime->anime_name }}</p>
                    </a>
                    <p>{{ $anime->total_episodes }} eps, scored: {{ $anime->mal_score }}</p>
                    <p>{{ $anime->views }} views</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
