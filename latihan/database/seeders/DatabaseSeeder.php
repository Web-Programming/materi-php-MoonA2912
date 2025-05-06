<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Menggunakan query builder
        // DB::table("users")->insert([
        //     'name' => 'Mona',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make("password")
        // ]);
       DB::table("users")
       ->where("id",1)
       ->update(
        ["password"=>Hash::make("123456")]
       );

       //DB::table("users")->where("1",">",1)->delele();
    }
}
