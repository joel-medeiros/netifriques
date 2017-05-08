<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'First One',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'api_token' => str_random(60)
        ]);
    }
}
