<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // by default setting 20 users
        $usersCount = (int) $this->command->ask('How many users would you like?', 20); // it'll return string so will convert into integer
        User::factory()->newUser()->create();
        User::factory($usersCount)->create(); // it'll create 20 users
    }
}
