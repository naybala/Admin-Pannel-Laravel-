<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Core\Number;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone'=>  rand(0,999999999),
            'address'=>Str::random(6),
            'password' => Hash::make('12345678'),
        ]);
    }
}