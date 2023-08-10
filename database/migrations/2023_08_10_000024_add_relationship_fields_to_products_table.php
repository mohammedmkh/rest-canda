<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('resturant_id')->nullable();
            $table->foreign('resturant_id', 'resturant_fk_8856983')->references('id')->on('resturants');
        });
    }
}
