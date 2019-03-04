<?php

use Illuminate\Database\Seeder;

class InitialUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Shaun Gill',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
