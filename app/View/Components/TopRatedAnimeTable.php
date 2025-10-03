<?php

namespace App\View\Components;

use App\Models\Anime;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopRatedAnimeTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('top-rated.sections.top-rated-anime-table', [
            'topRatedAnime' => Anime::orderBy('mal_score', 'desc')->simplePaginate(10),
        ]);
    }
}
