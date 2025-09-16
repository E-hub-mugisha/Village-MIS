<?php

namespace App\Http\Controllers;

use App\Models\BirthRecord;
use App\Models\DeathRecord;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DeathRecordController extends Controller
{
    public function index()
    {
        $deathRecords = DeathRecord::with('birthRecord')->get();
        return view('death_records.index', compact('deathRecords'));
    }

    public function searchAndRedirect(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
        ]);

        $birthRecord = BirthRecord::where('full_name', 'like', "%{$request->full_name}%")
            ->where('father_name', 'like', "%{$request->father_name}%")
            ->where('mother_name', 'like', "%{$request->mother_name}%")
            ->first();

        if (!$birthRecord) {
            return redirect()->route('death_records.index')
                ->with('error', 'No matching birth record found. Please try again.');
        }

        return redirect()->route('death_records.create', $birthRecord->id);
    }

    public function create(Request $request, $birth_record_id)
    {
        $birthRecord = BirthRecord::findOrFail($birth_record_id);
        return view('death_records.create', compact('birthRecord'));
    }

    // Store new record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_death' => 'required|date',
            'gender' => 'required|string',
            'age' => 'nullable|integer',
            'cause_of_death' => 'required|string',
            'place_of_death' => 'required|string',
            'village' => 'required|string',
            'informant_name' => 'required|string',
            'registration_date' => 'required|date',
            'birth_record_id' => 'required',
        ]);

        // Generate unique certificate number
        $certificateNumber = 'DRC-' . strtoupper(uniqid());

        // 1. Create Death Record
        $deathRecord = DeathRecord::create([
            'birth_record_id' => $request->birth_record_id,
            'full_name' => $request->full_name,
            'date_of_death' => $request->date_of_death,
            'gender' => $request->gender,
            'age' => $request->age,
            'cause_of_death' => $request->cause_of_death,
            'place_of_death' => $request->place_of_death,
            'village' => $request->village,
            'informant_name' => $request->informant_name,
            'registration_date' => $request->registration_date,
            'certificate_number' => $certificateNumber,
            'user_id' => Auth::id(),
        ]);

        // 2. Find matching Birth Record
        $birthRecord = BirthRecord::where('id', $request->birth_record_id)
            ->first();

        if ($birthRecord) {
            // Mark as died
            $birthRecord->update(['status' => 'died']);

            // 3. Update Population Table
            $population = Population::where('village_id', $birthRecord->village_id)
                ->where('year', date('Y', strtotime($request->date_of_death)))
                ->first();

            if ($population) {
                $population->increment('total_deaths', 1);
                $population->decrement('current_population', 1);
            }
        }

        return redirect()->route('death_records.index')->with('success', 'Death record added successfully and population updated.');
    }

    // Show single record (for modal view)
    public function show($id)
    {
        $record = DeathRecord::findOrFail($id);
        return response()->json($record);
    }

    // Update existing record
    public function update(Request $request, $id)
    {
        $record = DeathRecord::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_death' => 'required|date',
            'gender' => 'required|string',
            'age' => 'nullable|integer',
            'cause_of_death' => 'required|string',
            'place_of_death' => 'required|string',
            'village' => 'required|string',
            'informant_name' => 'required|string',
            'registration_date' => 'required|date',
        ]);

        $record->update([
            'full_name' => $request->full_name,
            'date_of_death' => $request->date_of_death,
            'gender' => $request->gender,
            'age' => $request->age,
            'cause_of_death' => $request->cause_of_death,
            'place_of_death' => $request->place_of_death,
            'village' => $request->village,
            'informant_name' => $request->informant_name,
            'registration_date' => $request->registration_date,
        ]);

        return redirect()->back()->with('success', 'Death record updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $record = DeathRecord::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Death record deleted successfully.');
    }

    public function certificate($id)
    {
        $record = DeathRecord::findOrFail($id);

        $pdf = Pdf::loadView('death_records.certificate', compact('record'));

        return $pdf->download('death_certificate_' . $record->certificate_number . '.pdf');
    }

    public function deleteAll()
    {
        DeathRecord::truncate(); // deletes all records

        return redirect()->back()->with('success', 'All death records have been deleted successfully.');
    }
}
