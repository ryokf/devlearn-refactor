<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class CommentSection extends Component
{
    public $id;
    public $userId;
    public $name;
    public $photo;
    public $comment;
    public $replyCount;
    public $user;

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
    public function __construct($id, $userId, $name, $photo, $comment, $replyCount)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->photo = $photo;
        $this->comment = $comment;
        $this->replyCount = $replyCount;
        $this->user = User::find($this->userId);
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
