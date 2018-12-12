<?php

namespace App\Containers\Category\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\Book\Models\Book;

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

    public function books() {
      return $this->hasMany(Book::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'categories';
}
