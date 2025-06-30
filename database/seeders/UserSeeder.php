<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $editor = User::firstOrCreate([
            'email' => 'editor@example.com',
        ], [
            'name' => 'Editor',
            'password' => bcrypt('password')
        ]);
        $editor->assignRole('editor');
    }
}
