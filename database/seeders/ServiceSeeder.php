<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::insert([
            ['name' => 'Haircut', 'price' => 15],
            ['name' => 'Beard Trim', 'price' => 10],
            ['name' => 'Shave', 'price' => 8],
            ['name' => 'Hair Styling', 'price' => 20],
            ['name' => 'Facial Treatment', 'price' => 25],
            ['name' => 'Hair Color', 'price' => 30],
            ['name' => 'Hot Towel Shave', 'price' => 12],
        ]);
    }
}
