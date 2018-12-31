<?php

namespace App\Containers\ReadingList\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\Book\Models\Book;

class ReadingList extends Model
{
    protected $fillable = [
      'name',
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

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'readinglists';
}
