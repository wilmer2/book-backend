<?php

namespace App\Containers\Files\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Storage;

class DeleteFileTask extends Task
{

    public function run($path)
    {
        if (!$path) return;
        
        Storage::delete($path);
    }
}
