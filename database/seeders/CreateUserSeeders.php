<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'type' => 1,//Super Admin,
            'password' => bcrypt('dini1234'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
