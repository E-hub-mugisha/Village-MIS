@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h4 class="mb-4">Report Results</h4>

    <div class="mb-4">
        <h5>
            Total Records: 
            <span class="badge bg-primary">{{ $data->count() }}</span>
        </h5>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    Monthly Trends
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($monthlyStats as $month)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ \Carbon\Carbon::create()->month($month->month)->format('F') }}
                            <span class="badge bg-secondary rounded-pill">{{ $month->total }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-6 mt-3 mt-md-0">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    Gender Distribution
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($genderStats as $gender)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $gender->gender }}
                            <span class="badge bg-secondary rounded-pill">{{ $gender->total }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            Detailed Records
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Village</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $birth)
                        <tr>
                            <td>{{ $birth->full_name }}</td>
                            <td>
                                <span class="badge {{ $birth->gender == 'Male' ? 'bg-primary' : 'bg-danger' }}">
                                    {{ $birth->gender }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($birth->date_of_birth)->format('d M, Y') }}</td>
                            <td>{{ $birth->village }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
