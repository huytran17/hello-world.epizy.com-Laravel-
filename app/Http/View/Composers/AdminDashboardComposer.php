<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Services\AdminService;

class AdminDashboardComposer extends AdminService
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
            'new_post_in_month' => $this->newPostInMonth(),
            'new_user_in_month' => $this->newUserInMonth(),
            'posts' => $this->_post->withTrashed()->with(['user', 'category'])->get(),
            'users' => $this->_user->withTrashed()->get(),
        ]);
    }
}