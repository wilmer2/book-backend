<?php

namespace App\Containers\Like\UI\API\Controllers;

use App\Containers\Like\UI\API\Requests\CreateLikeRequest;
use App\Containers\Like\UI\API\Requests\DeleteLikeRequest;
use App\Containers\Like\UI\API\Requests\GetAllLikesRequest;
use App\Containers\Like\UI\API\Requests\FindLikeByIdRequest;
use App\Containers\Like\UI\API\Requests\UpdateLikeRequest;
use App\Containers\Like\UI\API\Transformers\LikeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Like\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateLikeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLike(CreateLikeRequest $request)
    {
        $like = Apiato::call('Like@CreateLikeAction', [$request]);

        return $this->created($this->transform($like, LikeTransformer::class));
    }

    /**
     * @param FindLikeByIdRequest $request
     * @return array
     */
    public function findLikeById(FindLikeByIdRequest $request)
    {
        $like = Apiato::call('Like@FindLikeByIdAction', [$request]);

        return $this->transform($like, LikeTransformer::class);
    }


    /**
     * @param DeleteLikeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLike(DeleteLikeRequest $request)
    {
        Apiato::call('Like@DeleteLikeAction', [$request]);

        return $this->noContent();
    }
}
