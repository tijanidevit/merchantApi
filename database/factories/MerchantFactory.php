<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Merchant;

class MerchantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Merchant::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'business_name' => $this->faker->word,
            'business_code' => $this->faker->word,
            'image' => $this->faker->word,
            'password' => $this->faker->password,
            'role' => $this->faker->word,
            'balance' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
