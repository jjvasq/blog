<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan José Vasquez',
            'email' => 'vasquezjuan_jose@hotmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Enano',
            'email' => 'enano@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Blogger');

        User::create([
            'name' => 'Marita',
            'email' => 'marielahcastillo@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
