<?php

namespace App\Http\Controllers;

use App\Models\BirthRecord;
use App\Models\DeathRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function deathReport()
    {
        return view('death_records.report');
    }

    public function generate(Request $request)
    {
        $query = DeathRecord::query();

        // Filter by date
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date_of_death', [$request->from_date, $request->to_date]);
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filter by cause of death
        if ($request->filled('cause_of_death')) {
            $query->where('cause_of_death', $request->cause_of_death);
        }

        $data = $query->get();

        $monthlyStats = DeathRecord::selectRaw('MONTH(date_of_death) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        $genderStats = DeathRecord::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        $causeStats = DeathRecord::select('cause_of_death', DB::raw('count(*) as total'))
            ->groupBy('cause_of_death')
            ->get();

        return view('death_records.results', compact('data', 'monthlyStats', 'genderStats', 'causeStats'));
    }

    public function birthReport()
    {

        return view('birth_records.reports');
    }

    public function filter(Request $request)
    {
        $query = BirthRecord::query();

        // Filter by date
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('registration_date', [$request->from_date, $request->to_date]);
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        
        $data = $query->get();

        $monthlyStats = BirthRecord::selectRaw('MONTH(registration_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        $genderStats = BirthRecord::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        return view('birth_records.results', compact('data', 'monthlyStats', 'genderStats'));
    }
}
