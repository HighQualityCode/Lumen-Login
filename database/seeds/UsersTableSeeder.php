<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "firstname"     => "Nahid",
                "lastname"      => "Bin Azhar",
                "username"      => "user1",
                "password"      => app('hash')->make('123456'),
                "created_at"    => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "firstname"     => "Yut",
                "lastname"      => "Udopp",
                "username"      => "user2",
                "password"      => app('hash')->make('123456'),
                "created_at"    => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "firstname"     => "Roy",
                "lastname"      => "Bin",
                "username"      => "user3",
                "password"      => app('hash')->make('123456'),
                "created_at"    => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "firstname"     => "robert",
                "lastname"      => "Azhar",
                "username"      => "user4",
                "password"      => app('hash')->make('123456'),
                "created_at"    => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "firstname"     => "chris",
                "lastname"      => "man",
                "username"      => "user5",
                "password"      => app('hash')->make('123456'),
                "created_at"    => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            
        ];

        DB::table('users')->insert($users);
    }
}
