<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MemberList extends Component
{
    public $id;

    public $chapter;

    public $title;

    public $description;

    public $photo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $chapter,
        $title,
        $description,
        $photo,

    ) {
        $this->id = $id;
        $this->chapter = $chapter;
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.member-list');
    }
}
