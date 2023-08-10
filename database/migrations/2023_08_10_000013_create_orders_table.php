<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total', 15, 2)->nullable();
            $table->string('order_status')->nullable();
            $table->decimal('delivery_price', 15, 2)->nullable();
            $table->string('receipt_type')->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
