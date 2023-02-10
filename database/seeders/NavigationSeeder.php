<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Navigation::create([
            'name' => 'Navigation', 
            'icon' => 'fa fa-list',
            'is_active' => '1',
        ]);
    }
}
