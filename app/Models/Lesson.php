<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the course that owns the Lesson
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'lesson_id', 'id');
    }

    /**
     * Get all of the assignments for the Lesson
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class, 'lessons_id', 'id');
    }

    public function lessonComments(): HasMany
    {
        return $this->hasMany(LessonComment::class, 'lesson_id', 'id');
    }
}
