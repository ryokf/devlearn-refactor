<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the category that owns the Course
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the author that owns the Course
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Get all of the lessons for the Course
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    /**
     * Get all of the userCourse for the Course
     */
    public function userCourse(): HasMany
    {
        return $this->hasMany(UserCourse::class, 'course_id', 'id');
    }

    /**
     * Get all of the certificates for the Course
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'course_id', 'id');
    }

    /**
     * Get the voucher that owns the Course
     */
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    }
}
