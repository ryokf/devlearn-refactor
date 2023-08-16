<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentSection extends Component
{
    public $id;
    public $userId;
    public $name;
    public $photo;
    public $comment;

    /**
     * Create a new component instance.
     *
     * @param  int     $id
     * @param  int     $userId
     * @param  string  $name
     * @param  string  $photo
     * @param  string  $comment
     * @return void
     */
    public function __construct($id, $userId, $name, $photo, $comment)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->photo = $photo;
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-section');
    }
}
