<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            [
                'name' => 'vsscp',
                'phone_number' => '9876543210',
                'gender' => 'male',
                'role' => 'admin',
                'password' => Hash::make('#admin123#')
            ],
            [
                'name' => 'Rajiv Ranjan',
                'phone_number' => '7909046312',
                'gender' => 'male',
                'role' => 'teacher',
                'password' => Hash::make('ankushraj123.')
            ],
            [
                'name' => 'Dipu Ranjan',
                'phone_number' => '7970929701',
                'gender' => 'male',
                'role' => 'student',
                'password' => Hash::make('dipu123#')
            ]
        ]);

        DB::table('teachers')->insert([
            [
                'name' => 'Rajiv Ranjan',
                'phone_number' => '7909046312',
                'gender' => 'male',
                'photo_left' => 'placeholder_l.svg',
                'photo_right' => 'placeholder_r.svg'
            ]
        ]);
    }
}
