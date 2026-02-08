<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'otp' => '123456',
            'name' => 'admin',
            'email' => 'shreevyas65@gmail.com',
            'mobile' => '7066498174',
            'status' => 'active',
        ]);
    }
}