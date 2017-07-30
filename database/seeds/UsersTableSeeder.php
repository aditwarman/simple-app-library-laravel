<?php

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
        factory(App\User::class)->create([
            'email' => 'aditwarman@beta.com',
            'password' => bcrypt('aditwarman'),
            'api_token' => str_random(60)
        ]);
    }
}
