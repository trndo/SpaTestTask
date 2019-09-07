<?php

namespace App\Providers;

use App\Http\Services\ConferenceRoomService\ConferenceRoomInterface;
use App\Http\Services\ConferenceRoomService\ConferenceRoomService;
use App\Http\Services\ReservedSeatService\ReservedSeatInterface;
use App\Http\Services\ReservedSeatService\ReservedSeatsService;
use App\Http\Services\UploadingFileService\UploadingFileInterface;
use App\Http\Services\UploadingFileService\UploadingFileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConferenceRoomInterface::class,ConferenceRoomService::class);
        $this->app->bind(UploadingFileInterface::class, UploadingFileService::class);
        $this->app->bind(ReservedSeatInterface::class, ReservedSeatsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
