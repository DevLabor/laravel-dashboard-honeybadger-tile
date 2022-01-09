<?php

namespace DevLabor\HoneybadgerTile;

use Livewire\Component;

class HoneybadgerUnresolvedFaultsTileComponent extends Component
{
    /** @var string */
    public $position;

    /** @var string|null */
    public $title;

    /** @var string|null */
    public $description;

    /**
     * @param string $position
     * @param string|null $title
     * @param string $configurationName
     */
    public function mount(string $position = '', ?string $title = null, ?string $description = null)
    {
        $this->position = $position;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('dashboard-honeybadger-tile::unresolved-faults', [
            'unresolvedFaults' => HoneybadgerStore::make()->unresolvedFaults(),
            'projects' => HoneybadgerStore::make()->projects(),
            'description' => $this->description ?? __('Unresolved faults'),
            'refreshIntervalInSeconds' => config('dashboard.tiles.honeybadger.refresh_interval_in_seconds') ?? 300,
        ]);
    }
}
