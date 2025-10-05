<?php

namespace Database\Seeders;

use App\Models\Plat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $diana = User::create([
            'name' => 'Diana',
            'email' => 'diana@gmail.com',
            'password' => Hash::make('diana123'),
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
        ]);

        $users = User::factory()->count(10)->create();

        $allUsers = User::all();

        foreach ($allUsers as $user) {
            Plat::create([
                'titre' => fake()->sentence(3),
                'recette' => fake()->paragraphs(3, true),
                'user_id' => $user->id,
            ]);
        }

        $plats = Plat::all();

        foreach ($allUsers as $user) {
            $randomPlats = $plats->random(min(3, $plats->count()))->pluck('id')->toArray();
            $user->favoris()->attach($randomPlats);
        }
    }
}
