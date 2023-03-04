<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        \App\Models\Admin::create([
            'name' => 'test admin',
            'email' => 'admin@gmail.com',
            'user_name' => 'test_admin',
            'password' => bcrypt("admin"),
            'com_code' => '1',
        ]);
    }


}
