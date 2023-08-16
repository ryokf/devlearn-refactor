<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ReplyCommentSection extends Component
{
    public $id;

    public $name;

    public $photo;

    public $replyTo;

    public $reply;

    public $user;

    /**
     * Create a new component instance.
     *
     * @param  int  $id
     * @param  string  $name
     * @param  string  $photo
     * @param  string  $replyTo
     * @param  string  $reply
     */
    public function __construct($id, $name, $photo, $replyTo, $reply)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
        $this->replyTo = $replyTo;
        $this->reply = $reply;
        $this->user = User::find($this->id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reply-comment-section');
    }
}
