<?php

namespace App\View\Components\admin\post;

use Illuminate\View\Component;

class EditPost extends Component
{
    public $post, $parentCates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $parentCates)
    {
        $this->post = $post;

        $this->parentCates = $parentCates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.post.edit-post');
    }
}
