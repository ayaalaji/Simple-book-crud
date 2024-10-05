<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'password' =>Hash::make('12345678'),
            'role' =>'admin'
        ]);
    }
}