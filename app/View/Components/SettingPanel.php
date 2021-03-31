<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SettingPanel extends Component
{
    public $site;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($site)
    {
        $this->site = $site;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.setting-panel');
    }
}
