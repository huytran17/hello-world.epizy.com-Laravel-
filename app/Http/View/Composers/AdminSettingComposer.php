<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Services\AdminService;

class AdminSettingComposer extends AdminService
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
            'site' => $this->getSite(),
        ]);
    }
}