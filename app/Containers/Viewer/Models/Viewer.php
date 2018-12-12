<?php

namespace App\Containers\Viewer\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;
use App\Containers\Book\Models\Book;

class Viewer extends Model
{
    protected $fillable = [
      'ip',
      'book_id',
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

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function book() {
      return $this->belongsTo(Book::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'viewers';
}
