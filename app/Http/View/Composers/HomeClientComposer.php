<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Post;

class HomeClientComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'posts' => Post::orderBy('created_at', 'desc')->with(['user', 'category'])->withCount('comments')->take(12)->get()
        ]);
    }
}