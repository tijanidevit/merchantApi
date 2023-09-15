<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'image' => $this->faker->word,
            'password' => $this->faker->password,
            'role' => $this->faker->word,
            'balance' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
