<?php

namespace App\Models;

use App\Helpers\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;

class Pet extends Model
{
    use HasFactory;
    use Attachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hp',
        'user_id',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'hp',
        'user_id',
    ];

//    public function getAvatar(): ?Image
//    {
//        if ($this->attachment && $this->attachment->count() > 0) {
//            return $this->attachment[0]->getImage();
//        }
//
//        return null;
//    }
}
