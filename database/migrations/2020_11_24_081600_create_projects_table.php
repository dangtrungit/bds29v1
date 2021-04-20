<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('investor'); // chủ dự án
            $table->string('avatar');

            $table->string('full_address');

            $table->string('street')->nullable();
            $table->string('google_map_lat')->nullable();
            $table->string('google_map_lng')->nullable(); // địa chỉ gg map
            $table->unsignedBigInteger('province_code')->nullable(); // Tỉnh
            $table->unsignedBigInteger('district_code')->nullable(); // huyện
            $table->unsignedBigInteger('commune_code')->nullable(); // xã

            $table->longText('location_description')->nullable();

            $table->unsignedInteger('site_area')->nullable(); // Tổng diện tích
            $table->unsignedInteger('construction_area'); // Diện tích xây dựng

            $table->unsignedTinyInteger('project_type'); // Loại dự án

            $table->dateTimeTz('start_time'); //Thời gian khởi công
            $table->dateTimeTz('launch_time'); // Thời gian hoạt động
            $table->unsignedTinyInteger('status');

            $table->longText('description');
            $table->longText('promotion_term'); // Chính sách ưu đãi

            $table->text('overview_image')->nullable(); // ảnh dự án
            $table->text('overall_diagram')->nullable(); // Ảnh sơ đồ tổng thể
            $table->text('gallery')->nullable(); // Sưu tập ảnh

            $table->timestamps();
        });

        Schema::create('grounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('project_id');
            $table->text('images')->nullable();

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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('grounds');
    }
}