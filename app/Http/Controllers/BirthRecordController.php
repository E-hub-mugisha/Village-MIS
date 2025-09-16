<?php

namespace App\Http\Controllers;

use App\Models\BirthRecord;
use App\Models\DeathRecord;
use App\Models\Population;
use App\Models\District;
use App\Models\Sector;
use App\Models\Cell;
use App\Models\Province;
use App\Models\Village;
use App\Notifications\RegistrationConfirmationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BirthRecordController extends Controller
{
    public function index()
    {
        $birthRecords = BirthRecord::all();
        $provinces = Province::all();
        return view('birth_records.index', compact('birthRecords', 'provinces'));
    }

    public function create()
    {
        return view('birth_records.create');
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'informant_name' => 'required',
            'registration_date' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'sector_id' => 'required',
            'cell_id' => 'required',
            'village_id' => 'required',
        ]);

        $yearOfBirth = date('Y', strtotime($request->date_of_birth));

        $population = Population::firstOrCreate([
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'sector_id' => $request->sector_id,
            'cell_id' => $request->cell_id,
            'village_id' => $request->village_id,
            'year' => $yearOfBirth,
        ]);

        $certificateNumber = 'BRC-' . strtoupper(Str::random(8));

        BirthRecord::create([
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'informant_name' => $request->informant_name,
            'registration_date' => $request->registration_date,
            'certificate_number' => $certificateNumber,
            'user_id' => Auth::id(),
            'population_id' => $population->id,
            'village_id' => $request->village_id,
        ]);

        Auth::user()->notify(new RegistrationConfirmationNotification());

        return redirect()->route('birth_records.index')->with('success', 'Birth record added.');
    }

    public function update(Request $request, BirthRecord $birthRecord)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'informant_name' => 'required',
            'registration_date' => 'required|date',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'sector_id' => 'required|exists:sectors,id',
            'cell_id' => 'required|exists:cells,id',
            'village_id' => 'required|exists:villages,id',
        ]);

        $yearOfBirth = date('Y', strtotime($request->date_of_birth));

        $population = Population::firstOrCreate([
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'sector_id' => $request->sector_id,
            'cell_id' => $request->cell_id,
            'village_id' => $request->village_id,
            'year' => $yearOfBirth,
        ]);

        $birthRecord->update(array_merge(
            $request->only([
                'full_name',
                'gender',
                'date_of_birth',
                'place_of_birth',
                'father_name',
                'mother_name',
                'informant_name',
                'registration_date',
                'village_id'
            ]),
            ['population_id' => $population->id]
        ));

        return redirect()->route('birth_records.index')->with('success', 'Birth record updated.');
    }

    public function destroy(string $id)
{
    // Use a DB transaction to ensure atomicity
    DB::transaction(function () use ($id) {
        // Find the birth record; fail if not found
        $birth = BirthRecord::findOrFail($id);
        
        // Delete any related death record(s) first
        // Using `->where(...)` and `->delete()` is better if there may be more than one
        DeathRecord::where('birth_record_id', $id)->delete();
        
        // Delete the birth record
        $birth->delete();
    });

    return redirect()->back()->with('success', 'Birth record and related death record(s) deleted.');
}

    public function downloadCertificate($id)
    {
        $record = BirthRecord::findOrFail($id);
        $pdf = Pdf::loadView('birth_records.certificate', compact('record'));
        return $pdf->download("BirthCertificate-{$record->certificate_number}.pdf");
    }

    public function getDistricts($provinceId)
    {
        return response()->json(District::where('province_id', $provinceId)->get());
    }

    public function getSectors($districtId)
    {
        return response()->json(Sector::where('district_id', $districtId)->get());
    }

    public function getCells($sectorId)
    {
        return response()->json(Cell::where('sector_id', $sectorId)->get());
    }

    public function getVillages($cellId)
    {
        return response()->json(Village::where('cell_id', $cellId)->get());
    }

     public function deleteAll()
    {
        BirthRecord::truncate(); // deletes all records

        return redirect()->back()->with('success', 'All Birth records have been deleted successfully.');
    }
}
