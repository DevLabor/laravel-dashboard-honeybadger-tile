<?php

namespace DevLabor\HoneybadgerTile\Tests\Unit\Component;

use DevLabor\HoneybadgerTile\HoneybadgerTileComponent;
use DevLabor\HoneybadgerTile\Tests\TestCase;
use Livewire\Livewire;
use Livewire\Testing\TestableLivewire;
use NunoMaduro\LaravelMojito\ViewAssertion;

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

        $html = $result->payload['dom'];
        $wireId = $result->payload['id'];

        $result->assertViewHas('projects', [])
            ->assertViewHas('unresolvedFaults')
            ->assertViewHas('refreshIntervalInSeconds', 300)
            ->assertViewHas('wireId', $wireId)
            ->assertViewHas('height', '100%');

        (new ViewAssertion($html))
            ->contains('<div id="chart_'.$wireId.'" style="height: 100%"></div>');
    }
}
