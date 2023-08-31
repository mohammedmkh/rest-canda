<?php

namespace App\Models;

use App\Models\User;

use App\Models\Resturant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCart extends Model
{
    use  HasFactory;

    /* public function resturant() {

        return $this->belongsTo(Resturant::class, 'resturant_id');
    } */
    /* public function user() {

        return $this->belongsTo(User::class,'user_id');
    } */
}
