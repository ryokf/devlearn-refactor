<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardSidebar extends Component
{
    public $menu;

   /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menu = $this->menu;
        return view('components.dashboard-sidebar', compact('menu'));
    }
}
