<?php

namespace App\Providers;

use App\Repositories\RoomRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\RoomRepository as RoomRepositoryInterface;
use App\Interfaces\BookingRepository as BookingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
