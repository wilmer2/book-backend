<?php

namespace App\Containers\Read\UI\API\Controllers;

use App\Containers\Read\UI\API\Requests\CreateReadRequest;
use App\Containers\Read\UI\API\Requests\DeleteReadRequest;
use App\Containers\Read\UI\API\Requests\GetAllReadsRequest;
use App\Containers\Read\UI\API\Requests\FindReadByIdRequest;
use App\Containers\Read\UI\API\Requests\UpdateReadRequest;
use App\Containers\Read\UI\API\Transformers\ReadTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Read\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateReadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRead(CreateReadRequest $request)
    {
        $read = Apiato::call('Read@CreateReadAction', [$request]);

        return $this->created($this->transform($read, ReadTransformer::class));
    }

    /**
     * @param FindReadByIdRequest $request
     * @return array
     */
    public function findReadById(FindReadByIdRequest $request)
    {
        $read = Apiato::call('Read@FindReadByIdAction', [$request]);

        return $this->transform($read, ReadTransformer::class);
    }

    /**
     * @param GetAllReadsRequest $request
     * @return array
     */
    public function getAllReads(GetAllReadsRequest $request)
    {
        $reads = Apiato::call('Read@GetAllReadsAction', [$request]);

        return $this->transform($reads, ReadTransformer::class);
    }

    /**
     * @param UpdateReadRequest $request
     * @return array
     */
    public function updateRead(UpdateReadRequest $request)
    {
        $read = Apiato::call('Read@UpdateReadAction', [$request]);

        return $this->transform($read, ReadTransformer::class);
    }

    /**
     * @param DeleteReadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRead(DeleteReadRequest $request)
    {
        Apiato::call('Read@DeleteReadAction', [$request]);

        return $this->noContent();
    }
}
