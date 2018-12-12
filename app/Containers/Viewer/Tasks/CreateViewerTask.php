<?php

namespace App\Containers\Viewer\Tasks;

use App\Containers\Viewer\Data\Repositories\ViewerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateViewerTask extends Task
{

    protected $repository;

    public function __construct(ViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
