<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\ReadingList\UI\API\Transformers\ReadingListTransformer;


use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class UserPrivateProfileTransformer.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UserPrivateProfileTransformer extends Transformer
{

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'readinglists',
    ];

    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'preferences',
    ];

    /**
     * @param \App\Containers\User\Models\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $response = [
            'object'               => 'User',
            'id'                   => $user->getHashedKey(),
            'name'                 => $user->name,
            'email'                => $user->email,
            'confirmed'            => $user->confirmed,
            'nickname'             => $user->nickname,
            'gender'               => $user->gender,
            'birth'                => $user->birth,

            'social_auth_provider' => $user->social_provider,
            'social_id'            => $user->social_id,
            'social_avatar'        => [
                'avatar'   => $user->social_avatar,
                'original' => $user->social_avatar_original,
            ],

            'created_at'           => $user->created_at,
            'updated_at'           => $user->updated_at,
            'readable_created_at'  => $user->created_at->diffForHumans(),
            'readable_updated_at'  => $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $user->id,
            'deleted_at' => $user->deleted_at,
        ], $response);

        return $response;
    }

    public function includePreferences(User $user)
    {
        return $this->collection($user->preferences, new CategoryTransformer());
    }

    public function includeReadinglists(User $user)
    {
        return $this->collection($user->readingLists, new ReadingListTransformer());
    }

    /*public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }*/

}
