<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('users')->count();
        if($count == 0) {
            DB::table('users')->truncate();
            DB::table('users')->insert([
                "name" => "admin",
                "email" => "admin@example.com",
                "password" => Hash::make('password'),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
