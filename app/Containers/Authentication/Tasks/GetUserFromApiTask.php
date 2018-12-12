<?php

namespace App\Containers\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task;

class GetUserFromApiTask extends Task
{
  
    public function run()
    {
        return auth('api')->user();
    }
}
