<?php

namespace App\Containers\Read\Models;

use App\Ship\Parents\Models\Model;

class Read extends Model
{
    protected $fillable = [
      'user_id',
      'page_id',
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
    protected $resourceKey = 'reads';
}
