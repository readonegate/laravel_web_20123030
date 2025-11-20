<?php

namespace Database\Seeders;

use App\Models\Authors;
use App\Models\Books;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::create([
            'name' => 'Super User',
            'email' => 'super@test.id',
            'password' => Hash::make('password'),
        ]);

        $authors = Authors::factory(20)->create();
        Books::factory(20)
            ->recycle($authors)
            ->create();
    }
}
