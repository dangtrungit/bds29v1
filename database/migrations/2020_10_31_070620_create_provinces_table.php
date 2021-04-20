<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('name_with_type');
            $table->unsignedBigInteger('code')->unique();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('slug');
            $table->string('name_with_type');
            $table->string('path');
            $table->string('path_with_type');
            $table->unsignedBigInteger('code')->unique();
            $table->unsignedBigInteger('parent_code');
        });

        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('slug');
            $table->string('name_with_type');
            $table->string('path');
            $table->string('path_with_type');
            $table->unsignedBigInteger('code')->unique();
            $table->unsignedBigInteger('parent_code');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('communes');
    }
}