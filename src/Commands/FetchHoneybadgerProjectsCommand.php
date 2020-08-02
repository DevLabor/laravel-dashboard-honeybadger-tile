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
        $authToken = config('dashboard.tiles.honeybadger.auth_token');

        if (! $authToken) {
            $this->error('Honeybadger Auth Token is missing. Please configurate!');

            return 1;
        }

        $response = Honeybadger::getProjects(
            $authToken,
        );

        if (isset($response['errors'])) {
            $this->error('Honeybadger API error: ' . $response['errors']);

            return 1;
        }

        HoneybadgerStore::make()->setProjects($response['results'] ?? []);

        $this->info('All done!');

        return 0;
    }
}
