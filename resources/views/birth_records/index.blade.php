@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Birth Records Management</h2>

    <!-- 🔎 Filter and Search -->
    <div class="row mb-4">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search by name..." id="search-name">
        </div>
        <div class="col-md-3">
            <select class="form-control" id="filter-village">
                <option value="">All Villages</option>

            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="filter-gender">
                <option value="">All Genders</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="month" class="form-control" id="filter-month">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary btn-block" id="filter-btn">Filter</button>
        </div>
    </div>

    <!-- 🟦 Add New Record Button -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addBirthModal">Add New Birth Record</button>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#birthReportModal">
        Generate Birth Reports & Statistics
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
                    ⚠️ This will permanently delete <strong>ALL birth records</strong>.
                    Are you sure you want to continue?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('birth_records.deleteAll') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="birthReportModal" tabindex="-1" aria-labelledby="birthReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('birth.reports.generate') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="birthReportModalLabel">Birth Reports & Statistics</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="from_date" class="form-label">From Date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="to_date" class="form-label">To Date</label>
                                <input type="date" name="to_date" id="to_date" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">All</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- 📄 Birth Records Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Village</th>
                <th>Certificate #</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($birthRecords as $record)
            <tr>
                <td>{{ $record->full_name }}</td>
                <td>{{ $record->gender }}</td>
                <td>{{ $record->date_of_birth }}</td>
                <td>{{ optional($record->village)->name ?? 'N/A' }}</td>
                <td>{{ $record->certificate_number }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $record->id }}">Edit</button>
                    <a href="{{ route('birth_records.certificate', $record->id) }}" class="btn btn-sm btn-secondary" target="_blank">View PDF</a>
                    <!-- Delete Button triggers modal -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $record->id }}">
                        Delete
                    </button>
                    <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $record->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteModalLabel{{ $record->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the birth record for <strong>{{ $record->full_name }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('birth_records.destroy', $record->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </td>
            </tr>

            <!-- ✏️ Edit Modal -->
            <div class="modal fade" id="editModal{{ $record->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $record->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{ route('birth_records.update', $record->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Birth Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body row">
                                @include('birth_records.form', ['birthRecord' => $record])
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- 🟦 Add Modal -->
<div class="modal fade" id="addBirthModal" tabindex="-1" aria-labelledby="addBirthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Birth Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row">
                    @include('birth_records.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Record</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        
    </div>
</div>
@endsection