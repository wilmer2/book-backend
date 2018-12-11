<?php

namespace App\Containers\Files\Actions;

use App\Ship\Parents\Actions\SubAction;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;

class CreateFileAction extends SubAction
{
    public function run(
      Request $request, 
      $folder, 
      $beforePath = null
    ) {

      $newPath = null;

      if ($request->hasFile('file')) {
          Apiato::call('Files@DeleteFileTask', [$beforePath]);
          
          $newPath = Apiato::call('Files@StoreFileTask', [$request->file, $folder]);
      }
        
      return $newPath;
    }
}
