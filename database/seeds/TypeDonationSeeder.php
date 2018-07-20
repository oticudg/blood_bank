<?php

use Illuminate\Database\Seeder;

class TypeDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Models\Donation\TypeDonation::create(['name' => 'Dirigida', 'abbreviation' => 'Dir']);
    	\App\Models\Donation\TypeDonation::create(['name' => 'Voluntaria', 'abbreviation' => 'Vol']);
    	\App\Models\Donation\TypeDonation::create(['name' => 'REP', 'abbreviation' => 'Rep']);
    	\App\Models\Donation\TypeDonation::create(['name' => 'AUTO', 'abbreviation' => 'Auto']);
    }
}
