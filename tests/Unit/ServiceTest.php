<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function service_belongs_to_reception()
    {
        $service = create('App\Service');
        $reception = create('App\Reception');

        $service->receptions()->attach($reception);

        $this->assertTrue($service->receptions->contains($reception));
    }
}
