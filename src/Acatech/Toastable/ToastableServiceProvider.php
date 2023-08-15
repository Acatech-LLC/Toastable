<?php

namespace Acatech\Toastable;

use Illuminate\Support\ServiceProvider;

class ToastableServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Acatech\Toastable\SessionStore::class,
            \Acatech\Toastable\LaravelSessionStore::class
        );

        $this->app->singleton('toastable', function () {
            return $this->app->make(\Acatech\Toastable\ToastableNotifier::class);
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'toastable');

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/toastable')
        ]);
    }
}
