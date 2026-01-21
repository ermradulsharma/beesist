<?php

namespace Modules\Leads\Tests\Feature;

use Tests\TestCase;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_entity_can_be_created_linking_a_user_and_a_property()
    {
        $user = User::factory()->create();
        $property = Property::factory()->create();

        UserEntity::create([
            'account_id' => $user->id,
            'entity_key' => 'property',
            'entity_value' => $property->id,
        ]);

        $this->assertDatabaseHas('user_entities', [
            'account_id' => $user->id,
            'entity_value' => $property->id
        ]);
    }

    /** @test */
    public function a_user_entity_can_belong_to_a_user()
    {
        $user = User::factory()->create(['name' => 'Lead Manager']);
        $userEntity = UserEntity::factory()->create(['account_id' => $user->id]);

        $this->assertEquals('Lead Manager', $userEntity->userDetails->name);
    }
}
