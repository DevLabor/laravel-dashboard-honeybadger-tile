<?php

namespace DevLabor\HoneybadgerTile\Tests\Unit\Command;

use DevLabor\HoneybadgerTile\Tests\TestCase;

class FetchHoneybadgerProjectsCommandTest extends TestCase
{
    /** @test */
    public function command_fails_of_missing_auth_token()
    {
        $this->artisan('dashboard:fetch-honeybadger-projects')
            ->expectsOutput('Honeybadger Auth Token is missing. Please configurate!')
            ->assertExitCode(1);
    }
}
