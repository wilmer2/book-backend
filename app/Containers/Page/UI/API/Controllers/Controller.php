<?php

namespace App\Containers\Page\UI\API\Controllers;

use App\Containers\Page\UI\API\Requests\CreatePageRequest;
use App\Containers\Page\UI\API\Requests\DeletePageRequest;
use App\Containers\Page\UI\API\Requests\GetAllPagesRequest;
use App\Containers\Page\UI\API\Requests\FindPageByIdRequest;
use App\Containers\Page\UI\API\Requests\UpdatePageRequest;
use App\Containers\Page\UI\API\Transformers\PageTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Page\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPage(CreatePageRequest $request)
    {
        $page = Apiato::call('Page@CreatePageAction', [$request]);

        return $this->created($this->transform($page, PageTransformer::class));
    }

    /**
     * @param FindPageByIdRequest $request
     * @return array
     */
    public function findPageById(FindPageByIdRequest $request)
    {
        $page = Apiato::call('Page@FindPageByIdAction', [$request]);

        return $this->transform($page, PageTransformer::class);
    }

    /**
     * @param GetAllPagesRequest $request
     * @return array
     */
    public function getAllPages(GetAllPagesRequest $request)
    {
        $pages = Apiato::call('Page@GetAllPagesAction', [$request]);

        return $this->transform($pages, PageTransformer::class);
    }

    /**
     * @param UpdatePageRequest $request
     * @return array
     */
    public function updatePage(UpdatePageRequest $request)
    {
        $page = Apiato::call('Page@UpdatePageAction', [$request]);

        return $this->transform($page, PageTransformer::class);
    }

    /**
     * @param DeletePageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePage(DeletePageRequest $request)
    {
        Apiato::call('Page@DeletePageAction', [$request]);

        return $this->noContent();
    }
}
