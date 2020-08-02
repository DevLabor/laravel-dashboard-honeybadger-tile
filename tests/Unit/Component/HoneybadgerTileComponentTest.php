<?php

namespace DevLabor\HoneybadgerTile\Tests\Unit\Component;

use DevLabor\HoneybadgerTile\HoneybadgerTileComponent;
use DevLabor\HoneybadgerTile\Tests\TestCase;
use Livewire\Livewire;
use Livewire\Testing\TestableLivewire;

class HoneybadgerTileComponentTest extends TestCase
{
    /** @test */
    public function its_mounting()
    {
        $component = new HoneybadgerTileComponent('');
        $component->mount('a1:a2', 'Honeybadger');

        $this->assertSame('a1:a2', $component->position);
        $this->assertSame('Honeybadger', $component->title);
    }

    /** @test */
    public function its_renders_well()
    {
        /** @var TestableLivewire $result */
        $result = Livewire::test(HoneybadgerTileComponent::class)
            ->set('position', 'a1:a2')
            ->call('render');

        //$wireId = $result->payload['id'];

        $result->assertViewHas('projects', [])
            ->assertViewHas('unresolvedFaults')
            ->assertViewHas('refreshIntervalInSeconds', 300);
        //->assertViewHas('wireId', $wireId);
    }
}
