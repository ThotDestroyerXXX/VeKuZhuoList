<nav class="navbar navbar-expand-lg">
    <div class="container-fluid flex-column d-flex align-items-start">
        <a class="navbar-brand fw-bold fs-3" href="/">VeKuZhuoList</a>
        <div class="collapse navbar-collapse w-100 justify-content-between " id="navbarSupportedContent"
            style="background-color: #2f53a2;">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">Anime</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/top-viewed">Top Viewed Anime</a></li>
                        <li><a class="dropdown-item" href="/top-rated">Top Rated Anime</a></li>
                        <li><a class="dropdown-item" href="{{ route('anime.add') }}">Add New Anime</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">Studio</a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Adventure</a></li>
                        <li><a class="dropdown-item" href="#">Romance</a></li>
                        <li><a class="dropdown-item" href="#">Comedy</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">All Genres</a></li> --}}
                        @foreach ($studios as $studio)
                            <li><a class="dropdown-item"
                                    href="/studio/{{ $studio->id }}">{{ $studio->studio_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">Genre</a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Adventure</a></li>
                        <li><a class="dropdown-item" href="#">Romance</a></li>
                        <li><a class="dropdown-item" href="#">Comedy</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">All Genres</a></li> --}}
                        @foreach ($genres as $genre)
                            <li><a class="dropdown-item"
                                    href="{{ route('genre', $genre->id) }}">{{ $genre->genre_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Season
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($seasons as $season)
                            <li><a class="dropdown-item"
                                    href="{{ route('season', $season->id) }}">{{ $season->season_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form class="d-flex flex-row" role="search" method="GET" action="{{ route('search') }}">
                @csrf
                <div class="input-group">
                    <input class="form-control " type="search" placeholder="Search anime..." aria-label="Search"
                        name="q" />
                    <button class="btn btn-outline-primary me-4" type="submit"><i
                            class="bi bi-search text-white"></i></button>
                </div>

            </form>
        </div>
    </div>
</nav>
