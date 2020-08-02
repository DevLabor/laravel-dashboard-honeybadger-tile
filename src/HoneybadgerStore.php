<?php

namespace DevLabor\HoneybadgerTile;

use Spatie\Dashboard\Models\Tile;

class HoneybadgerStore
{
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
}
