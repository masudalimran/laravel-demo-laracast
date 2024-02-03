<?php

namespace App\View\Components\footer;

use App\Models\Category;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class footer2 extends Component
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
        $category2 = Category::find(2);
        $postsByCategory = Post::filter($category2->id)->get();
        return view('components.footer.footer2', [
            'category2' => $category2,
            'posts' => $postsByCategory->take(2)
        ]);
    }
}
