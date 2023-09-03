<?php

namespace App\Models;

use App\Models\User;

use App\Models\Product;
use App\Models\Resturant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCart extends Model
{
    use  HasFactory;

    protected $fillable = [
        'amount',
        'total_price',
        'user_id ',
        'product_id ',
        'resturant_id ',
        'created_at',
        'updated_at',

    ];

    public function resturant() {

        return $this->belongsTo(Resturant::class, 'resturant_id');
    }
    /* public function user() {

        return $this->belongsTo(User::class,'user_id');
    } */

    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id');
    }
}
