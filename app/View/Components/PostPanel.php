<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class PostPanel extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->posts = $post->with(['user', 'category'])->withTrashed()->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-panel');
    }
}
