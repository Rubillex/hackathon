<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Platform\Models\User as OrchidUser;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $permissions
 * @property boolean $is_student
 * @property boolean $is_teacher
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
        'is_student',
        'is_teacher',
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

    public function lastSeenCources(): BelongsToMany
    {
        return $this->belongsToMany(Cource::class, 'cource_vieweds', 'user_id', 'cource_id');
    }

    public function completedCources(): BelongsToMany
    {
        return $this->belongsToMany(Cource::class, 'cource_completeds', 'user_id', 'cource_id');
    }

    public function cources(): BelongsToMany
    {
        return $this->belongsToMany(Cource::class, 'cource_users', 'user_id', 'cource_id');
    }

    public function myCources(): BelongsToMany
    {
        return $this->cources()->where('creator_id', '=', $this->id);
    }
}
