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
<div x-data="locationForm()" class="row" x-init="init()">
    {{-- Province --}}
    <div class="mb-3 col-md-6">
        <label for="province">Province</label>
        <select x-model="province" @change="fetchDistricts" class="form-control" name="province_id" required>
            <option value="">-- Select Province --</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- District --}}
    <div class="mb-3 col-md-6">
        <label for="district">District</label>
        <select x-model="district" @change="fetchSectors" class="form-control" name="district_id" required>
            <option value="">-- Select District --</option>
            <template x-for="item in districts" :key="item.id">
                <option :value="item.id" x-text="item.name"></option>
            </template>
        </select>
    </div>

    {{-- Sector --}}
    <div class="mb-3 col-md-6">
        <label for="sector">Sector</label>
        <select x-model="sector" @change="fetchCells" class="form-control" name="sector_id" required>
            <option value="">-- Select Sector --</option>
            <template x-for="item in sectors" :key="item.id">
                <option :value="item.id" x-text="item.name"></option>
            </template>
        </select>
    </div>

    {{-- Cell --}}
    <div class="mb-3 col-md-6">
        <label for="cell">Cell</label>
        <select x-model="cell" @change="fetchVillages" class="form-control" name="cell_id" required>
            <option value="">-- Select Cell --</option>
            <template x-for="item in cells" :key="item.id">
                <option :value="item.id" x-text="item.name"></option>
            </template>
        </select>
    </div>

    {{-- Village --}}
    <div class="mb-3 col-md-6">
        <label for="village">Village</label>
        <select x-model="village" class="form-control" name="village_id" required>
            <option value="">-- Select Village --</option>
            <template x-for="item in villages" :key="item.id">
                <option :value="item.id" x-text="item.name"></option>
            </template>
        </select>
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

<script>
function locationForm() {
    return {
        // Initial values (set from Blade if editing)
        province: '{{ old('province_id', $birthRecord->province_id ?? '') }}',
        district: '{{ old('district_id', $birthRecord->district_id ?? '') }}',
        sector: '{{ old('sector_id', $birthRecord->sector_id ?? '') }}',
        cell: '{{ old('cell_id', $birthRecord->cell_id ?? '') }}',
        village: '{{ old('village_id', $birthRecord->village_id ?? '') }}',

        // Data arrays
        districts: [],
        sectors: [],
        cells: [],
        villages: [],

        async init() {
            if (this.province) {
                await this.fetchDistricts();
                if (this.district) {
                    await this.fetchSectors();
                    if (this.sector) {
                        await this.fetchCells();
                        if (this.cell) {
                            await this.fetchVillages();
                        }
                    }
                }
            }
        },

        async fetchDistricts() {
            this.districts = [];
            this.sectors = [];
            this.cells = [];
            this.villages = [];
            if (!this.province) return;
            const res = await fetch(`/get-districts/${this.province}`);
            this.districts = await res.json();
        },

        async fetchSectors() {
            this.sectors = [];
            this.cells = [];
            this.villages = [];
            if (!this.district) return;
            const res = await fetch(`/get-sectors/${this.district}`);
            this.sectors = await res.json();
        },

        async fetchCells() {
            this.cells = [];
            this.villages = [];
            if (!this.sector) return;
            const res = await fetch(`/get-cells/${this.sector}`);
            this.cells = await res.json();
        },

        async fetchVillages() {
            this.villages = [];
            if (!this.cell) return;
            const res = await fetch(`/get-villages/${this.cell}`);
            this.villages = await res.json();
        }
    };
}
</script>
