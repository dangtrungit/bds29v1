<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\RealtyPost;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_tags_string = [
            'phong thủy', 'kiến thức', 'kiến trúc', 'truyền thông', 'tổng hợp', 'tư vấn', 'nhà đất mới',
        ];
        $realty_tags_string = [
            'mua nhà', 'mua bán nhà đất', 'nhà cũ', 'nhà mới xây',
        ];
        foreach ($post_tags_string as $item) {
            $post_tags[] = Tag::findOrCreate($item, 'post');
        }
        foreach ($realty_tags_string as $item) {
            $realty_tags[] = Tag::findOrCreate($item, 'realty');
        }

        $realty_posts = RealtyPost::with('realty', 'realty.district', 'realty.project')->get();
        $posts = Post::all();
        foreach ($realty_posts as $realty) {
            foreach ($realty_tags as $item) {
                $realty->attachTag($item);
            }
        }

        foreach ($posts as $post) {
            foreach ($post_tags as $item) {
                $post->attachTag($item);
            }
        }

    }
}