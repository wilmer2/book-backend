<?php

namespace App\Containers\Files\Tasks;

use App\Ship\Parents\Tasks\Task;
use Exception;

class StoreFileTask extends Task
{

    /**
     * @param $file, $folder
     *
     * @return path
     */
    public function run($file, $folder)
    {
        return $file ? $file->store('public/'.$folder) : null;
    }
}
