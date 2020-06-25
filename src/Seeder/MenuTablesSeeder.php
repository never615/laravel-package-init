<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

namespace Never615\Nike\Seeder;

use Illuminate\Database\Seeder;
use Never615\Nike\Seeder\Menu\UserMenuTablesSeeder;

class MenuTablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserMenuTablesSeeder::class);
//DummySeeder
    }
}
