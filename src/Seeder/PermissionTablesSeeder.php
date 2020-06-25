<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

namespace Never615\Nike\Seeder;

use Illuminate\Database\Seeder;
use Never615\Nike\Seeder\Permission\UserPermissionTablesSeeder;

class PermissionTablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserPermissionTablesSeeder::class);
//DummySeeder
    }
}
