<?php

namespace App\View\Components\admin\post;

use Illuminate\View\Component;

class CreatePost extends Component
{
    public  $parentCates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $parentCates)
    {
        

        $this->parentCates = $parentCates;
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
