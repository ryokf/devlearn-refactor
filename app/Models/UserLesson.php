<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the user for the UserCourse
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the course for the UserCourse
     */
    public function lessons(): belongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
