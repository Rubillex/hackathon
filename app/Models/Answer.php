<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $value
 * @property int $user_id
 * @property int $question_id
 */
class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';

    protected $fillable = [
        'value',
        'user_id',
        'question_id',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
