<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\DiamondsTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DiamondsTableTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DiamondsTable::class);

        $component->assertStatus(200);
    }
}
