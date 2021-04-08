<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryPanel extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->categories = $category->with(['user', 'parent'])->withTrashed()->latest()->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-panel');
    }
}
