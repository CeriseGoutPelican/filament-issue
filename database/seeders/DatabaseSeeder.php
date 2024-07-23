<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@test.test',
            'password' => Hash::make('test'),
        ]);

        // Create 10 comments for the user Test
        $user->comments()->createMany(
            [
                ['content' => 'Comment 1', 'category' => 'Category 1'],
                ['content' => 'Comment 2', 'category' => 'Category 1'],
                ['content' => 'Comment 3', 'category' => 'Category 1'],
                ['content' => 'Comment 4', 'category' => 'Category 1'],
                ['content' => 'Comment 5', 'category' => 'Category 1'],
                ['content' => 'Comment 6', 'category' => 'Category 2'],
                ['content' => 'Comment 7', 'category' => 'Category 2'],
                ['content' => 'Comment 8', 'category' => 'Category 2'],
                ['content' => 'Comment 9', 'category' => 'Category 2'],
                ['content' => 'Comment 10', 'category' => 'Category 2'],
            ]
        );
    }
}
