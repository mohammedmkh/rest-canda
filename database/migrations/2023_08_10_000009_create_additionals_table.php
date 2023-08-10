<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalsTable extends Migration
{
    public function up()
    {
        Schema::create('additionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2)->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
