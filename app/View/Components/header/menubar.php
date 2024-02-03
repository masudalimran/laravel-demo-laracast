<?php

namespace App\View\Components\header;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class menubar extends Component
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
        $parameters = Route::current()->parameters();
        $currentCategory = null;
        if ($parameters) {
            if (isset($parameters['post']))
                $currentCategory = $parameters['post']->category;
            else if (isset($parameters['category']))
                $currentCategory = $parameters['category'];
        }
        return view('components.header.menubar', [
            'categories' => Category::all(),
            'currentCategory' => $currentCategory

        ]);
    }
}
