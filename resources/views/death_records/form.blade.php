<div class="mb-3">
    <label>Full Name</label>
    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $death->full_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Date of Death</label>
    <input type="date" name="date_of_death" class="form-control" value="{{ old('date_of_death', $death->date_of_death ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Gender</label>
    <select name="gender" class="form-control" required>
        <option value="">Choose...</option>
        <option value="Male" {{ (old('gender', $death->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ (old('gender', $death->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
    </select>
</div>

<div class="mb-3">
    <label>Age</label>
    <input type="number" name="age" class="form-control" value="{{ old('age', $death->age ?? '') }}">
</div>

<div class="mb-3">
    <label>Cause of Death</label>
    <input type="text" name="cause_of_death" class="form-control" value="{{ old('cause_of_death', $death->cause_of_death ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Place of Death</label>
    <input type="text" name="place_of_death" class="form-control" value="{{ old('place_of_death', $death->place_of_death ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Village</label>
    <input type="text" name="village" class="form-control" value="{{ old('village', $death->village ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Informant Name</label>
    <input type="text" name="informant_name" class="form-control" value="{{ old('informant_name', $death->informant_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Registration Date</label>
    <input type="date" name="registration_date" class="form-control" value="{{ old('registration_date', $death->registration_date ?? '') }}" required>
</div>

