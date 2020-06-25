<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

namespace Never615\Nike\Seeder;

use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(MenuTablesSeeder $menuTablesSeeder, PermissionTablesSeeder $permissionTablesSeeder)
    {
        $menuTablesSeeder->run();
        $permissionTablesSeeder->run();
    }
}
