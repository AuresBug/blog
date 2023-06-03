<?php

namespace App\Providers;

use Auresbug\Media\Facades\Conversion;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        Conversion::register('avatar', function (Image $image) {
            return $image->fit(160, 160);
        });

        Conversion::register('thumb', function (Image $image) {
            return $image->fit(64, 64);
        });

        Conversion::register('carousel', function (Image $image) {
            return $image->fit(640, 240);
        });

        Conversion::register('card', function (Image $image) {
            return $image->fit(640, 480);
        });

        Conversion::register('standard', function (Image $image) {
            return $image->fit(854, 480);
        });

    }
}
