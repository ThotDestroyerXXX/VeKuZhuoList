<div>
    <h3>Picked For You</h1>
        <hr />
        <div class="d-flex flex-column overflow-auto gap-3">
            @foreach ($animes as $anime)
                <div class="rounded-0 border-0 d-flex flex-row gap-4">
                    <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}" class="bg-primary"
                        style="object-fit: cover; object-position: top; width: 12rem; height: 17rem; " />
                    <div class="">

                        <a href="{{ route('anime', $anime) }}">
                            <p class="card-title fw-semibold mb-2 anime-title">{{ $anime->anime_name }}</p>
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
