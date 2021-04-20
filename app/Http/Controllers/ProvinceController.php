<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Project;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function getDistrictsByProvince($province_code)
    {
        $province = Province::with('districts')->where('code', $province_code)->first();
        return $province->districts ?? [];
    }

    public function getCommunesByDistrict($district_code)
    {
        $district = District::with('communes')->where('code', $district_code)->first();
        return $district->communes ?? [];
    }

    public function getProjectsByDistrict($district_code)
    {
        $projects = Project::where('district_code', $district_code)->select(['id', 'name', 'commune_code', 'street'])->get();
        return $projects;
    }
}