<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'=>'fajar fatha',
            'level'=> 'admin',
            'email'=>'fajarfathar@gmail.com',
            'password'=>bcrypt('1234'),
            'remember_token'=>Str::random(60),
        ]);
    }
}
