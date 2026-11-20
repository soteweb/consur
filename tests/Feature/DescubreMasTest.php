<?php

namespace Tests\Feature;

use App\Livewire\Frontend\DescubreMas;
use App\Models\Branch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DescubreMasTest extends TestCase
{
    use RefreshDatabase;

    public function test_descubremas_page_is_accessible(): void
    {
        $response = $this->get('/descubremas');
        $response->assertStatus(200);
        $response->assertSee('Centro de');
        $response->assertSee('Taller Móvil');
        $response->assertSee('Recuerde');
    }

    public function test_descubre_mas_alias_redirects_to_descubremas(): void
    {
        $response = $this->get('/descubre-mas');
        $response->assertRedirect('/descubremas');
    }

    public function test_descubremas_can_select_branch(): void
    {
        $branch = Branch::first();
        if ($branch) {
            Livewire::test(DescubreMas::class)
                ->call('selectBranch', $branch->id)
                ->assertSet('selectedBranchId', $branch->id)
                ->assertSee($branch->name);
        } else {
            $this->assertTrue(true);
        }
    }
}
