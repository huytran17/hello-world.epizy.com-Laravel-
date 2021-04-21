<?php

namespace App\View\Components\admin\quote;

use Illuminate\View\Component;

class EditQuote extends Component
{


    public $quote;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($quote)
    {
        $this->quote = $quote;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.quote.edit-quote');
    }
}
