<?php

namespace App\View\Components;

use Illuminate\View\Component;

class author_alert extends Component
{
    public $bgColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bgColor)
    {
        $this->bgColor = $bgColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.author_alert');
    }
}
