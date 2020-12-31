<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt("admin"),
            'address' => "indonesia",
            'phoneNumber' => "082170800260",
            'gender' => "Male",
            'role' => "admin",
        ],
        [
            'name' => "member",
            'email' => "member@member.com",
            'password' => bcrypt("member"),
            'address' => "indonesia",
            'phoneNumber' => "080808080808",
            'gender' => "Female",
            'role' => "member",

        ]
        ]);
    }
}
