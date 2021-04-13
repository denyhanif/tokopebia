<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'bwaadmin',
            'email'=>'bwaadmin@gmail.com',
            'role'=>'ADMIN',
            'password'=>'1'
        ]);
    }
}
