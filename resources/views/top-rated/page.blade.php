@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column transition-opacity opacity-100 duration-750 starting:opacity-0 container-fluid">
        <div class="p-2 w-100 bg-secondary" style="--bs-bg-opacity: .4;">
            <p class="mb-0 fw-semibold">Top Rated Anime
            </p>
        </div>
        <x-top-rated-anime-table />
    </div>
@endsection
