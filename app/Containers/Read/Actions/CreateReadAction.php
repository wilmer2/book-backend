<?php

namespace App\Containers\Read\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateReadAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $read = Apiato::call('Read@CreateReadTask', [$data]);

        return $read;
    }
}
