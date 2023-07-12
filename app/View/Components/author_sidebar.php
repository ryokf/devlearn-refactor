<?php

namespace App\View\Components;

use Illuminate\View\Component;

class author_sidebar extends Component
{
    public $menu = [
        '/author' => ['dashboard', 'fas fa-tv'],
        '/author/create-course' => ['tambah kursus', 'fa-solid fa-person-chalkboard'],
        '/author/search' => ['pencarian', 'fa-solid fa-magnifying-glass'],
        '/author/participant' => ['peserta', 'fa-solid fa-people-line']
    ];

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
        // $name = $this->name;
        return view('components.author_sidebar', compact('menu'));
    }
}
