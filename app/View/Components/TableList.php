<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableList extends Component
{
    public $id;

    public $number;

    public $title;

    public $price;

    public $category;

    public $member;

    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $number,
        $title,
        $price,
        $category,
        $member,
        $status,

    ) {
        $this->$id = $id;
        $this->$number = $number;
        $this->$title = $title;
        $this->$price = $price;
        $this->$category = $category;
        $this->$member = $member;
        $this->$status = $status;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-list');
    }
}
