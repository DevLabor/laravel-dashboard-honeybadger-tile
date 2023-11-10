<?php

namespace DevLabor\HoneybadgerTile;

use Livewire\Component;

class HoneybadgerOverviewTileComponent extends Component
{
    /** @var string */
    public $position;

    /** @var string|null */
    public $title;

    /** @var string|null */
    public $description_faults;

    /** @var string|null */
    public $description_offline;

    /**
     * @param string $position
     * @param string|null $title
     * @param string $configurationName
     */
    public function mount(string $position = '', ?string $title = null, ?string $description_faults = null, ?string $description_offline = null)
    {
        $this->position = $position;
        $this->title = $title;
        $this->description_faults = $description_faults;
        $this->description_offline = $description_offline;
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('dashboard-honeybadger-tile::overview', [
            'unresolvedFaults' => HoneybadgerStore::make()->unresolvedFaults(),
            'offlineSites' => HoneybadgerStore::make()->offlineSites(),
            'projects' => HoneybadgerStore::make()->projects(),
            'description_faults' => $this->description_faults ?? __('Unresolved faults'),
            'description_offline' => $this->description_offline ?? __('Offline Sites'),
            'refreshIntervalInSeconds' => config('dashboard.tiles.honeybadger.refresh_interval_in_seconds') ?? 300,
        ]);
    }
}
