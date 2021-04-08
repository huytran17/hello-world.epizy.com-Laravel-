<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Quote;

class QuotePanel extends Component
{
    public $quotes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Quote $quote)
    {
        $this->quotes = $quote->with(['user'])->withTrashed()->latest()->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.quote-panel');
    }
}
