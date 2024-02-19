<?php

namespace App\View\Components\adminPanel\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class menuBar extends Component
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
        $parameters = Route::current()?->parameters();
        dd($parameters);
        return view('components.admin-panel.header.menu-bar', [
            'path' => '123123'
        ]);
    }
}
