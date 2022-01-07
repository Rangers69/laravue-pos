<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 15; $i++)
        {
            $customer = new Customer;

            $customer->name = $faker->name;
            $customer->phone_number = '0878'.$faker->randomNumber(8);
            $customer->address = $faker->address;

            $customer->save();
        }
    }
}
