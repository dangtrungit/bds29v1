<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realty_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); //tiêu đề
            $table->string('slug');
            $table->unsignedTinyInteger('type'); // Tin mua, tin bán, tin cho thuê, tin thuê
            $table->unsignedBigInteger('price')->default(0); //Thỏa thuận
            $table->unsignedBigInteger('price_type')->default(0); // Thỏa thuận
            $table->unsignedBigInteger('deposit_price')->nullable(); //Giá cọc
            $table->unsignedBigInteger('realty_id'); //Giá cọc
            $table->string('contact_name')->nullable(); // Tên liên hệ
            $table->text('contact_address')->nullable(); // Địa chỉ
            $table->string('contact_phone_number')->nullable(); // Dien thoai
            $table->string('contact_email')->nullable();
            $table->string('rank')->nullable();
            $table->dateTimeTz('open_at')->nullable();
            $table->dateTimeTz('close_at')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('realty_posts');
    }
}