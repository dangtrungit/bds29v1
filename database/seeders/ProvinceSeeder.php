<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Str;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $strJsonFileContents = file_get_contents(public_path('huyen_thi/tinh_tp.json'));
            $provinces = json_decode($strJsonFileContents, true);
            DB::table('provinces')->insert($provinces);

            $strJsonFileContents = file_get_contents(public_path('huyen_thi/quan_huyen.json'));
            $districts = json_decode($strJsonFileContents, true);
            $districts = array_map(function ($item) {
                $item['slug'] = Str::slug($item['path']);
                return $item;
            }, $districts);

            DB::table('districts')->insert($districts);

            $strJsonFileContents = file_get_contents(public_path('huyen_thi/xa_phuong.json'));
            $communes = json_decode($strJsonFileContents, true);

            $communes = array_map(function ($item) {
                $item['slug'] = Str::slug($item['path']);
                return $item;
            }, $communes);

            $chunk = array_chunk($communes, 1000);
            foreach ($chunk as $items) {
                DB::table('communes')->insert($items);
            }
            DB::commit();
        } catch (\Throwable $e) {
            error_log($e->getMessage());
            DB::rollback();
        }
    }
}