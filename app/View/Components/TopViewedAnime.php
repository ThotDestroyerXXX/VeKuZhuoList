<?php

namespace App\View\Components;

use App\Models\Anime;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopViewedAnime extends Component
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
        return view('home.sections.top-viewed-anime', [
            'animes' => Anime::orderBy('views', 'desc')->take(5)->get(),
        ]);
    }
}
