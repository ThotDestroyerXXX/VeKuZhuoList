<div>
    <table class="table table-dark table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Title</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topRatedAnime as $anime)
                <tr>
                    <th scope="row">
                        {{ ($topRatedAnime->currentPage() - 1) * $topRatedAnime->perPage() + $loop->iteration }}</th>
                    <td>
                        <div class="d-flex flex-row gap-3 align-items-center">
                            <img src="{{ asset('storage/' . $anime->image_url) }}" alt="{{ $anime->anime_name }}"
                                class="bg-primary"
                                style="object-fit: cover; object-position: top; width: 4rem; height: 6rem;" />
                            <div>
                                <a href="{{ route('anime', $anime) }}">
                                    <p class="card-title fw-semibold mb-2 anime-title text-center">
                                        {{ $anime->anime_name }}</p>
                                </a>
                                <p class="mb-1 small text-truncate" style="color: rgb(150, 150, 150)">
                                    {{ $anime->release_date }}</p>
                                <p class="mb-1 small text-truncate" style="color: rgb(150, 150, 150)">
                                    {{ number_format($anime->views) }} views</p>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">{{ number_format($anime->mal_score, 1) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $topRatedAnime->links() }}
    </div>
</div>
