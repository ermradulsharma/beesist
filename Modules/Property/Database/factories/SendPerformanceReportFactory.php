<?php

namespace Modules\Property\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SendPerformanceReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Property\Entities\SendPerformanceReport::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

