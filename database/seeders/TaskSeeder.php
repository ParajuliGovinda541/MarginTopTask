<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //
        $users = User::all();
        foreach ($users as $user) {
            Task::factory()->count(rand(1,3))->create([
                'user_id' => $user->id,
                'title' => $faker->sentence,
                'subtitle' => $faker->sentence,
                'short_description' => $faker->paragraph,
                'status' => $faker->randomElement(['to-do', 'in-progress', 'completed']),
            ]);
        }
    }
}
