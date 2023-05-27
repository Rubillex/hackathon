<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourceCompleted extends Model
{
    use HasFactory;

    protected $fillable = [
        'cource_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cource(): BelongsTo
    {
        return $this->belongsTo(Cource::class, 'cource_id', 'id');
    }
}
