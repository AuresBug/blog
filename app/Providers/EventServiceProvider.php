<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            // $event->menu->add('MAIN NAVIGATION');

            $items = [
                'login'    => [
                    'text'         => __('Log in'),
                    'route'        => 'login',
                    'topnav_right' => true,
                ],
                'register' => [
                    'text'         => __('Register'),
                    'route'        => 'register',
                    'topnav_right' => true,
                ],
            ];

            if (Route::has('login')) {

                if (Auth::guest()) {

                    // Show login
                    $event->menu->add( $items['login']);

                    // Show register
                    if (Route::has('register')) {
                        $event->menu->add( $items['register']);
                    }
                }
            }

        });
    }
}
