<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the course for the Category
     */
    public function course(): HasMany
    {
        return $this->hasMany(Course::class, 'id_category', 'id');
    }
}
