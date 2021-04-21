<?php

namespace App\View\Components\admin\category;

use Illuminate\View\Component;

class ShowCategory extends Component
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
        return view('components.admin.category.show-category');
    }
}
