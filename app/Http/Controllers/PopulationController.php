<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\District;
use App\Models\Population;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Village;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        // Load populations with related location models to avoid N+1 problem
        $populations = Population::with(['province', 'district', 'sector', 'cell', 'village'])->get();

        // Pass location data for dropdowns
        $provinces = Province::all();
        $districts = District::all();
        $sectors = Sector::all();
        $cells = Cell::all();
        $villages = Village::all();

        return view('populations.index', compact('populations', 'provinces', 'districts', 'sectors', 'cells', 'villages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'province' => 'required|exists:provinces,id',
            'district' => 'required|exists:districts,id',
            'sector' => 'required|exists:sectors,id',
            'cell' => 'required|exists:cells,id',
            'village' => 'required|exists:villages,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'total' => 'required|integer|min:0',
            'male' => 'required|integer|min:0',
            'female' => 'required|integer|min:0',
            'age014' => 'required|integer|min:0',
            'age1564' => 'required|integer|min:0',
            'age65plus' => 'required|integer|min:0',
        ]);

        Population::create([
            'province_id' => $validated['province'],
            'district_id' => $validated['district'],
            'sector_id' => $validated['sector'],
            'cell_id' => $validated['cell'],
            'village_id' => $validated['village'],
            'year' => $validated['year'],
            'total_population' => $validated['total'],
            'male_population' => $validated['male'],
            'female_population' => $validated['female'],
            'age_0_14' => $validated['age014'],
            'age_15_64' => $validated['age1564'],
            'age_65_plus' => $validated['age65plus'],
        ]);

        return redirect()->route('populations.index')->with('success', 'Population record added successfully.');
    }

    public function update(Request $request, Population $population)
    {
        $validated = $request->validate([
            'province' => 'required|exists:provinces,id',
            'district' => 'required|exists:districts,id',
            'sector' => 'required|exists:sectors,id',
            'cell' => 'required|exists:cells,id',
            'village' => 'required|exists:villages,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'total' => 'required|integer|min:0',
            'male' => 'required|integer|min:0',
            'female' => 'required|integer|min:0',
            'age014' => 'required|integer|min:0',
            'age1564' => 'required|integer|min:0',
            'age65plus' => 'required|integer|min:0',
        ]);

        $population->update([
            'province_id' => $validated['province'],
            'district_id' => $validated['district'],
            'sector_id' => $validated['sector'],
            'cell_id' => $validated['cell'],
            'village_id' => $validated['village'],
            'year' => $validated['year'],
            'total_population' => $validated['total'],
            'male_population' => $validated['male'],
            'female_population' => $validated['female'],
            'age_0_14' => $validated['age014'],
            'age_15_64' => $validated['age1564'],
            'age_65_plus' => $validated['age65plus'],
        ]);

        return redirect()->route('populations.index')->with('success', 'Population record updated successfully.');
    }

    public function destroy(Population $population)
    {
        $population->delete();

        return redirect()->route('populations.index')->with('success', 'Population record deleted successfully.');
    }
}
