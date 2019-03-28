<?php

namespace App\Containers\Page\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\Book\Models\Book;
use App\Containers\Comment\Models\Comment;
use App\Containers\Like\Models\Like;


class Page extends Model
{
    protected $fillable = [
      'book_id',
      'text',
      'image_url',
      'title',
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

    public function getFileUrlAttribute() 
    {
        return $this->image_url ? \Storage::url($this->image_url) : null;
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'pages';
}
