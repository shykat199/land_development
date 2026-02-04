<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ], [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => ADMIN_ROLE,
                'city_corporation' => 'Dhaka',
                'jln' => '01',
                'thana' => 'Dhanmondi',
                'district' => 'Dhaka',
                'holding_no' => 'H-100',
                'khotian_no' => 'K-200',
                'owner_share' => '1',
            ]
        );
    }
}
