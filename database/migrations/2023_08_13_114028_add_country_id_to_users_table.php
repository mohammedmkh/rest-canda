<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('country_id')->unsigned()->default(1);

            $table->foreign('country_id')->references('id')->on('countries');
            /* $table->unsignedBigInteger('country_id')->after('email')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete(); */
            /* $table->unsignedBigInteger('country_id')->after('email')->default(1);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete; */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
