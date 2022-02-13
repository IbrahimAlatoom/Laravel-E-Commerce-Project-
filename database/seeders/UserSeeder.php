<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Db;
use Illuminate\support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'name'=>'ibrahim',
                'email' => 'ibrahim@gmail.com',
                'password' => Hash::make('12345')
            ]
            );
    }
}
