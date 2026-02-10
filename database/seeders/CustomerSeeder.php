<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Create sample data
        Customer::create([
            'ar_name' => 'test User',
            'en_name' => 'demo2',
            'email' => 'demo2@glayr.sa',
        ]);

        Customer::create([
            'ar_name' => 'reham youssef',
            'en_name' => 'reham youssef',
            'email' => 'rehamyoussof9@gmail.com',
        ]);
    }
}
