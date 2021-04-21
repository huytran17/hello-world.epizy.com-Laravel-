<?php

namespace App\View\Components\admin\category;

use Illuminate\View\Component;

class EditCategory extends Component
{
    public $cate, $parents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cate, $parents)
    {
        $this->cate = $cate;

        $this->parents = $parents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.category.edit-category');
    }
}
