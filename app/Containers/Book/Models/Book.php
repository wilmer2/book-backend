<?php

namespace App\Containers\Book\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;
use App\Containers\Category\Models\Category;
use App\Containers\Page\Models\Page;
use App\Containers\Comment\Models\Comment;
use App\Containers\Viewer\Models\Viewer;
use App\Containers\Like\Models\Like;


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
      'views' => 'int',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getFileUrlAttribute() 
    {
        return $this->image_url ? \Storage::url($this->image_url) : null;
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function viewers() 
    {
        return $this->hasMany(Viewer::class);
    }

    public function pages() 
    {
        return $this->hasMany(Page::class);
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
    protected $resourceKey = 'books';
}
