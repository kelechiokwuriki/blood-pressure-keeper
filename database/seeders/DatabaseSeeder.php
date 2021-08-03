<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // patients - 1000
        for ($i = 0; $i < 1000; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'role' => 'patient'
            ]);
        }

        // practice staff - admin (30)
        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'role' => 'admin'
            ]);
        }

        // practice staff - nurse (35)
        for ($i = 0; $i < 35; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'role' => 'nurse'
            ]);
        }

        // practice staff - doctor (35)
        for ($i = 0; $i < 35; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'role' => 'doctor'
            ]);
        }
    }
}
