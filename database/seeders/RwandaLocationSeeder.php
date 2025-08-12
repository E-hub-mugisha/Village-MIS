<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;
use App\Models\Cell;
use App\Models\Village;

class RwandaLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/locations.json'));
        $data = json_decode($json, true);

        foreach ($data['provinces'] as $prov) {
            $province = Province::create(['name' => $prov['name']]);
            foreach ($prov['districts'] as $dist) {
                $district = District::create([
                    'name' => $dist['name'],
                    'province_id' => $province->id,
                ]);
                foreach ($dist['sectors'] as $sec) {
                    $sector = Sector::create([
                        'name' => $sec['name'],
                        'district_id' => $district->id,
                    ]);
                    foreach ($sec['cells'] as $cellData) {
                        $cell = Cell::create([
                            'name' => $cellData['name'],
                            'sector_id' => $sector->id,
                        ]);
                        foreach ($cellData['villages'] as $vill) {
                            Village::create([
                                'name' => $vill['name'],
                                'cell_id' => $cell->id,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
