<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example districts grouped by province_id
        // You must have provinces seeded first to get their IDs

        $districts = [
            1 => [ // Kigali City
                'Gasabo',
                'Kicukiro',
                'Nyarugenge',
            ],
            2 => [ // Northern Province
                'Burera',
                'Gakenke',
                'Gicumbi',
                'Musanze',
                'Rulindo',
            ],
            3 => [ // Southern Province
                'Gisagara',
                'Huye',
                'Kamonyi',
                'Muhanga',
                'Nyamagabe',
                'Nyanza',
                'Nyaruguru',
                'Ruhango',
            ],
            4 => [ // Eastern Province
                'Bugesera',
                'Gatsibo',
                'Kayonza',
                'Kirehe',
                'Ngoma',
                'Nyagatare',
                'Rwamagana',
            ],
            5 => [ // Western Province
                'Karongi',
                'Ngororero',
                'Nyabihu',
                'Nyamasheke',
                'Rubavu',
                'Rusizi',
                'Rutsiro',
            ],
        ];

        foreach ($districts as $provinceId => $districtList) {
            foreach ($districtList as $district) {
                DB::table('districts')->insert([
                    'province_id' => $provinceId,
                    'name' => $district,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
