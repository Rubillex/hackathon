<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property int $type
 * @property int $creator_id
 * @property boolean $is_active
 */
class Course extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'creator_id',
        'is_active',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['slug', 'title'],
            ],
        ];
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }
}
