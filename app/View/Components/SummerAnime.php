<?php

namespace App\View\Components;

use App\Models\Anime;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummerAnime extends Component
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
        return view('home.sections.summer-anime', [
            'animes' => Anime::with('season')->whereHas('season', function ($query) {
                $query->where('season_name', 'Summer 2024');
            })->get(),
        ]);
    }
}
