<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'photo'
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the userCourse for the User
     */
    public function userCourse(): HasMany
    {
        return $this->hasMany(UserCourse::class, 'user_id', 'id');
    }

    /**
     * Get all of the course for the User
     */
    public function course(): HasMany
    {
        return $this->hasMany(Course::class, 'author_id', 'id');
    }

    /**
     * Get all of the assignmentScore for the User
     */
    public function assignmentScore(): HasMany
    {
        return $this->hasMany(AssignmentScore::class, 'user_id', 'id');
    }
}
