<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Md Safiullah',
            'email' => 'parsonal494@gmail.com',
            'password' => bcrypt("anis5221")
        ]);
        
    }
}
