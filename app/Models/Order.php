<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const RECEIPT_TYPE_SELECT = [
        'delivery' => 'delivery',
        'pickup'   => 'pickup',
    ];

    public const ORDER_STATUS_SELECT = [
        'pending'     => 'pending',
        'inprogress'  => 'in progress',
        'ready'       => 'ready',
        'on delivery' => 'on delivery',
        'done'        => 'Done',
        'canceled'    => 'canceled',
    ];

    protected $fillable = [
        'total',
        'user_id',
        'order_status',
        'resturant_id',
        'delivery_price',
        'receipt_type',
        'tax',
        'payment_method_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orderOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class, 'resturant_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
