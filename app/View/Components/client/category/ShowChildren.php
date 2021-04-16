<?php

namespace App\View\Components\client\category;

use Illuminate\View\Component;

class ShowChildren extends Component
{
    public $cate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cate)
    {
        $this->cate = $cate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.category.show-children');
    }
}
