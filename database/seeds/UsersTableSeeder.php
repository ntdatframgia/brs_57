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
        DB::table('users')->insert([
            'fullname' => 'nguyen tien dat',
            'email' => 'nguyentiendat1892@gmail.com',
            'password' => bcrypt('123123'),
            'avatar' => 'zolo.jpg',
            'role' => 1,
        ]);
    }
}
