<div class="row">
    <div class="col-md-4 mb-3">
        <label for="province" class="form-label">Province</label>
        <select name="province" class="form-select" required>
            <option value="">Select Province</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" 
                    {{ old('province', $population->province_id ?? '') == $province->id ? 'selected' : '' }}>
                    {{ $province->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="district" class="form-label">District</label>
        <select name="district" class="form-select" required>
            <option value="">Select District</option>
            @foreach($districts as $district)
                <option value="{{ $district->id }}" 
                    {{ old('district', $population->district_id ?? '') == $district->id ? 'selected' : '' }}>
                    {{ $district->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="sector" class="form-label">Sector</label>
        <select name="sector" class="form-select" required>
            <option value="">Select Sector</option>
            @foreach($sectors as $sector)
                <option value="{{ $sector->id }}" 
                    {{ old('sector', $population->sector_id ?? '') == $sector->id ? 'selected' : '' }}>
                    {{ $sector->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="cell" class="form-label">Cell</label>
        <select name="cell" class="form-select" required>
            <option value="">Select Cell</option>
            @foreach($cells as $cell)
                <option value="{{ $cell->id }}" 
                    {{ old('cell', $population->cell_id ?? '') == $cell->id ? 'selected' : '' }}>
                    {{ $cell->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="village" class="form-label">Village</label>
        <select name="village" class="form-select" required>
            <option value="">Select Village</option>
            @foreach($villages as $village)
                <option value="{{ $village->id }}" 
                    {{ old('village', $population->village_id ?? '') == $village->id ? 'selected' : '' }}>
                    {{ $village->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" name="year" class="form-control" min="1900" max="{{ date('Y') }}" 
               value="{{ old('year', $population->year ?? date('Y')) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="total" class="form-label">Total Population</label>
        <input type="number" name="total" class="form-control" value="{{ old('total', $population->total_population ?? 0) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="male" class="form-label">Male Population</label>
        <input type="number" name="male" class="form-control" value="{{ old('male', $population->male_population ?? 0) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="female" class="form-label">Female Population</label>
        <input type="number" name="female" class="form-control" value="{{ old('female', $population->female_population ?? 0) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="age014" class="form-label">Age 0-14</label>
        <input type="number" name="age014" class="form-control" value="{{ old('age014', $population->age_0_14 ?? 0) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="age1564" class="form-label">Age 15-64</label>
        <input type="number" name="age1564" class="form-control" value="{{ old('age1564', $population->age_15_64 ?? 0) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="age65plus" class="form-label">Age 65+</label>
        <input type="number" name="age65plus" class="form-control" value="{{ old('age65plus', $population->age_65_plus ?? 0) }}" required>
    </div>
</div>
