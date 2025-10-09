<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ezar Fausta',
            'email' => 'ezar@admin.com',
            'phone' => '085712345678',
            'password' => 'password',
        ]);

        //Seeders List
        $this->call(RecipeSeeder::class);
        $this->call(LearningSeeder::class);
        $this->call(ForumSeeder::class);
    }
}
