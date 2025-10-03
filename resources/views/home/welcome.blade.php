@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row transition-opacity opacity-100 duration-750 starting:opacity-0 container-fluid"
        style="gap: 2rem;">
        <div class="d-flex flex-column w-75 transition-opacity opacity-100 duration-750 starting:opacity-0"
            style="gap: 2rem;">
            <x-summer-anime />
            <x-picked-for-you />
        </div>
        <div class="d-flex flex-column flex-grow-1 transition-opacity opacity-100 duration-750 starting:opacity-0"
            style="gap: 2rem;">
            <x-top-viewed-anime />
            <x-top-rated-anime />
        </div>
    </div>
@endsection
