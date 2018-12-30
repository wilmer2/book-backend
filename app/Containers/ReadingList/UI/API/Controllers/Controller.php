<?php

namespace App\Containers\ReadingList\UI\API\Controllers;

use App\Containers\ReadingList\UI\API\Requests\CreateReadingListRequest;
use App\Containers\ReadingList\UI\API\Requests\DeleteReadingListRequest;
use App\Containers\ReadingList\UI\API\Requests\GetAllReadingListsRequest;
use App\Containers\ReadingList\UI\API\Requests\FindReadingListByIdRequest;
use App\Containers\ReadingList\UI\API\Requests\UpdateReadingListRequest;
use App\Containers\ReadingList\UI\API\Transformers\ReadingListTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ReadingList\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateReadingListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createReadingList(CreateReadingListRequest $request)
    {
        $readinglist = Apiato::call('ReadingList@CreateReadingListAction', [$request]);

        return $this->created($this->transform($readinglist, ReadingListTransformer::class));
    }

    /**
     * @param FindReadingListByIdRequest $request
     * @return array
     */
    public function findReadingListById(FindReadingListByIdRequest $request)
    {
        $readinglist = Apiato::call('ReadingList@FindReadingListByIdAction', [$request]);

        return $this->transform($readinglist, ReadingListTransformer::class);
    }

    /**
     * @param GetAllReadingListsRequest $request
     * @return array
     */
    public function getAllReadingLists(GetAllReadingListsRequest $request)
    {
        $readinglists = Apiato::call('ReadingList@GetAllReadingListsAction', [$request]);

        return $this->transform($readinglists, ReadingListTransformer::class);
    }

    /**
     * @param UpdateReadingListRequest $request
     * @return array
     */
    public function updateReadingList(UpdateReadingListRequest $request)
    {
        $readinglist = Apiato::call('ReadingList@UpdateReadingListAction', [$request]);

        return $this->transform($readinglist, ReadingListTransformer::class);
    }

    /**
     * @param DeleteReadingListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReadingList(DeleteReadingListRequest $request)
    {
        Apiato::call('ReadingList@DeleteReadingListAction', [$request]);

        return $this->noContent();
    }
}
