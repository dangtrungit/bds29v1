<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\Realty;
use App\Models\RealtyPost;
use App\Services\SlugService;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RealtySeeder extends Seeder
{

    public function __construct(SlugService $slug_service)
    {
        $this->slug_service = $slug_service;
        $this->slug_service->setModel(RealtyPost::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $street = [
            "Trần Hưng Đạo",
            'Đại lộ Lê Lợi',
            'Nguyễn Chí Thanh',
            'Quảng Thành',
            'Quốc lộ 1',
            'Quốc lộ 45',
            'Quốc lộ 217',
            "Nguyễn Trãi",
            "Lê Hoàn",
        ];

        $images = [
            '/images/bds-01.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-02.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-03.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-04.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-05.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-07.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-08.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-09.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
            '/images/bds-10.jpg,/images/bds-04.jpg,/images/bds-02.jpg,/images/bds-05.jpg,/images/bds-03.jpg',
        ];

        $max_record = 200;
        $communes = Commune::with('district', 'district.province')->whereBetween('code', [25456, 25738])->get();
        $faker = Factory::create('vi_VN');
        for ($i = 0; $i < $max_record; $i++) {
            $commune = $communes->random();
            $new_realty = Realty::create([
                'type' => $realty_type = rand(1, 10),
                'province_code' => $commune->district->province->code,
                'district_code' => $commune->district->code,
                'commune_code' => $commune->code,
                'street' => $address = "Ngõ " . rand(30, 100) . ", đường " . $street[array_rand($street, 1)],
                'direction' => rand(1, 8),
                'apartment_number' => $apartment_number = rand(40, 200),
                'number_of_bed_rooms' => rand(3, 15),
                'number_of_bath_rooms' => rand(3, 15),
                'number_of_floors' => rand(1, 10),
                'area' => rand(40, 1000),
                'description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
                'house_image' => $images[array_rand($images, 1)],
                'house_design_image' => '/images/bds-01-min.jpg,/images/bds-04.jpg',
                'full_address' => 'Số nhà' . $apartment_number . ", " . $address . ", " . $commune->path_with_type,
            ]);
            // store realty post
            $new_realty_post = RealtyPost::create([
                'type' => $type = rand(1, 2),
                'title' => $title = config('constant.realty_post_type.' . $type)['name'] . " " . config('constant.realty_type.' . $realty_type)['name'] . " tại " . $commune->path_with_type,
                'slug' => $this->slug_service->getSlug($title),
                'price' => rand(1000000, 30000000000),
                'description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
                'realty_id' => $new_realty->id,
                'contact_name' => $faker->name,
                'contact_address' => $faker->address,
                'contact_phone_number' => $faker->phoneNumber,
                'contact_email' => $faker->email,
                'rank' => rand(1, 4),
                'open_at' => '2020-11-18 09:54:39',
                'close_at' => '2020-12-18 09:54:39',
                'created_by' => rand(1, 10),
            ]);
        }
    }
}