<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),
            'name' => $this->faker->name,            
            'price' =>40,
            'wholesale_price' =>20,
            'status' =>1,
            'stock'=>1,
            'vendor_id'=>4,
        ];
    }
}
