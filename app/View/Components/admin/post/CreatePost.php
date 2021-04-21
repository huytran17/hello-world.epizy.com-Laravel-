<?php

namespace App\View\Components\admin\post;

use Illuminate\View\Component;

class CreatePost extends Component
{
    public $parentCates, $childCates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parentCates, $childCates)
    {
        $this->parentCates = $parentCates;

        $this->childCates = $childCates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.post.create-post');
    }
}
