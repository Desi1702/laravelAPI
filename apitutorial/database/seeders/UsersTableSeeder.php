<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash; // Deze regel toevoegen
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Laten we eerst de users tabel leegmaken
        User::truncate();

        $faker = Faker::create();

        // Laten we zorgen dat iedereen hetzelfde wachtwoord heeft
        // en we hashen dit wachtwoord vooraf om de seeder sneller te maken.
        $password = Hash::make('toptal');

        // De administrator gebruiker aanmaken
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // Nu genereren we een paar dozen gebruikers voor onze app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
