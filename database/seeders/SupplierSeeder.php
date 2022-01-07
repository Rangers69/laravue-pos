<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
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
            $supplier = new Supplier;

            $supplier->name = $faker->name;
            $supplier->email = $faker->email;
            $supplier->phone_number = '0878'.$faker->randomNumber(8);
            $supplier->address = $faker->address;

            $supplier->save();
        }
    }
}
