@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Report Results</h4>

    <h5>Total Records: {{ $data->count() }}</h5>

    <h6>Monthly Trends</h6>
    <ul>
        @foreach ($monthlyStats as $month)
            <li>{{ \Carbon\Carbon::create()->month($month->month)->format('F') }}: {{ $month->total }}</li>
        @endforeach
    </ul>

    <h6>Gender Distribution</h6>
    <ul>
        @foreach ($genderStats as $gender)
            <li>{{ $gender->gender }}: {{ $gender->total }}</li>
        @endforeach
    </ul>

    <h6>Cause of Death Statistics</h6>
    <ul>
        @foreach ($causeStats as $cause)
            <li>{{ $cause->cause_of_death }}: {{ $cause->total }}</li>
        @endforeach
    </ul>

    <h6>Detailed Records</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Cause</th>
                <th>Date</th>
                <th>Village</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $death)
                <tr>
                    <td>{{ $death->full_name }}</td>
                    <td>{{ $death->gender }}</td>
                    <td>{{ $death->age }}</td>
                    <td>{{ $death->cause_of_death }}</td>
                    <td>{{ $death->date_of_death }}</td>
                    <td>{{ $death->village }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
