<?php

namespace DevLabor\HoneybadgerTile\Tests\Unit;

use DevLabor\HoneybadgerTile\HoneybadgerStore;
use DevLabor\HoneybadgerTile\Tests\TestCase;

class HoneybadgerStoreTest extends TestCase
{
    /**
     * @var array
     */
    protected $projects = [
        0 =>
            [
                'id' => 1,
                'name' => 'Sample Project',
                'unresolved_fault_count' => 23,
                'fault_count' => 42,
            ],
        1 =>
            [
                'id' => 2,
                'name' => 'Sample Project Two',
                'unresolved_fault_count' => 3,
                'fault_count' => 493,
            ],
    ];

    /** @test */
    public function projects_returns_array()
    {
        HoneybadgerStore::make()->setProjects($this->projects);
        $projects = HoneybadgerStore::make()->projects();

        $this->assertCount(2, $projects);
    }

    /** @test */
    public function unresolved_faults_returns_int()
    {
        HoneybadgerStore::make()->setProjects($this->projects);
        $unresolvedFaults = HoneybadgerStore::make()->unresolvedFaults();

        $this->assertEquals($unresolvedFaults, 26);
    }
}
