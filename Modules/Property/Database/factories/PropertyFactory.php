<?php

namespace Modules\Property\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Property\Entities\Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'user_id' => \App\Domains\Auth\Models\User::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'st_address' => $this->faker->streetAddress(),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            'beds' => $this->faker->numberBetween(1, 5),
            'baths' => $this->faker->numberBetween(1, 3),
            'rate' => $this->faker->numberBetween(1000, 5000),
            'prop_status' => 'For Rent',
            'prop_type' => 'Apartment',
            'is_active' => true,
            'order' => 0,
            'status' => 1,
        ];
    }
}
