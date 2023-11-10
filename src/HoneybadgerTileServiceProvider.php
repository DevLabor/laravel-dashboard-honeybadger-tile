<?php

namespace DevLabor\HoneybadgerTile;

use DevLabor\HoneybadgerTile\Commands\FetchHoneybadgerProjectsCommand;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class HoneybadgerTileServiceProvider extends ServiceProvider
{
    /**
     * Boot.
     */
    public function boot()
    {
        Livewire::component('honeybadger-unresolved-faults-tile', HoneybadgerUnresolvedFaultsTileComponent::class);
        Livewire::component('honeybadger-offline-sites-tile', HoneybadgerOfflineSitesTileComponent::class);
        Livewire::component('honeybadger-overview-tile', HoneybadgerOverviewTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchHoneybadgerProjectsCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-honeybadger-tile'),
        ], 'dashboard-honeybadger-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-honeybadger-tile');
    }
}
