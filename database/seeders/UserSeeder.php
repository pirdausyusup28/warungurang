<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cup',
            'email' => 'cup@gmail.com',
            'password' => Hash::make('cup'),
            'remember_token' => null, // Ini akan di-generate oleh middleware setelah login
        ]);
    }
}
