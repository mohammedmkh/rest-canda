<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
