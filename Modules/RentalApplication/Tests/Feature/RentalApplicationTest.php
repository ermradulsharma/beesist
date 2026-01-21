<?php

namespace Modules\RentalApplication\Tests\Feature;

use Tests\TestCase;
use Modules\RentalApplication\Entities\RentalApplication;
use Modules\Property\Entities\Property;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RentalApplicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_submit_a_rental_application()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $property = Property::factory()->create();

        $applicationData = [
            'prop_id' => $property->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'street_address' => '456 Main St',
            'city' => 'Vancouver',
            'state' => 'BC',
            'zip_code' => 'V6B 1A1',
        ];

        $application = RentalApplication::create($applicationData);

        $this->assertDatabaseHas('rental_applications', [
            'email' => 'john@example.com',
            'prop_id' => $property->id
        ]);

        $this->assertEquals('John Doe', $application->name);
    }

    /** @test */
    public function an_application_can_be_linked_to_a_property()
    {
        $property = Property::factory()->create(['title' => 'Luxury Suite']);
        $application = RentalApplication::factory()->create(['prop_id' => $property->id]);

        $this->assertEquals('Luxury Suite', $application->property->title);
    }
}
