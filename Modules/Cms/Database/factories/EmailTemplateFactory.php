<?php

namespace Modules\Cms\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Cms\Entities\EmailTemplate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'scheduled_time' => Carbon::now()->format('H:i'),
            'schedule_desc' => $this->faker->sentence,
            'command' => 'command:'.strtolower($this->faker->word),
            'other_reciepients' => json_encode(["1","2","3","4","5","29","30"]),
            'role' => 'Agent',
            'notify_trigger' => $this->faker->word,
            'is_active' => $this->faker->boolean,
        ];
    }
}

