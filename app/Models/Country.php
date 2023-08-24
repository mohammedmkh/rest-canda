<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'created_at',
    'updated_at',
    'deleted_at',
    ];
    
    function city() {
        return $this->hasToMany(City::class);
    }
}
