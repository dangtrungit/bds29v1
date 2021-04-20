<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_manager', function (Blueprint $table) {
            $table->id();
            //basic
            $table->string('link');

            $table->text('description')->nullable();
            $table->text('canonical')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->text('keywords')->nullable();
            // SEO opengraph
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_type')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('og_url')->nullable();
            //  SEO Twiter
            $table->text('tw_card')->nullable();
            $table->text('tw_title')->nullable();
            $table->text('tw_description')->nullable();
            $table->text('tw_image')->nullable();
            $table->string('tw_site_name')->nullable();
            $table->string('tw_url')->nullable();
            // Json ld
            $table->json('ld_json')->nullable();
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
        Schema::dropIfExists('seo_manager');
    }
}