<?php

namespace App\View\Components\client\post;

use Illuminate\View\Component;

class NewestPost extends Component
{
    public $newest;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($newest)
    {
        $this->newest = $newest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.post.newest-post');
    }
}
