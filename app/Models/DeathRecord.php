<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeathRecord extends Model
{
    protected $fillable = [
    'full_name', 'date_of_death', 'gender', 'age', 'cause_of_death',
    'place_of_death', 'village', 'informant_name', 'registration_date',
    'certificate_number', 'user_id', // registered by
    'village_id', // added for village association
    'birth_record_id', // added for birth record association
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function birthRecord()
    {
        return $this->belongsTo(BirthRecord::class);
    }
}
