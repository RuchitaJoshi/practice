<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ruchi',
            'email'=>'ruchi@gmail.com',
            'password'=>bcrypt('ruchi123')
        ]);

        factory(User::class,5)->create();
    }
}
