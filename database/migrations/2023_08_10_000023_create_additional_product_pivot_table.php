<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('additional_product', function (Blueprint $table) {
            $table->unsignedBigInteger('additional_id');
            $table->foreign('additional_id', 'additional_id_fk_8857123')->references('id')->on('additionals')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_8857123')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
