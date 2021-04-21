<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Website;

class SiteComposer
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
            'site' => Website::first()
        ]);
    }
}