<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property boolean $is_active
 */
class Lesson extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cource_id',
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

    public function cource(): BelongsTo
    {
        return $this->belongsTo(Cource::class, 'cource_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'lesson_id', 'id');
    }
}
