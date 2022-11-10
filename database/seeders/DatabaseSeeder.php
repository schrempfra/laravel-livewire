<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        if(config('admin.admin_name')) {
            User::firstOrCreate(
                [
                    'email' => config('admin.admin_email')], [
                    'name' => config('admin.admin_name'),
                    'password' => bcrypt(config('admin.admin_password')),
                    'roles' => 'ROLE_ADMIN',
                    'email_verified_at' => now(),
                ]
            );
        }
        
        $this->call([
            CitySeeder::class,
        ]);
    }
}
