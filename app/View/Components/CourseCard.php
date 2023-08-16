<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CourseCard extends Component
{
    public $id;

    public $title;

    public $category;

    public $price;

    public $count;

    public $photo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $title,
        $category,
        $price,
        $count,
        $photo
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->price = $price;
        $this->count = $count;
        $this->photo = $photo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course-card');
    }
}
