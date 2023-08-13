<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = Storage::get('locations.csv');

        $rows = array_map('str_getcsv', explode("\n", $csv));

        foreach ($rows as $row) {
            if (count($row) !== 3) {
                continue;
            }

            Location::firstOrCreate(
                [

                    'name' => $row[0],
                ],
                [
                    'latitude' => $row[1],
                    'longitude' => $row[2],
                ]
            );
        }
    }
}
