<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADS extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
    'title',
    'url',
    'type',
    ];
}
