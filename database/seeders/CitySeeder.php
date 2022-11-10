<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->city = "New York";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Wien";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "London";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Berlin";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Tokio";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Stockholm";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Paris";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Los Angeles";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();

        $city = new City();
        $city->city = "Mexico City";
        $city->created_at = now();
        $city->updated_at = now();
        $city->save();
    }
}