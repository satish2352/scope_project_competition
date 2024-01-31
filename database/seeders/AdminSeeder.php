<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admins::create(
            [
                'u_email' => 'admin@gmail.com',
                'u_password' => bcrypt('Pass@ETS23'),
                'mobile_no' =>'7083806410',
                'registration_type' =>'0',
            ]);
            Admins::create(
                [
                    'u_email' => 'industry@gmail.com',
                    'u_password' => bcrypt('Industry@123'),
                    'mobile_no' =>'7083806410',
                    'registration_type' =>'1',
                ]);
            
    }
}