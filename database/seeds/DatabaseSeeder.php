<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //factory(\App\Models\User::class, 100)->create();
        factory(\App\Models\Follower::class, 50)->create();
       // factory(\App\Models\Tweet::class, 100)->create();
    }
}
