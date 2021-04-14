<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

use App\Models\Category;

class ChildrenClientComposer
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
            'category' => Category::orderBy('created_at', 'desc')->with(['user'])->get()
        ]);
    }
}