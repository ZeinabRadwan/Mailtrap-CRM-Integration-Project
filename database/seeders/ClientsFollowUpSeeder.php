<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientsFollowUp;

class ClientsFollowUpSeeder extends Seeder
{
    public function run()
    {
        // Create sample data
        ClientsFollowUp::create([
            'ar_name' => 'moawia store',
            'email' => 'moawiaa2bugroo@glary.sao',
        ]);

        ClientsFollowUp::create([
            'ar_name' => 'Glary Sa',
            'email' => 'glaryksa@gmail.com',
        ]);
    }
}
