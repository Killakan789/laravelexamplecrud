<?php

namespace Database\Factories;

use App\Models\Main;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Main::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'PON' => rand(1,20),
            'supplier' => 'Vincent',
            'product' => rand(1,20),
            'quantity' => rand(1,20),
            'payment_status' => 'Paid',
            'order_date' => date('d.m.Y'),
            'eta_date' => date('d.m.Y'),
            'pickup_date' => date('d.m.Y'),
            'freight_forwarded' => rand(1,20),
            'destination' => 'destination',
            'etd_date' => date('d.m.Y'),
            'delivery_date' => date('d.m.Y'),
            'status' => 'shipped',
        ];
    }
}
