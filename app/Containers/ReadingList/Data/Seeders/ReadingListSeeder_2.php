<?php

namespace App\Containers\ReadingList\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\ReadingList\Models\ReadingList;
use App\Ship\Parents\Seeders\Seeder;

class ReadingListSeeder_2 extends Seeder
{
    public function run()
    {
        $mainReadinglists = ['Pediente', 'Leyendo', 'Leidos'];

        foreach($mainReadinglists as $list) {
          $readinglist = new ReadingList();
          $readinglist->name = $list;
          $readinglist->main = 1;
          $readinglist->save();
        }
    }
}
