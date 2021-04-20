<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnpayBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnpay_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_bill_id');
            $table->string('merchant_bill_code');
            $table->string('bank_code');
            $table->string('card_type')->nullable();
            $table->string('response_code')->nullable();
            $table->string('order_info')->nullable();
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
        Schema::dropIfExists('vnpay_bills');
    }
}