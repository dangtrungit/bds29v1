<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->float('area', 10, 0)->nullable(); //km2
            $table->text('images')->nullable();
            $table->string('avatar')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->timestamps();
        });

        Schema::create('district_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->float('area', 10, 0)->nullable(); //km2
            $table->text('images')->nullable();
            $table->string('avatar')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->timestamps();
        });

        Schema::create('commune_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commune_id');
            $table->float('area', 10, 0)->nullable(); //km2
            $table->text('images')->nullable();
            $table->string('avatar')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('province_details');
        Schema::dropIfExists('district_details');
        Schema::dropIfExists('commune_details');
    }
}