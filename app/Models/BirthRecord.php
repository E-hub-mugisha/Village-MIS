<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirthRecord extends Model
{
    //
    protected $fillable = [
        'full_name',
        'gender',
        'date_of_birth',
        'village',
        'certificate_number',
        'place_of_birth',
        'father_name',
        'mother_name',
        'informant_name',
        'registration_date',
        'user_id', // registered by
        'population_id',
        'village_id', // added for village association
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function population()
    {
        return $this->belongsTo(Population::class);
    }

}
