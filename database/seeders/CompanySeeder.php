<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Company::create([
                'name' => $faker->company,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
                'logo' => asset('images/default-logo.png')
            ]);
        }
    }
}
