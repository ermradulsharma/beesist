<?php

namespace Modules\Property\Tests\Feature;

use Tests\TestCase;
use Modules\Property\Entities\Property;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_manager_can_create_a_property()
    {
        $this->actingAs(User::factory()->admin()->create());

        $propertyData = [
            'title' => 'Stunning Beachside Apartment',
            'content' => 'Full description of the property.',
            'address' => '123 Beach Rd',
            'is_active' => true,
            'order' => 1,
        ];

        $property = Property::create($propertyData);

        $this->assertDatabaseHas('properties', [
            'title' => 'Stunning Beachside Apartment'
        ]);

        $this->assertEquals('stunning-beachside-apartment', $property->slug);
    }

    /** @test */
    public function a_property_has_a_slug_generated_on_creation()
    {
        $property = Property::factory()->create([
            'title' => 'Modern Condo'
        ]);

        $this->assertEquals('modern-condo', $property->slug);
    }

    /** @test */
    public function unauthorized_users_cannot_access_manager_property_list()
    {
        $response = $this->get('/manager/property');

        $response->assertStatus(302); // Redirect to login
    }
}
