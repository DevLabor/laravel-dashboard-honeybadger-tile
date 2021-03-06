<?php

namespace DevLabor\HoneybadgerTile;

use Livewire\Component;

class HoneybadgerTileComponent extends Component
{
    /** @var string */
    public $position;

    /** @var string|null */
    public $title;

    /**
     * @param string $position
     * @param string|null $title
     * @param string $configurationName
     */
    public function mount(string $position = '', ?string $title = null)
    {
        $this->position = $position;

        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('dashboard-honeybadger-tile::tile', [
            'unresolvedFaults' => HoneybadgerStore::make()->unresolvedFaults(),
            'projects' => HoneybadgerStore::make()->projects(),
            'description' => config('dashboard.tiles.honeybadger.description'),
            'refreshIntervalInSeconds' => config('dashboard.tiles.honeybadger.refresh_interval_in_seconds') ?? 300,
        ]);
    }
}
