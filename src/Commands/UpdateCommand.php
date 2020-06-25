<?php

namespace Never615\Nike\Commands;

use Illuminate\Console\Command;
use Never615\Nike\Seeder\TablesSeeder;

class UpdateCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'nike:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the nike package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('db:seed', [ '--class' => TablesSeeder::class, '--force' => true ]);


    }

}
