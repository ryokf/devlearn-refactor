<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCourse extends Model
{
    use HasFactory;

    /**
     * Get all of the user for the UserCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the course for the UserCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course(): HasMany
    {
        return $this->hasMany(Course::class, 'course_id', 'id');
    }
}
