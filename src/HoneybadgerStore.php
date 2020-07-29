<?php

namespace DevLabor\HoneybadgerTile;

use Spatie\Dashboard\Models\Tile;

class HoneybadgerStore
{
    /**
     * @var Tile
     */
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('honeybadger');
    }

    public function projects(): array
    {
        return $this->tile->getData('projects') ?? [];
    }

    public function setProjects(array $projects): self
    {
        $this->tile->putData('projects', $projects);

        return $this;
    }

    /**
     * @return int
     */
    public function unresolvedFaults(): int
    {
        return array_sum($this->tile->getData('projects.*.unresolved_fault_count') ?? []);
    }
}
