<?php

namespace App\Containers\BookProgress\Models;

use App\Ship\Parents\Models\Model;

class BookProgress extends Model
{
    protected $fillable = [
      'user_id',
      'book_id',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'bookprogresses';
}
