<?php

namespace DevLabor\HoneybadgerTile;

use Spatie\Dashboard\Models\Tile;

class HoneybadgerStore
{
    /**
     *
     */
    const SITE_STATE_UP = 'up';
    /**
     *
     */
    const SITE_STATE_DOWN = 'down';

    /**
     * @var Tile
     */
    private Tile $tile;

    /**
     * @return static
     */
    public static function make()
    {
        return new static();
    }

    /**
     * HoneybadgerStore constructor.
     */
    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('honeybadger');
    }

    /**
     * @return array
     */
    public function projects(): array
    {
        return $this->tile->getData('projects') ?? [];
    }

    /**
     * @param array $projects
     *
     * @return $this
     */
    public function setProjects(array $projects): self
    {
        $this->tile->putData('projects', $projects);

        return $this;
    }

    /**
     * @return int|float
     */
    public function unresolvedFaults()
    {
        return array_sum(data_get($this->tile->getData('projects'), '*.unresolved_fault_count') ?? []);
    }

    /**
     * @param   $state
     * @return  int|float
     */
    public function sites($state = null)
    {
        $sites = [];
        foreach (data_get($this->tile->getData('projects'), '*.sites') ?? [] as $value) {
            $sites = array_merge($sites, $value);
        }
        $sites = collect($sites);

        if ($state) {
            $sites = $sites->where('state', $state);
        }

        return $sites->count();
    }

    /**
     * @return float|int
     */
    public function offlineSites()
    {
        return $this->sites(self::SITE_STATE_DOWN);
    }
}
