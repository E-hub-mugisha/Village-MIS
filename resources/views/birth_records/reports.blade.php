@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Birth Reports & Statistics</h4>

    <form method="POST" action="{{ route('birth.reports.generate') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label>From Date</label>
                <input type="date" name="from_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label>To Date</label>
                <input type="date" name="to_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Generate Report</button>
    </form>
</div>
@endsection
