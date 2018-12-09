<?php

namespace App\Containers\Book\Models;

use App\Ship\Parents\Models\Model;

class Book extends Model
{
    protected $fillable = [
      'name',
      'description',
      'copyright',
      'image_url',
      'user_id',
      'category_id',
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
    protected $resourceKey = 'books';
}
