<?php

namespace App\Containers\Page\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\Book\Models\Book;

class Page extends Model
{
    protected $fillable = [
      'book_id',
      'text',
      'image_url',
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

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'pages';
}
