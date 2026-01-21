<?php

namespace Modules\Leads\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserEntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Leads\Entities\UserEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

