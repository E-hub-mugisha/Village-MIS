<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'district_id',
        'sector_id',
        'cell_id',
        'village_id',
        'year',
        'total_population',
        'male_population',
        'female_population',
        'age_0_14',
        'age_15_64',
        'age_65_plus',
    ];

    // Define relationships to Location models (if you have these models)
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
