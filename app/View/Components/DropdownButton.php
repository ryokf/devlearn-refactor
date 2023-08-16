<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownButton extends Component
{
    public $sorts;

    public $buttonColor;

    public $textColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sorts, $buttonColor, $textColor)
    {
        $this->sorts = $sorts;
        $this->buttonColor = $buttonColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown-button');
    }
}
