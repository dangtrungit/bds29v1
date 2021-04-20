<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realty', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->nullable(); // Chung cư, nhà riêng, đất nền

            $table->unsignedMediumInteger('year_built')->nullable(); // năm xây dựng
            $table->unsignedBigInteger('province_code')->nullable(); // Tỉnh
            $table->unsignedBigInteger('district_code')->nullable(); // huyện
            $table->unsignedBigInteger('commune_code')->nullable(); // xã
            $table->unsignedBigInteger('project_id')->nullable(); // Giá thuê
            $table->string('street')->nullable(); // đường
            $table->string('apartment_number')->nullable(); // số nhà
            $table->text('full_address')->nullable(); // số nhà
            $table->unsignedTinyInteger('front_size')->nullable(); // Mặt tiền
            $table->text('legal_information')->nullable(); //Thông tin pháp lý (Đã có sổ đỏ or chưa...)

            $table->string('google_map_lat')->nullable();
            $table->string('google_map_lng')->nullable(); // địa chỉ gg map
            $table->unsignedTinyInteger('direction')->nullable(); //hướng

            $table->unsignedSmallInteger('number_of_bed_rooms')->nullable(); // số phòng ngủ
            $table->unsignedSmallInteger('number_of_bath_rooms')->nullable(); // số nhà tắm
            $table->unsignedSmallInteger('number_of_floors')->nullable(); // số tầng

            $table->unsignedBigInteger('area'); // Diện tích (m2)

            $table->text('advantage')->nullable(); // Tiện ích, ngăn cách bởi dấu |
            $table->longText('description')->nullable(); // Mô tả thông tin mảnh đất

            $table->text('house_image')->nullable(); //Ảnh nhà
            $table->text('house_design_image')->nullable(); // Ảnh bản design

            $table->timestamps();
        });

        Schema::create('realty_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('realty_has_property_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realty_id');
            $table->unsignedBigInteger('realty_property_id');
            $table->string('value')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realty_has_property_values');
        Schema::dropIfExists('realty_properties');
        Schema::dropIfExists('realty');
    }
}