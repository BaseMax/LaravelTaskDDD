<?php

namespace App\Providers;

use App\Modules\Tasks\TaskRepository;
use Illuminate\Support\ServiceProvider;
use App\Modules\Tasks\TaskRepositoryInterface;
use App\Modules\Tasks\TaskService;
use App\Modules\Tasks\TaskServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
