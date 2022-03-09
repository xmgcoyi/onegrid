<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->text(1000),
            'created_at' => date("Y-m-d H:i:s", mt_rand(1,time())),
            'updated_at' => date("Y-m-d H:i:s", mt_rand(1,time()))
        ];
    }
}
