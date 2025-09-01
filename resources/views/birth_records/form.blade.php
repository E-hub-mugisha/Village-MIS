<form method="POST" action="{{ isset($birthRecord) ? route('birth_records.update', $birthRecord->id) : route('birth_records.store') }}">
    @csrf
    @if(isset($birthRecord))
        @method('PUT')
    @endif

    {{-- Personal Info --}}
    <div class="card mb-4">
        <div class="card-header">Personal Information</div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"
                           value="{{ old('full_name', $birthRecord->full_name ?? '') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="">-- Select Gender --</option>
                        <option value="Male" {{ old('gender', $birthRecord->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $birthRecord->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                           value="{{ old('date_of_birth', $birthRecord->date_of_birth ?? '') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="place_of_birth" class="form-label">Hospital or Clinic</label>
                    <input type="text" class="form-control" name="place_of_birth" id="place_of_birth"
                           value="{{ old('place_of_birth', $birthRecord->place_of_birth ?? '') }}" required>
                </div>
            </div>
        </div>
    </div>

    {{-- Location Info --}}
    <div class="card mb-4">
        <div class="card-header">Location Information</div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="province" class="form-label">Province</label>
                    <select id="province" class="form-control" name="province_id" required>
                        <option value="">Select Province</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}" {{ (old('province_id', $birthRecord->province_id ?? '') == $province->id) ? 'selected' : '' }}>{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="district" class="form-label">District</label>
                    <select id="district" class="form-control" name="district_id" required>
                        <option value="">Select District</option>
                        {{-- Options loaded dynamically --}}
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="sector" class="form-label">Sector</label>
                    <select id="sector" class="form-control" name="sector_id" required>
                        <option value="">Select Sector</option>
                        {{-- Options loaded dynamically --}}
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="cell" class="form-label">Cell</label>
                    <select id="cell" class="form-control" name="cell_id" required>
                        <option value="">Select Cell</option>
                        {{-- Options loaded dynamically --}}
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="village" class="form-label">Village</label>
                    <select id="village" class="form-control" name="village_id" required>
                        <option value="">Select Village</option>
                        {{-- Options loaded dynamically --}}
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Parent & Informant Info --}}
    <div class="card mb-4">
        <div class="card-header">Parent & Informant Information</div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="father_name" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="father_name" id="father_name"
                           value="{{ old('father_name', $birthRecord->father_name ?? '') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="mother_name" class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="mother_name" id="mother_name"
                           value="{{ old('mother_name', $birthRecord->mother_name ?? '') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="informant_name" class="form-label">Informant's Name</label>
                    <input type="text" class="form-control" name="informant_name" id="informant_name"
                           value="{{ old('informant_name', $birthRecord->informant_name ?? '') }}" required>
                </div>
            </div>
        </div>
    </div>

    {{-- Registration Info --}}
    <div class="card mb-4">
        <div class="card-header">Registration Information</div>
        <div class="card-body">
            <div class="mb-3 col-md-6">
                <label for="registration_date" class="form-label">Registration Date</label>
                <input type="date" class="form-control" name="registration_date" id="registration_date"
                       value="{{ old('registration_date', $birthRecord->registration_date ?? '') }}" required>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">{{ isset($birthRecord) ? 'Update' : 'Register' }} Birth</button>
    </div>
</form>

{{-- AJAX for dynamic dropdowns --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function loadDistricts(provinceId, selectedDistrictId = null) {
    $('#district').html('<option value="">Select District</option>');
    $('#sector').html('<option value="">Select Sector</option>');
    $('#cell').html('<option value="">Select Cell</option>');
    $('#village').html('<option value="">Select Village</option>');
    if (provinceId) {
        $.get(`/get-districts/${provinceId}`, function (data) {
            data.forEach(function (item) {
                let selected = (item.id == selectedDistrictId) ? 'selected' : '';
                $('#district').append(`<option value="${item.id}" ${selected}>${item.name}</option>`);
            });
        });
    }
}

function loadSectors(districtId, selectedSectorId = null) {
    $('#sector').html('<option value="">Select Sector</option>');
    $('#cell').html('<option value="">Select Cell</option>');
    $('#village').html('<option value="">Select Village</option>');
    if (districtId) {
        $.get(`/get-sectors/${districtId}`, function (data) {
            data.forEach(function (item) {
                let selected = (item.id == selectedSectorId) ? 'selected' : '';
                $('#sector').append(`<option value="${item.id}" ${selected}>${item.name}</option>`);
            });
        });
    }
}

function loadCells(sectorId, selectedCellId = null) {
    $('#cell').html('<option value="">Select Cell</option>');
    $('#village').html('<option value="">Select Village</option>');
    if (sectorId) {
        $.get(`/get-cells/${sectorId}`, function (data) {
            data.forEach(function (item) {
                let selected = (item.id == selectedCellId) ? 'selected' : '';
                $('#cell').append(`<option value="${item.id}" ${selected}>${item.name}</option>`);
            });
        });
    }
}

function loadVillages(cellId, selectedVillageId = null) {
    $('#village').html('<option value="">Select Village</option>');
    if (cellId) {
        $.get(`/get-villages/${cellId}`, function (data) {
            data.forEach(function (item) {
                let selected = (item.id == selectedVillageId) ? 'selected' : '';
                $('#village').append(`<option value="${item.id}" ${selected}>${item.name}</option>`);
            });
        });
    }
}

$(document).ready(function() {
    // Preload location selects if editing
    @if(isset($birthRecord))
        loadDistricts({{ $birthRecord->province_id }}, {{ $birthRecord->district_id }});
        loadSectors({{ $birthRecord->district_id }}, {{ $birthRecord->sector_id }});
        loadCells({{ $birthRecord->sector_id }}, {{ $birthRecord->cell_id }});
        loadVillages({{ $birthRecord->cell_id }}, {{ $birthRecord->village_id }});
    @endif

    $('#province').change(function () {
        loadDistricts($(this).val());
    });

    $('#district').change(function () {
        loadSectors($(this).val());
    });

    $('#sector').change(function () {
        loadCells($(this).val());
    });

    $('#cell').change(function () {
        loadVillages($(this).val());
    });
});
</script>
