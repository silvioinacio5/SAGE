<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'id' => 1,
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' =>hash(0, 5555),
            ],
            ];
        foreach ($users as $user) {
            User::create($user);
        }
        
    }
}
