<?php

namespace App\Providers;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Services\Interfaces\TaskServiceInterface;
use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
