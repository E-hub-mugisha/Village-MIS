@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard & Statistics</h2>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-3">
                <h5>Births This Month</h5>
                <p>{{ $monthlyBirths }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3">
                <h5>Deaths This Month</h5>
                <p>{{ $monthlyDeaths }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3">
                <h5>Births This Year</h5>
                <p>{{ $yearlyBirths }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3">
                <h5>Deaths This Year</h5>
                <p>{{ $yearlyDeaths }}</p>
            </div>
        </div>
    </div>

    <hr>

    <canvas id="genderChart"></canvas>
    <canvas id="ageGroupChart" class="mt-4"></canvas>
    <canvas id="causeChart" class="mt-4"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const genderChart = new Chart(document.getElementById('genderChart'), {
        type: 'bar',
        data: {
            labels: ['Male Births', 'Female Births', 'Male Deaths', 'Female Deaths'],
            datasets: [{
                label: 'Count',
                data: [
                    {{ $birthsByGender->where('gender', 'Male')->first()->total ?? 0 }},
                    {{ $birthsByGender->where('gender', 'Female')->first()->total ?? 0 }},
                    {{ $deathsByGender->where('gender', 'Male')->first()->total ?? 0 }},
                    {{ $deathsByGender->where('gender', 'Female')->first()->total ?? 0 }}
                ],
                backgroundColor: ['#007bff', '#ff6384', '#6c757d', '#ffc107']
            }]
        }
    });

    const ageGroupChart = new Chart(document.getElementById('ageGroupChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($ageGroups->pluck('age_group')) !!},
            datasets: [{
                label: 'Age Groups',
                data: {!! json_encode($ageGroups->pluck('total')) !!},
                backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545', '#6f42c1']
            }]
        }
    });

    const causeChart = new Chart(document.getElementById('causeChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($deathCauses->pluck('cause_of_death')) !!},
            datasets: [{
                label: 'Causes',
                data: {!! json_encode($deathCauses->pluck('total')) !!},
                backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8']
            }]
        }
    });
</script>
@endsection
