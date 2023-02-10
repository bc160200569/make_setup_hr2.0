<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'super_admin',
            'name' => 'Super Admin', 
            'email' => 'admin@pitb.gov.pk', 
            'password' => Hash::make('admin@pitb'),
            'phone_number' => '0000000000',
            'role_id' => '1',
            'is_active' => '1',
            'created_by' => '0',
            'updated_by' => '0',
        ]);
    }
}
