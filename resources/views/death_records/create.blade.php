@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Register Death for {{ $birthRecord->full_name }}</h3>
    <p>Father: {{ $birthRecord->father_name }}</p>
    <p>Mother: {{ $birthRecord->mother_name }}</p>

    <!-- Trigger Button -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deathRecordModal">
        Add Death Record
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deathRecordModal" tabindex="-1" aria-labelledby="deathRecordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('death_records.store') }}">
                    @csrf
                    <input type="hidden" name="birth_record_id" value="{{ $birthRecord->id }}">
                    <input type="hidden" name="full_name" value="{{ $birthRecord->full_name }}">
                    <input type="hidden" name="gender" value="{{ $birthRecord->gender }}">
                    <input type="hidden" name="village" value="{{ $birthRecord->village }}">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="deathRecordModalLabel">Death Record for {{ $birthRecord->full_name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Date of Death</label>
                            <input type="date" name="date_of_death" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Age at Death</label>
                            <input type="number" name="age" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Cause of Death</label>
                            <input type="text" name="cause_of_death" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Place of Death</label>
                            <input type="text" name="place_of_death" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Informant Name</label>
                            <input type="text" name="informant_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Registration Date</label>
                            <input type="date" name="registration_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
