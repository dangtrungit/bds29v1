<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('status');
            $table->timestamps();

        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('href')->nullable();
            $table->string('icon')->nullable();
            $table->string('html')->nullable();
            $table->string('text')->nullable();
            $table->unsignedTinyInteger('sort')->nullable();
            $table->unsignedMediumInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('category')
                ->references('id')
                ->on('menu_categories')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('menu_has_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::create('menu_has_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_has_permissions');
        Schema::dropIfExists('menu_has_roles');
        Schema::dropIfExists('menu_categories');
        Schema::dropIfExists('menus');}
}