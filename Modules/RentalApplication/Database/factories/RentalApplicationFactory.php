<?php

namespace Modules\RentalApplication\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RentalApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\RentalApplication\Entities\RentalApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Domains\Auth\Models\User::factory(),
            'prop_id' => \Modules\Property\Entities\Property::factory(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'street_address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip_code' => $this->faker->postcode(),
            'status' => 'Pending',
        ];
    }
}
