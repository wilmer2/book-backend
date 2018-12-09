<?php

namespace App\Containers\Category\Models;

use App\Ship\Parents\Models\Model;

class Category extends Model
{
    protected $fillable = [
      'name',
      'active',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
      'active' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'categories';
}
