<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

namespace Never615\Nike\Seeder\Menu;

use Illuminate\Database\Seeder;
use Mallto\Admin\Seeder\MenuSeederMaker;

class UserMenuTablesSeeder extends Seeder
{

    use MenuSeederMaker;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = 3;

//        $userManagerMenu = $this->updateOrCreate(
//            "user_manager", 0, $order++, "用户管理", "fa-user");
    }
}
