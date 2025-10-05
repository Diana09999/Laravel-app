<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    protected $model = \App\Models\Plat::class;

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3),
            'recette' => $this->faker->paragraphs(3, true),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
