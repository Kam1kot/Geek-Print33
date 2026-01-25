<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            ['username' => env('OWNER_LOGIN'), 'password' => bcrypt(env('OWNER_PASS'))],
            ['username' => env('DEV_LOGIN'), 'password' => bcrypt(env('DEV_PASS'))],
        ];
        
        foreach ($admins as $admin) {
            Admin::firstOrCreate($admin);
        }
    }
}
