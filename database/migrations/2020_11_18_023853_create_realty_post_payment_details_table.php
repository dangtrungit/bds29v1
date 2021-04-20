<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtyPostPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realty_post_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realty_post_id');
            $table->unsignedTinyInteger('post_rank');
            $table->unsignedInteger('post_duration');
            $table->dateTimeTz('post_open_at');
            $table->dateTimeTz('post_close_at');
            $table->float('total', 11, 0);
            $table->unsignedTinyInteger('status');
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
        Schema::dropIfExists('realty_post_payment_details');
    }
}