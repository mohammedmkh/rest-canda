<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobileatempt extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'mobile',
    'code',
    'attempt',
    'user_id',
    'updated_at',
    'deleted_at',
    ];
}
