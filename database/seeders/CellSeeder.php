<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sector;

class CellSeeder extends Seeder
{
    public function run()
    {
        $cellsData = [
            // Kigali City (Gasabo District sectors)
            'Bumbogo' => ['Bumbogo', 'Kanombe', 'Kimisagara', 'Kacyiru', 'Kibagabaga', 'Nyarutarama', 'Nyarugunga', 'Remera'],
            'Kanombe' => ['Kanombe', 'Kimisagara', 'Kacyiru', 'Nyarugunga', 'Remera'],
            'Kimisagara' => ['Kimisagara', 'Kanombe', 'Nyarugunga', 'Remera', 'Bumbogo'],
            'Kacyiru' => ['Kacyiru', 'Kibagabaga', 'Nyarutarama', 'Nyarugunga', 'Remera'],
            'Kibagabaga' => ['Kibagabaga', 'Nyarutarama', 'Nyarugunga', 'Remera'],
            'Nyarutarama' => ['Nyarutarama', 'Kibagabaga', 'Remera'],
            'Nyarugunga' => ['Nyarugunga', 'Bumbogo', 'Kanombe', 'Kimisagara', 'Kacyiru'],
            'Remera' => ['Remera', 'Nyarutarama', 'Kibagabaga', 'Nyarugunga'],

            // Kigali City (Kicukiro District sectors)
            'Gikondo' => ['Gikondo', 'Kanombe', 'Niboye', 'Kigarama', 'Nyarugunga', 'Masaka', 'Nyakabanda'],
            'Kanombe' => ['Kanombe', 'Gikondo', 'Niboye', 'Masaka'],
            'Niboye' => ['Niboye', 'Gikondo', 'Kanombe'],
            'Kigarama' => ['Kigarama', 'Gikondo', 'Masaka'],
            'Masaka' => ['Masaka', 'Gikondo', 'Kanombe', 'Kigarama'],
            'Nyakabanda' => ['Nyakabanda', 'Gikondo', 'Masaka'],

            // Kigali City (Nyarugenge District sectors)
            'Kanyinya' => ['Kanyinya', 'Gitega', 'Nyamirambo', 'Muhima'],
            'Gitega' => ['Gitega', 'Kanyinya', 'Nyamirambo', 'Muhima'],
            'Nyamirambo' => ['Nyamirambo', 'Gitega', 'Kanyinya', 'Muhima'],
            'Muhima' => ['Muhima', 'Nyamirambo', 'Gitega', 'Kanyinya'],
            'Mageragere' => ['Mageragere', 'Kimisagara', 'Rwezamenyo'],
            'Kimisagara' => ['Kimisagara', 'Mageragere', 'Rwezamenyo'],
            'Rwezamenyo' => ['Rwezamenyo', 'Mageragere', 'Kimisagara'],
            'Kiyovu' => ['Kiyovu', 'Muhima', 'Nyamirambo'],

            // Northern Province (Burera District sectors)
            'Bungwe' => ['Bungwe'],
            'Buramba' => ['Buramba'],
            'Kagogo' => ['Kagogo'],
            'Nyamiyaga' => ['Nyamiyaga'],
            'Rugarama' => ['Rugarama'],

            // Northern Province (Gicumbi District sectors)
            'Bukure' => ['Bukure'],
            'Cyahinda' => ['Cyahinda'],
            'Gasave' => ['Gasave'],
            'Kamunini' => ['Kamunini'],
            'Karambo' => ['Karambo'],
            'Kageyo' => ['Kageyo'],
            'Karuruma' => ['Karuruma'],
            'Nyabirasi' => ['Nyabirasi'],
            'Ruhunde' => ['Ruhunde'],
            'Rukomo' => ['Rukomo'],

            // Northern Province (Musanze District sectors)
            'Busogo' => ['Busogo'],
            'Cyuve' => ['Cyuve'],
            'Gataraga' => ['Gataraga'],
            'Kabeza' => ['Kabeza'],
            'Muko' => ['Muko'],
            'Bwiru' => ['Bwiru'],
            'Gashyushya' => ['Gashyushya'],
            'Musanze' => ['Musanze'],
            'Nyakinama' => ['Nyakinama'],
            'Rugendabari' => ['Rugendabari'],

            // Northern Province (Rulindo District sectors)
            'Base' => ['Base'],
            'Kabayaya' => ['Kabayaya'],
            'Kageyo' => ['Kageyo'],
            'Mugote' => ['Mugote'],
            'Ruli' => ['Ruli'],
            'Muvumba' => ['Muvumba'],
            'Rusiga' => ['Rusiga'],
            'Shyorongi' => ['Shyorongi'],
            'Tumba' => ['Tumba'],

            // Northern Province (Gakenke District sectors)
            'Busengo' => ['Busengo'],
            'Cyabingo' => ['Cyabingo'],
            'Cyinzuzi' => ['Cyinzuzi'],
            'Gakenke' => ['Gakenke'],
            'Janja' => ['Janja'],
            'Kamubuga' => ['Kamubuga'],
            'Musanze' => ['Musanze'],
            'Muyongwe' => ['Muyongwe'],
            'Muzo' => ['Muzo'],
            'Ruli' => ['Ruli'],
            'Rushashi' => ['Rushashi'],

            // Southern Province (Gisagara District sectors)
            'Gikonko' => ['Gikonko'],
            'Kinyababa' => ['Kinyababa'],
            'Masango' => ['Masango'],
            'Nkombo' => ['Nkombo'],
            'Rugarama' => ['Rugarama'],
            'Rugendabari' => ['Rugendabari'],
            'Songa' => ['Songa'],

            // Southern Province (Huye District sectors)
            'Ngoma' => ['Ngoma'],
            'Busasamana' => ['Busasamana'],
            'Cyeza' => ['Cyeza'],
            'Kabacuzi' => ['Kabacuzi'],
            'Kigoma' => ['Kigoma'],
            'Muganza' => ['Muganza'],
            'Nyagisozi' => ['Nyagisozi'],
            'Rugobagoba' => ['Rugobagoba'],

            // Southern Province (Kamonyi District sectors)
            'Kayenzi' => ['Kayenzi'],
            'Musanze' => ['Musanze'],
            'Nyamiyaga' => ['Nyamiyaga'],
            'Rugendabari' => ['Rugendabari'],
            'Rukoma' => ['Rukoma'],
            'Rundugira' => ['Rundugira'],

            // Southern Province (Muhanga District sectors)
            'Cyeza' => ['Cyeza'],
            'Kabacuzi' => ['Kabacuzi'],
            'Kigoma' => ['Kigoma'],
            'Muganza' => ['Muganza'],
            'Nyamabuye' => ['Nyamabuye'],
            'Rugendabari' => ['Rugendabari'],

            // Southern Province (Nyanza District sectors)
            'Busasamana' => ['Busasamana'],
            'Kansi' => ['Kansi'],
            'Ntyazo' => ['Ntyazo'],
            'Rwabusoro' => ['Rwabusoro'],
            'Rwimbogo' => ['Rwimbogo'],
            'Gasaka' => ['Gasaka'],
            'Kavumu' => ['Kavumu'],
            'Nyabisindu' => ['Nyabisindu'],
            'Nyarutovu' => ['Nyarutovu'],
            'Rugendabari' => ['Rugendabari'],

            // Southern Province (Nyaruguru District sectors)
            'Kibeho' => ['Kibeho'],
            'Muganza' => ['Muganza'],
            'Nyagisozi' => ['Nyagisozi'],
            'Nyarusiza' => ['Nyarusiza'],
            'Rugendabari' => ['Rugendabari'],
            'Runda' => ['Runda'],
            'Ruramba' => ['Ruramba'],

            // Southern Province (Ruhango District sectors)
            'Bweramana' => ['Bweramana'],
            'Cyarushashi' => ['Cyarushashi'],
            'Mbuye' => ['Mbuye'],
            'Nyabinoni' => ['Nyabinoni'],
            'Ntongwe' => ['Ntongwe'],
            'Rugendabari' => ['Rugendabari'],
            'Runda' => ['Runda'],

            // Eastern Province (Bugesera District sectors)
            'Gashora' => ['Gashora'],
            'Ntarama' => ['Ntarama'],
            'Nyamata' => ['Nyamata'],
            'Rilima' => ['Rilima'],
            'Sake' => ['Sake'],
            'Rukira' => ['Rukira'],
            'Rurenge' => ['Rurenge'],
            'Runda' => ['Runda'],

            // Eastern Province (Gatsibo District sectors)
            'Gasange' => ['Gasange'],
            'Kabarore' => ['Kabarore'],
            'Kageyo' => ['Kageyo'],
            'Kigabiro' => ['Kigabiro'],
            'Musanze' => ['Musanze'],
            'Nyagihanga' => ['Nyagihanga'],
            'Remera' => ['Remera'],
            'Rugendabari' => ['Rugendabari'],
            'Rwimbogo' => ['Rwimbogo'],

            // Eastern Province (Kayonza District sectors)
            'Gahini' => ['Gahini'],
            'Kabarondo' => ['Kabarondo'],
            'Mwiri' => ['Mwiri'],
            'Murama' => ['Murama'],
            'Ruramira' => ['Ruramira'],
            'Rwinkwavu' => ['Rwinkwavu'],

            // Eastern Province (Kirehe District sectors)
            'Kigarama' => ['Kigarama'],
            'Mugesera' => ['Mugesera'],
            'Nyarugusu' => ['Nyarugusu'],
            'Nyamirama' => ['Nyamirama'],
            'Rwinkwavu' => ['Rwinkwavu'],
            'Rurenge' => ['Rurenge'],
            'Rwasave' => ['Rwasave'],

            // Eastern Province (Ngoma District sectors)
            'Gashanda' => ['Gashanda'],
            'Jarama' => ['Jarama'],
            'Kabare' => ['Kabare'],
            'Mukarange' => ['Mukarange'],
            'Murama' => ['Murama'],
            'Rurenge' => ['Rurenge'],
            'Rwinkwavu' => ['Rwinkwavu'],

            // Eastern Province (Rwamagana District sectors)
            'Fumbwe' => ['Fumbwe'],
            'Gahengeri' => ['Gahengeri'],
            'Karenge' => ['Karenge'],
            'Muhazi' => ['Muhazi'],
            'Munyaga' => ['Munyaga'],
            'Mwurire' => ['Mwurire'],
            'Nyakariro' => ['Nyakariro'],
            'Nzige' => ['Nzige'],
            'Rwimbogo' => ['Rwimbogo'],

            // Western Province (Karongi District sectors)
            'Gitesi' => ['Gitesi'],
            'Mugongo' => ['Mugongo'],
            'Murundi' => ['Murundi'],
            'Nkombo' => ['Nkombo'],
            'Rubengera' => ['Rubengera'],

            // Western Province (Nyabihu District sectors)
            'Busheke' => ['Busheke'],
            'Cyabwoni' => ['Cyabwoni'],
            'Kigeyo' => ['Kigeyo'],
            'Muko' => ['Muko'],
            'Shyira' => ['Shyira'],

            // Western Province (Nyamasheke District sectors)
            'Bushenge' => ['Bushenge'],
            'Cyabingo' => ['Cyabingo'],
            'Cyarubare' => ['Cyarubare'],
            'Kanjongo' => ['Kanjongo'],
            'Kigina' => ['Kigina'],
            'Murambi' => ['Murambi'],
            'Rugerero' => ['Rugerero'],
            'Rusizi' => ['Rusizi'],

            // Western Province (Rubavu District sectors)
            'Busasamana' => ['Busasamana'],
            'Cyanzarwe' => ['Cyanzarwe'],
            'Gisenyi' => ['Gisenyi'],
            'Kanama' => ['Kanama'],
            'Nyundo' => ['Nyundo'],
            'Rubavu' => ['Rubavu'],

            // Western Province (Rutsiro District sectors)
            'Kivumu' => ['Kivumu'],
            'Mubuga' => ['Mubuga'],
            'Mushonyi' => ['Mushonyi'],
            'Rutsiro' => ['Rutsiro'],
            'Shangi' => ['Shangi'],

            // Western Province (Ngororero District sectors)
            'Cyovu' => ['Cyovu'],
            'Kageyo' => ['Kageyo'],
            'Kigeyo' => ['Kigeyo'],
            'Mushonyi' => ['Mushonyi'],
            'Ngororero' => ['Ngororero'],
            'Shyira' => ['Shyira'],
        ];


        foreach ($cellsData as $sectorName => $cells) {
            $sector = Sector::where('name', $sectorName)->first();

            if (!$sector) {
                echo "Sector '$sectorName' not found, skipping its cells.\n";
                continue;
            }

            foreach ($cells as $cellName) {
                DB::table('cells')->updateOrInsert(
                    ['name' => $cellName, 'sector_id' => $sector->id],
                    ['name' => $cellName, 'sector_id' => $sector->id]
                );
            }
        }

        echo "Rwanda cells seeded successfully.\n";
    }
}
