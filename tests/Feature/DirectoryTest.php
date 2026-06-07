<?php

namespace Tests\Feature;

use App\Models\Nursery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_lists_nurseries(): void
    {
        Nursery::factory()->create(['name_en' => 'Little Stars Nursery']);

        $this->get('/')
            ->assertOk()
            ->assertSee('Little Stars Nursery');
    }

    public function test_search_filters_results(): void
    {
        Nursery::factory()->create(['name_en' => 'Sunrise Kids', 'city' => 'Gaza']);
        Nursery::factory()->create(['name_en' => 'Rainbow Garden', 'city' => 'Rafah']);

        $this->get('/?q=Sunrise')
            ->assertOk()
            ->assertSee('Sunrise Kids')
            ->assertDontSee('Rainbow Garden');
    }

    public function test_submission_can_be_created(): void
    {
        $this->post('/submit', [
            'nursery_name' => 'New Nursery',
            'city' => 'Gaza',
            'contact_name' => 'Tester',
            'phone' => '+970590000000',
            'email' => 'test@example.com',
            'message' => 'Hello',
        ])->assertRedirect();

        $this->assertDatabaseHas('submissions', [
            'email' => 'test@example.com',
            'status' => 'pending',
        ]);
    }
}
