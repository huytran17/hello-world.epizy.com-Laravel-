<?php

namespace App\View\Components\client\post;

use Illuminate\View\Component;

class Show extends Component
{
    public $post, $cates, $popularPosts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $cates, $popularPosts)
    {
        $this->post = $post;

        $this->cates = $cates;

        $this->popularPosts = $popularPosts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.post.show');
    }
}
