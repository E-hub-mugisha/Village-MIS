<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //
    PUBLIC $fillable = [
        'name',
        'district_id', // assuming villages belong to a district
    ];
    
    public function birthRecords()
    {
        return $this->hasMany(BirthRecord::class);
    }
}
