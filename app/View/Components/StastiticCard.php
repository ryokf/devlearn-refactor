<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StastiticCard extends Component
{
    public $title;
    public $value;
    public $icon;
    public $iconBgColor;
    public $percentage;
    public $arrow;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title,
        $value,
        $icon,
        $iconBgColor,
        $percentage,
        $arrow
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->iconBgColor = $iconBgColor;
        $this->percentage = $percentage;
        $this->arrow = $arrow;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stastitic-card');
    }
}
