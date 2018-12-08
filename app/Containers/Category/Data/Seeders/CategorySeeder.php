<?php

namespace App\Containers\Category\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Apiato\Core\Foundation\Facades\Apiato;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Default Categories
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Aventura']]);
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Romance']]);
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Fanfic']]);
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Ciencia']]);
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Historia']]);
        Apiato::call('Category@CreateCategoryTask', [['name' => 'Otro']]);
        
    }
}
