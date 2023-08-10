<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('default')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
