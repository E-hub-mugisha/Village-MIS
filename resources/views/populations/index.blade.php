@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Population Data</h1>

    <!-- Button to trigger modal for Add -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPopulationModal">
        Add Population Record
    </button>

    <!-- Population Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Cell</th>
                <th>Village</th>
                <th>Year</th>
                <th>Total</th>
                <th>Male</th>
                <th>Female</th>
                <th>Age 0-14</th>
                <th>Age 15-64</th>
                <th>Age 65+</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($populations as $population)
            <tr>
                <td>{{ $population->province?->name ?? '-' }}</td>
                <td>{{ $population->district?->name ?? '-' }}</td>
                <td>{{ $population->sector?->name ?? '-' }}</td>
                <td>{{ $population->cell?->name ?? '-' }}</td>
                <td>{{ $population->village?->name ?? '-' }}</td>
                <td>{{ $population->year }}</td>
                <td>{{ $population->total_population }}</td>
                <td>{{ $population->male_population }}</td>
                <td>{{ $population->female_population }}</td>
                <td>{{ $population->age_0_14 }}</td>
                <td>{{ $population->age_15_64 }}</td>
                <td>{{ $population->age_65_plus }}</td>
                <td>
                    <button 
                        class="btn btn-sm btn-warning edit-btn" 
                        data-id="{{ $population->id }}" 
                        data-province="{{ $population->province_id }}" 
                        data-district="{{ $population->district_id }}"
                        data-sector="{{ $population->sector_id }}"
                        data-cell="{{ $population->cell_id }}"
                        data-village="{{ $population->village_id }}"
                        data-year="{{ $population->year }}"
                        data-total="{{ $population->total_population }}"
                        data-male="{{ $population->male_population }}"
                        data-female="{{ $population->female_population }}"
                        data-age014="{{ $population->age_0_14 }}"
                        data-age1564="{{ $population->age_15_64 }}"
                        data-age65plus="{{ $population->age_65_plus }}"
                        data-bs-toggle="modal" data-bs-target="#editPopulationModal">
                        Edit
                    </button>
                    <form method="POST" action="{{ route('populations.destroy', $population->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Population Modal -->
    <div class="modal fade" id="addPopulationModal" tabindex="-1" aria-labelledby="addPopulationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('populations.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Population Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('populations.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Edit Population Modal -->
    <div class="modal fade" id="editPopulationModal" tabindex="-1" aria-labelledby="editPopulationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form method="POST" id="editPopulationForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Population Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('populations.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    const form = document.getElementById('editPopulationForm');

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');

            // Set form action
            form.action = '/populations/' + id;

            // Populate form fields
            ['province', 'district', 'sector', 'cell', 'village', 'year', 'total', 'male', 'female', 'age014', 'age1564', 'age65plus'].forEach(field => {
                let value = button.getAttribute('data-' + field);
                let input = form.querySelector('[name="' + field + '"]');
                if(input) input.value = value;
            });
        });
    });
});
</script>
@endsection
