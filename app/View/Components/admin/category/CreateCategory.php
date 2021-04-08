<?php

namespace App\View\Components\admin\category;

use Illuminate\View\Component;

class CreateCategory extends Component
{
    public $parentCates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parentCates)
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
        return view('components.admin.category.create-category');
    }
}
