@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Death Records</h3>
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Trigger Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#searchModal">
        Add Death Record
    </button>

    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('death_records.searchAndRedirect') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="searchModalLabel">Search Birth Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Father's Name</label>
                            <input type="text" name="father_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Search & Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table showing all death records -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Date of Death</th>
                <th>Place of Death</th>
                <th>Informant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deathRecords as $record)
                <tr>
                    <td>{{ $record->birthRecord->full_name ?? 'N/A' }}</td>
                    <td>{{ $record->date_of_death }}</td>
                    <td>{{ $record->place_of_death }}</td>
                    <td>{{ $record->informant_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
