<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class UserPanel extends Component
{
    public $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->users = $user->withTrashed()->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-panel');
    }
}
