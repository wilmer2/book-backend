<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Book\Models\Book;
use App\Containers\Category\Models\Category;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Notifications\Notifiable;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends UserModel implements ChargeableInterface
{

    use ChargeableTrait;
    use AuthorizationTrait;
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
        'active',
        'categories_ids',
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
        'active' => 'boolean',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function preferences()
    {
        return $this->belongsToMany(Category::class);
    }

}
