<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Platform\Models\User as OrchidUser;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $permissions
 * @property object $pet // todo нормальная дока
 */
class User extends OrchidUser
{
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'email',
        'permissions',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    public function lastSeenCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_vieweds', 'user_id', 'course_id');
    }

    public function completedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_completeds', 'user_id', 'course_id');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_users', 'user_id', 'course_id');
    }

    public function pet(): HasOne
    {
        return $this->hasOne(Pet::class, 'user_id');
    }

    public function stepik(): HasOne
    {
        return $this->hasOne(Platform::class, 'user_id');
    }


    public function myCourses(): BelongsToMany
    {
        return $this->courses()->where('creator_id', '=', $this->id);
    }
}
