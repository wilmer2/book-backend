<?php

namespace App\Containers\Comment\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;
use App\Containers\Like\Models\Like;

class Comment extends Model
{
    protected $fillable = [
      'body',
      'user_id',
    ];

    protected $attributes = [
      
    ];

    protected $hidden = [

    ];

    protected $casts = [
      'like' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(self::class, 'commentable');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'comments';

}
