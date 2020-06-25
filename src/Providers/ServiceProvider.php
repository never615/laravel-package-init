<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

namespace Never615\Nike\Providers;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Passport\Passport;
use Mallto\Tool\Jobs\LogJob;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [];

    /**
     * @var array
     */
    protected $commands = [
        'Never615\Nike\Commands\InstallCommand',
        'Never615\Nike\Commands\UpdateCommand',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
    ];


    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->listens() as $event => $listeners) {
            foreach ($listeners as $listener) {
                Event::listen($event, $listener);
            }
        }

        foreach ($this->subscribe as $subscriber) {
            Event::subscribe($subscriber);
        }

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'nike');

        $this->loadMigrationsFrom(__DIR__.'/../../migrations');

        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');

        $this->authBoot();

        $this->schedule();


    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);

    }


    private function authBoot()
    {

    }


    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }


    private function schedule()
    {
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);

            //用户数据统计
//            $schedule->command('user:user_statistic')
//                ->onOneServer()
//                ->dailyAt("02:00")
//                ->runInBackground()
//                ->name("用户统计")
//                ->withoutOverlapping()
//                ->before(function () {
//                    dispatch(new LogJob("logSchedule", ["slug" => "user_statistic", "status" => "start"]));
//                })
//                ->after(function () {
//                    dispatch(new LogJob("logSchedule", ["slug" => "user_statistic", "status" => "finish"]));
//                });

        });

    }

}
