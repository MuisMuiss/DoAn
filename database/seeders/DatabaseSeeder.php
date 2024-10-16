<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // $user = new User;
        // $user->fullname = 'Admin';
        // $user->username = 'admin';
        // $user->email='admin@gmail.com';
        // $user->password = bcrypt('123456');
        // $user->phone='0123456789';
        // $user->address='HCM';
        // $user->isadmin=true;
        // $user->anh='a.jpg';
        // $user->date='';
        // $user->status=true;
    }
}
