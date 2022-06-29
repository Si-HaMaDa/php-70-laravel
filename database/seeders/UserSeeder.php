<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', '=', 'admin@admin.com')->first();
        if (!$user) {
            User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
            ]);
        }

        User::factory(10)->create();
    }
}
