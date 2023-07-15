<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'G.211.20.0093',
            'email' => 'G.211.20.0093@gmail.com',
            'password' => Hash::make('admin')
        ]);
    }
}
