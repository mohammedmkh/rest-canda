<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
    'name',
    'country_id',
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    function country() {
        return $this->belongsTo(Country::class);
    }
}
