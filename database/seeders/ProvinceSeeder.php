<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            'Kigali City',
            'Northern Province',
            'Southern Province',
            'Eastern Province',
            'Western Province',
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'name' => $province,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
