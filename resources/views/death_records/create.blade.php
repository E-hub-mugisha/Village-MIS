@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Register Death Record</h3>

    <!-- Birth Record Details -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Birth Record Details
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <p><strong>Full Name:</strong> {{ $birthRecord->full_name }}</p>
                <p><strong>Gender:</strong> {{ $birthRecord->gender }}</p>
                <p><strong>Date of Birth:</strong> {{ date('d M, Y', strtotime($birthRecord->date_of_birth)) }}</p>
                <p><strong>Place of Birth:</strong>
                    {{ optional($birthRecord->population?->village)->name }},
                    {{ optional($birthRecord->population?->village?->cell?->sector)->name }},
                    {{ optional($birthRecord->population?->village?->cell?->sector?->district)->name }}
                </p>
            </div>
            <div class="col-md-6">
                <p><strong>Father's Name:</strong> {{ $birthRecord->father_name }}</p>
                <p><strong>Mother's Name:</strong> {{ $birthRecord->mother_name }}</p>
                <p><strong>Village:</strong> {{ $birthRecord->population?->village?->name ?? '-' }}</p>
                <p><strong>Registrar:</strong> {{ $birthRecord->user->name ?? '-' }}</p>
            </div>
        </div>
    </div>

    <!-- Trigger Button -->
    <button type="button" class="btn btn-danger mb-4" data-bs-toggle="modal" data-bs-target="#deathRecordModal">
        Add Death Record
    </button>

    <!-- Death Record Modal -->
    <div class="modal fade" id="deathRecordModal" tabindex="-1" aria-labelledby="deathRecordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('death_records.store') }}">
                    @csrf
                    <input type="hidden" name="birth_record_id" value="{{ $birthRecord->id }}">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deathRecordModalLabel">Death Record for {{ $birthRecord->full_name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="date_of_death" class="form-label">Date of Death</label>
                                <input type="date" name="date_of_death" id="date_of_death" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="age" class="form-label">Age at Death</label>
                                <input type="number" name="age" id="age" class="form-control" placeholder="Age in years">
                            </div>

                            <div class="col-md-6">
                                <label for="cause_of_death" class="form-label">Cause of Death</label>
                                <input type="text" name="cause_of_death" id="cause_of_death" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="place_of_death" class="form-label">Place of Death</label>
                                <input type="text" name="place_of_death" id="place_of_death" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="informant_name" class="form-label">Informant Name</label>
                                <input type="text" name="informant_name" id="informant_name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="registration_date" class="form-label">Registration Date</label>
                                <input type="date" name="registration_date" id="registration_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Save Death Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript to Auto-Calculate Age -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dob = new Date("{{ $birthRecord->date_of_birth }}");
        const dateOfDeathInput = document.getElementById('date_of_death');
        const ageInput = document.getElementById('age');

        if (dateOfDeathInput && ageInput) {
            dateOfDeathInput.addEventListener('change', function () {
                const dod = new Date(this.value);
                if (dod && dob && !isNaN(dod) && !isNaN(dob)) {
                    let age = dod.getFullYear() - dob.getFullYear();
                    const m = dod.getMonth() - dob.getMonth();
                    if (m < 0 || (m === 0 && dod.getDate() < dob.getDate())) {
                        age--;
                    }
                    ageInput.value = age > 0 ? age : 0;
                }
            });
        }
    });
</script>
@endsection
