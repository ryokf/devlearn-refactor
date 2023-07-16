<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLesson extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    /**
     * Get all of the user for the UserCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the course for the UserCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function courses(): belongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
