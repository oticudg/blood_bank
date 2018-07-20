<?php

use Illuminate\Database\Seeder;

class BloodGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\Donation\BloodGroup::create(['name' => 'A+']);
    	App\Models\Donation\BloodGroup::create(['name' => 'A-']);
    	App\Models\Donation\BloodGroup::create(['name' => 'B+']);
    	App\Models\Donation\BloodGroup::create(['name' => 'B-']);
    	App\Models\Donation\BloodGroup::create(['name' => 'AB+']);
    	App\Models\Donation\BloodGroup::create(['name' => 'AB-']);
    	App\Models\Donation\BloodGroup::create(['name' => 'O+']);
    	App\Models\Donation\BloodGroup::create(['name' => 'O-']);
    }
}







