<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    public function run()
    {
        $sectorsData = [
            // Kigali City
            'Gasabo' => [
                'Bumbogo', 'Gatsata', 'Gikomero', 'Gisozi', 'Jabana',
                'Jali', 'Kacyiru', 'Kimihurura', 'Kimironko', 'Kinyinya',
                'Ndera', 'Nduba', 'Remera', 'Rusororo', 'Rutunga'
            ],
            'Kicukiro' => [
                'Gikondo', 'Kanombe', 'Kigarama', 'Masaka', 'Niboye',
                'Nyarugunga', 'Nyanza', 'Nyakabanda'
            ],
            'Nyarugenge' => [
                'Gitega', 'Kanyinya', 'Kimisagara', 'Mageragere', 'Muhima',
                'Nyakabanda', 'Nyamirambo', 'Nyarugenge', 'Rwezamenyo', 'Kiyovu'
            ],

            // Northern Province
            'Burera' => [
                'Bungwe', 'Buramba', 'Butaro', 'Gahunga', 'Kagogo',
                'Kigogo', 'Kinoni', 'Kinyababa', 'Matobo', 'Nyamiyaga',
                'Rugarama'
            ],
            'Gakenke' => [
                'Busengo', 'Cyabingo', 'Cyinzuzi', 'Gakenke', 'Janja',
                'Kamubuga', 'Musanze', 'Muyongwe', 'Muzo', 'Ruli',
                'Rushashi'
            ],
            'Gicumbi' => [
                'Bukure', 'Cyahinda', 'Gasave', 'Kamunini', 'Karambo',
                'Kageyo', 'Karuruma', 'Nyabirasi', 'Ruhunde', 'Rukomo'
            ],
            'Musanze' => [
                'Busogo', 'Cyuve', 'Gacaca', 'Gashaki', 'Gataraga',
                'Kimonyi', 'Kinigi', 'Muhoza', 'Muko', 'Musanze',
                'Nkotsi', 'Nyange', 'Remera', 'Rwaza', 'Shingiro'
            ],
            'Rulindo' => [
                'Base', 'Kabayaya', 'Kageyo', 'Mugote', 'Ruli',
                'Muvumba', 'Rusiga', 'Shyorongi', 'Tumba'
            ],

            // Eastern Province
            'Bugesera' => [
                'Gashora', 'Ntarama', 'Nyamata', 'Rilima', 'Sake',
                'Rukira', 'Rurenge', 'Runda'
            ],
            'Gatsibo' => [
                'Gasange', 'Kabarore', 'Kageyo', 'Kigabiro', 'Musanze',
                'Nyagihanga', 'Remera', 'Rugendabari', 'Rwimbogo', 'Kanzige'
            ],
            'Kayonza' => [
                'Gahini', 'Kabarondo', 'Mwiri', 'Murama', 'Ruramira',
                'Rwinkwavu'
            ],
            'Kirehe' => [
                'Kigarama', 'Mugesera', 'Nyarugusu', 'Nyamirama', 'Rwinkwavu',
                'Rurenge', 'Rwasave'
            ],
            'Ngoma' => [
                'Gashanda', 'Jarama', 'Kabare', 'Mukarange', 'Murama',
                'Rurenge', 'Rwinkwavu'
            ],
            'Nyagatare' => [
                'Gashanda', 'Kiyombe', 'Matimba', 'Nyagatare', 'Rukomo',
                'Rusanze', 'Tabagwe', 'Gatunda', 'Rukomo'
            ],
            'Rwamagana' => [
                'Fumbwe', 'Gahengeri', 'Karenge', 'Muhazi', 'Munyaga',
                'Mwurire', 'Nyakariro', 'Nzige', 'Rwimbogo'
            ],

            // Western Province
            'Karongi' => [
                'Gitesi', 'Mugongo', 'Murundi', 'Nkombo', 'Rubengera'
            ],
            'Nyabihu' => [
                'Busheke', 'Cyabwoni', 'Kigeyo', 'Muko', 'Shyira'
            ],
            'Ngororero' => [
                'Cyovu', 'Kageyo', 'Kigeyo', 'Mushonyi', 'Ngororero', 'Shyira'
            ],
            'Nyamasheke' => [
                'Bushenge', 'Cyabingo', 'Cyarubare', 'Kanjongo', 'Kigina',
                'Murambi', 'Rugerero', 'Rusizi'
            ],
            'Rubavu' => [
                'Busasamana', 'Cyanzarwe', 'Gisenyi', 'Kanama', 'Nyundo',
                'Rubavu'
            ],
            'Rutsiro' => [
                'Kivumu', 'Mubuga', 'Mushonyi', 'Rutsiro', 'Shangi'
            ],

            // Southern Province
            'Gisagara' => [
                'Gikonko', 'Kinyababa', 'Masango', 'Nkombo', 'Rugarama',
                'Songa'
            ],
            'Huye' => [
                'Cyeza', 'Kabacuzi', 'Kigoma', 'Muganza', 'Ngoma',
                'Nyagisozi', 'Rugobagoba', 'Busasamana'
            ],
            'Kamonyi' => [
                'Kayenzi', 'Musambira', 'Musha', 'Ngamba', 'Rugendabari',
                'Rukoma', 'Rundugira'
            ],
            'Muhanga' => [
                'Cyeza', 'Kabacuzi', 'Kigoma', 'Muganza', 'Nyamabuye',
                'Rugendabari'
            ],
            'Nyanza' => [
                'Busasamana', 'Kansi', 'Ntyazo', 'Rwabusoro', 'Rwimbogo',
                'Gasaka', 'Kavumu', 'Nyabisindu', 'Nyarutovu'
            ],
            'Nyaruguru' => [
                'Kibeho', 'Muganza', 'Nyagisozi', 'Nyarusiza', 'Rugendabari',
                'Runda', 'Ruramba'
            ],
            'Ruhango' => [
                'Bweramana', 'Cyarushashi', 'Mbuye', 'Nyabinoni', 'Ntongwe',
                'Rugendabari', 'Runda'
            ],
        ];

        foreach ($sectorsData as $districtName => $sectors) {
            $district = District::where('name', $districtName)->first();

            if (!$district) {
                $this->command->warn("District '{$districtName}' not found, skipping.");
                continue;
            }

            foreach ($sectors as $sectorName) {
                Sector::updateOrCreate(
                    ['name' => $sectorName, 'district_id' => $district->id]
                );
            }
        }

        $this->command->info('Rwanda sectors seeded successfully.');
    }
}
