<?php

namespace Modules\Property\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Property\Entities\PropertyReport::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
