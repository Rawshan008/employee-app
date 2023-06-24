<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = ['first_name', 'last_name', 'middle_name', 'department_id', 'country_id', 'city_id', 'state_id', 'zip_code', 'birth_date', 'date_hired'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }
}
