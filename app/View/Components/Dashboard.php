<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dashboard extends Component
{
    public $posts, $users, $new_user_in_month, $new_post_in_month;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts, $users, $newPostInMonth, $newUserInMonth)
    {
        $this->posts = $posts;

        $this->users = $users;

        $this->new_post_in_month = $newPostInMonth;

        $this->new_user_in_month = $newUserInMonth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard');
    }
}
