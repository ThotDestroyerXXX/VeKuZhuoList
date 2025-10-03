<div>
    <h3>Summer 2024 Anime</h1>
        <hr />
        <div class="d-flex overflow-auto gap-3">
            @foreach ($animes as $anime)
                <a href="{{ route('anime', $anime) }}">
                    <div class="card rounded-0 border-0" style="width: 12rem;">
                        <div class="position-relative"
                            style="height: 17rem; background-image: url('{{ asset('storage/' . $anime->image_url) }}'); background-size: cover; background-position: center;">
                            {{-- Optional overlay for text on image --}}
                            <div class="position-absolute bottom-0 start-0 w-100 px-3 z-0"
                                style="height: 5rem; background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 px-3 z-2">

                                <p class="card-title mb-2 fw-semibold text-truncate ">
                                    {{ $anime->anime_name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
</div>
