<?php

namespace App\Containers\ReadingList\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ReadingListSeeder_2 extends Seeder
{
    public function run()
    {
        Apiato::call('ReadingList@CreateReadingListTask', [['name' => 'Leyendo']]);
        Apiato::call('ReadingList@CreateReadingListTask', [['name' => 'Pendiente']]);
        Apiato::call('ReadingList@CreateReadingListTask', [['name' => 'Leidos']]);
    }
}
