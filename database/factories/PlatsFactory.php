<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plats>
 */
class PlatsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->pluck('id')->toArray();

        return [
            'titre' => fake()->title(),
            'user_id' => fake()->randomElement($user),
            'description' => fake()->text(),
        ];
    }
}
