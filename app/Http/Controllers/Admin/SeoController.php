<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoManager;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SeoController extends Controller
{
    public function index()
    {
        $seo_list = SeoManager::all();
        return view('admin.pages.seo.index', compact('seo_list'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (!isset($data['link'])) {
            return ['error' => 'Đường dẫn trống'];
        }
        $data['link'] = \str_replace(url('/'), '', $data['link']);
        SeoManager::updateOrCreate([
            'link' => $data['link'],
        ],
            $data
        );
        return ['msg' => 'Cập nhật thành công!'];
    }

    public function getDetails(Request $request)
    {
        $link = $request->link;
        $seo = SeoManager::where('link', $link)->first();
        return $seo;
    }

    public function destroy($id)
    {
        $post = SeoManager::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công'];
    }

    public function updateSitemap()
    {
        SitemapGenerator::create('https://mixedu.vn')->writeToFile(public_path('sitemap.xml'));
    }
}