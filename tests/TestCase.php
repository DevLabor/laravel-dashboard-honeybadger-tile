<?php

namespace DevLabor\HoneybadgerTile\Tests;

use DevLabor\HoneybadgerTile\HoneybadgerTileServiceProvider;
use Illuminate\Support\Facades\Schema;
use Livewire\LivewireServiceProvider;
use NunoMaduro\LaravelMojito\MojitoServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Spatie\Dashboard\DashboardServiceProvider;

class TestCase extends BaseTestCase
{
    /**
     * Setup case.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    /**
     * Setup database with migration.
     */
    protected function setUpDatabase()
    {
        Schema::dropIfExists('dashboard_tiles');

        include_once __DIR__ . '/../vendor/spatie/laravel-dashboard/database/migrations/create_dashboard_tiles_table.php.stub';
        (new \CreateDashboardTilesTable())->up();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('dashboard.tiles.honeybadger', [
            'refresh_interval_in_seconds' => 300,
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            DashboardServiceProvider::class,
            LivewireServiceProvider::class,
            MojitoServiceProvider::class,
            HoneybadgerTileServiceProvider::class,
        ];
    }
}
