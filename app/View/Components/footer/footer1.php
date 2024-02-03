<?php

namespace App\View\Components\footer;

use App\Models\Category;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class footer1 extends Component
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
        $category1 = Category::first();
        $postsByCategory = Post::filter($category1->id)->get();
        return view('components.footer.footer1', [
            'category1' => $category1,
            'posts' => $postsByCategory->take(2)
        ]);
    }
}
