<?php

namespace App\Providers;

use App\Repositories\RoomRepository;
use App\Repositories\BlockRepository;
use App\Repositories\BookingRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\RoomRepository as RoomRepositoryInterface;
use App\Interfaces\BlockRepository as BlockRepositoryInterface;
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
        $this->app->bind(BlockRepositoryInterface::class, BlockRepository::class);
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
