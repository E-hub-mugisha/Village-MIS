<?php

namespace App\Http\Controllers;

use App\Models\BirthRecord;
use App\Models\DeathRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Total stats
        $monthlyBirths = BirthRecord::whereMonth('date_of_birth', $currentMonth)->count();
        $yearlyBirths = BirthRecord::whereYear('date_of_birth', $currentYear)->count();
        $monthlyDeaths = DeathRecord::whereMonth('date_of_death', $currentMonth)->count();
        $yearlyDeaths = DeathRecord::whereYear('date_of_death', $currentYear)->count();

        // Gender distribution
        $birthsByGender = BirthRecord::select('gender', DB::raw('count(*) as total'))
                            ->groupBy('gender')->get();

        $deathsByGender = DeathRecord::select('gender', DB::raw('count(*) as total'))
                            ->groupBy('gender')->get();

        // Village distribution
        $topVillagesBirths = BirthRecord::select('village', DB::raw('count(*) as total'))
                                ->groupBy('village')->orderByDesc('total')->take(5)->get();

        $topVillagesDeaths = DeathRecord::select('village', DB::raw('count(*) as total'))
                                ->groupBy('village')->orderByDesc('total')->take(5)->get();

        // Age group breakdown for deaths
        $ageGroups = DeathRecord::selectRaw("
                CASE 
                    WHEN age < 1 THEN 'Infant'
                    WHEN age BETWEEN 1 AND 12 THEN 'Child'
                    WHEN age BETWEEN 13 AND 19 THEN 'Teen'
                    WHEN age BETWEEN 20 AND 59 THEN 'Adult'
                    ELSE 'Senior'
                END as age_group,
                COUNT(*) as total
            ")->groupBy('age_group')->get();

        // Cause of death breakdown
        $deathCauses = DeathRecord::select('cause_of_death', DB::raw('count(*) as total'))
                            ->groupBy('cause_of_death')->get();

        return view('dashboard.index', compact(
            'monthlyBirths', 'yearlyBirths', 'monthlyDeaths', 'yearlyDeaths',
            'birthsByGender', 'deathsByGender', 'topVillagesBirths',
            'topVillagesDeaths', 'ageGroups', 'deathCauses'
        ));
    }
}
