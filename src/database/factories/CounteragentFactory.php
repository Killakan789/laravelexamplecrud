<?php

namespace Database\Factories;

use App\Models\Counteragent;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounteragentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Counteragent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'adress' => $this->faker->streetAddress,
        ];
    }
}
