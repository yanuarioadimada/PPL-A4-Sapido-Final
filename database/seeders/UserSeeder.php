<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'suraji',
                'email' => 'suraji@gmail.com',
                'password' => Hash::make('123456')
            ],

        ];
        $role = ['admin','user'];
        foreach ($user as $key => $value) {
            $user = User::create($value);
            $user->assignRole($role[$key]);
        }
    }
}
