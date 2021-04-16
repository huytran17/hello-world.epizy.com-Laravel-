<?php

namespace App\View\Components\client\category;

use Illuminate\View\Component;

class Index extends Component
{
    public $cates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cates)
    {
        $this->cates = $cates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.category.index');
    }
}
