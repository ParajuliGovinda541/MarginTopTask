<?php

namespace Database\Seeders;

use App\Models\Clocked;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClockedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = User::all();
        foreach ($users as $user) {

                Clocked::create([
                    'user_id' => $user->id,
                    'start_datetime' => now()->subHours(rand(1, 8)),
                    'end_datetime' => now(),
                ]);
        }
    }
}
