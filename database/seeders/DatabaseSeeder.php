<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            SuperAdminSeeder::class,
            NavigationSeeder::class,
        ]);
        // Role::create([
        //     'name' => 'super_admin',
        //     'is_active' => '1',
        // ]);
        // User::create([
        //     'username' => 'super_admin',
        //     'name' => 'Super Admin', 
        //     'email' => 'admin@pitb.gov.pk', 
        //     'password' => Hash::make('admin@pitb'),
        //     'phone_number' => '0000000000',
        //     'role_id' => '1',
        //     'is_active' => '1',
        //     'created_by' => '0',
        //     'updated_by' => '0',
        // ]);
    }
}
