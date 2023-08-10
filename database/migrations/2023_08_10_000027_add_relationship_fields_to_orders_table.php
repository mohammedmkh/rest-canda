<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8857204')->references('id')->on('users');
            $table->unsignedBigInteger('resturant_id')->nullable();
            $table->foreign('resturant_id', 'resturant_fk_8857210')->references('id')->on('resturants');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_8857214')->references('id')->on('payment_methods');
        });
    }
}
