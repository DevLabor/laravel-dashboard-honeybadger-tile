<?php

namespace DevLabor\HoneybadgerTile\Commands;

use DevLabor\HoneybadgerTile\HoneybadgerStore;
use DevLabor\HoneybadgerTile\Services\Honeybadger;
use Illuminate\Console\Command;

class FetchHoneybadgerProjectsCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'dashboard:fetch-honeybadger-projects';

    /**
     * @var string
     */
    protected $description = 'Fetches projects data from honeybadger.io';

    /**
     * @return int
     */
    public function handle()
    {
        $projects = Honeybadger::getProjects(
            config('dashboard.tiles.honeybadger.auth_token'),
        );

        HoneybadgerStore::make()->addUnresolvedException($projects['results'] ?? []);

        $this->info('All done!');
    }
}
