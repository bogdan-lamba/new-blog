<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.headers.cards', function($view) {
            $client = new Client();
            $response = $client->request('GET', 'https://api.exchangeratesapi.io/latest');
            $exchange = json_decode($response->getBody());
            $exchange =  [
                'currency' => $exchange->rates->RON,
                'date' => $exchange->date
            ];

           $view->with(compact('exchange'));
        });
    }
}
