<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignmentScore extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    /**
     * Get the assignment that owns the AssignmentScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assingment_id', 'id');
    }
}
