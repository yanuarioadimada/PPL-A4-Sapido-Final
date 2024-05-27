<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'alamat' => 'Jl. Raya',
            'foto_profil' => 'default.jpg',
            'id_user' => 2,
            'no_hp' => '08111222288'
        ]);
    }
}
