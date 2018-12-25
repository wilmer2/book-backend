<?php

namespace App\Containers\Like\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\User\Model\User;

class Like extends Model
{
    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likeable()
    {
        return $this->morphTo();
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'likes';
}
