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
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAllModal">
            Delete All Records
        </button>
    </div>

    <!-- Delete All Modal -->
    <div class="modal fade" id="deleteAllModal" tabindex="-1" aria-labelledby="deleteAllModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAllModalLabel">Confirm Delete All</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ⚠️ This will permanently delete <strong>ALL death records</strong>.
                    Are you sure you want to continue?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('death_records.deleteAll') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deathRecords as $record)
            <tr>
                <td>{{ $record->birthRecord->full_name ?? 'N/A' }}</td>
                <td>{{ $record->date_of_death }}</td>
                <td>{{ $record->place_of_death }}</td>
                <td>{{ $record->informant_name }}</td>
                <td>
                    <!-- Delete Button triggers modal -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $record->id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $record->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteModalLabel{{ $record->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the death record for <strong>{{ $record->full_name }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('death_records.destroy', $record->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        </tbody>
    </table>
</div>
@endsection