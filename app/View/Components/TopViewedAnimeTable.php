<?php

namespace App\View\Components;

use App\Models\Anime;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopViewedAnimeTable extends Component
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
        return view('top-viewed.sections.top-viewed-anime-table', [
            'topViewedAnime' => Anime::orderBy('views', 'desc')->simplePaginate(10),
        ]);
    }
}
