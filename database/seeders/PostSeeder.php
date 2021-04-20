<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Post;
use App\Models\PostCategory;
use DB;
use Illuminate\Database\Seeder;
use Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Phong thủy',
                'slug' => 'phong-thuy',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ],
            [
                'name' => 'Kiến trúc',
                'slug' => 'kien-truc',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ], [
                'name' => 'Kiến thức',
                'slug' => 'kien-thuc',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ], [
                'name' => 'Thuyền thông',
                'slug' => 'truyen-thong',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ], [
                'name' => 'Tổng hợp',
                'slug' => 'tong-hop',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ], [
                'name' => 'Góc tư vấn',
                'slug' => 'goc-tu-van',
                'short_description' => 'Mô tả ngắn',
                'status' => 1,
                'parent_id' => null,
                'is_featured' => '1',
            ],
        ];
        foreach ($categories as $category) {
            DB::table('post_categories')->updateOrInsert([
                'slug' => $category['slug'],
            ], $category);
        };

        $short_descriptions = [
            "Gmail là một dịch vụ email miễn phí hỗ trợ quảng cáo do Google phát triển. Người dùng có thể truy cập vào Gmail trên web và thông qua các ứng dụng dành cho thiết bị di động dành cho Android và iOS cũng như thông qua các chương trình của bên thứ ba đồng bộ hóa nội dung email thông qua giao thức POP hoặc IMAP. Gmail bắt đầu bằng bản phát hành beta có giới hạn vào ngày 1 tháng 4 năm 2004 và kết thúc giai đoạn thử nghiệm vào ngày 7 tháng 7 năm 2009.",
            "Khi khởi động, Gmail có dung lượng lưu trữ ban đầu là 1 GB cho mỗi người dùng, có dung lượng lớn hơn đáng kể so với các đối thủ cạnh tranh được cung cấp vào thời điểm đó. Ngày nay, dịch vụ này đi kèm với 15 GB dung lượng miễn phí. Người dùng có thể nhận email với dung lượng lên đến 50 MB, bao gồm tệp đính kèm, trong khi họ có thể gửi email đến 25 MB. Để gửi các tệp lớn hơn, người dùng có thể chèn tệp từ Google Drive vào thư. Gmail có giao diện định hướng tìm kiếm và  tương tự như diễn đàn trên Internet. Dịch vụ này đáng chú ý giữa các nhà phát triển trang web về việc sử dụng Ajax tiên phong của nó.",
            "Tính đến tháng 2 năm 2016, Gmail có một tỷ người dùng hoạt động trên toàn thế giới và là ứng dụng đầu tiên trên Cửa hàng Google Play đạt được một tỷ lượt cài đặt trên các thiết bị Android. Theo ước tính năm 2014, 60% các công ty Mỹ cỡ trung và 92% số doanh nghiệp mới thành lập đang sử dụng Gmail.",
            "Để tổ chức các thư dễ dàng hơn, e-mail có thể được gán nhãn. Các nhãn cung cấp cho người dùng một phương cách uyển chuyển để phân loại e-mail vì một e-mail có thể có nhiều loại nhãn (trái với kiểu hệ thống trong đó e-mail chỉ thuộc một thư mục). Người dùng có thể trình bày tất cả e-mail có nhãn nào đó và có thể sử dụng các nhãn này làm điều kiện tìm kiếm.",
            "Gmail cung cấp một hệ thống lọc thư rác (spam). Theo Gmail, những thư bị đánh dấu là spam sẽ được tự động xóa sau 30 ngày, nhưng đã có những báo cáo ở trang Gmail Help Discussion (Thảo luận Giúp đỡ Gmail) về những spam mail nằm ở thư mục spam hàng tháng trời.",
        ];

        $contents = [
            "Gmail là một dịch vụ email miễn phí hỗ trợ quảng cáo do Google phát triển. Người dùng có thể truy cập vào Gmail trên web và thông qua các ứng dụng dành cho thiết bị di động dành cho Android và iOS cũng như thông qua các chương trình của bên thứ ba đồng bộ hóa nội dung email thông qua giao thức POP hoặc IMAP. Gmail bắt đầu bằng bản phát hành beta có giới hạn vào ngày 1 tháng 4 năm 2004 và kết thúc giai đoạn thử nghiệm vào ngày 7 tháng 7 năm 2009.",
            "Khi khởi động, Gmail có dung lượng lưu trữ ban đầu là 1 GB cho mỗi người dùng, có dung lượng lớn hơn đáng kể so với các đối thủ cạnh tranh được cung cấp vào thời điểm đó. Ngày nay, dịch vụ này đi kèm với 15 GB dung lượng miễn phí. Người dùng có thể nhận email với dung lượng lên đến 50 MB, bao gồm tệp đính kèm, trong khi họ có thể gửi email đến 25 MB. Để gửi các tệp lớn hơn, người dùng có thể chèn tệp từ Google Drive vào thư. Gmail có giao diện định hướng tìm kiếm và  tương tự như diễn đàn trên Internet. Dịch vụ này đáng chú ý giữa các nhà phát triển trang web về việc sử dụng Ajax tiên phong của nó.",
            "Tính đến tháng 2 năm 2016, Gmail có một tỷ người dùng hoạt động trên toàn thế giới và là ứng dụng đầu tiên trên Cửa hàng Google Play đạt được một tỷ lượt cài đặt trên các thiết bị Android. Theo ước tính năm 2014, 60% các công ty Mỹ cỡ trung và 92% số doanh nghiệp mới thành lập đang sử dụng Gmail.",
            "Để tổ chức các thư dễ dàng hơn, e-mail có thể được gán nhãn. Các nhãn cung cấp cho người dùng một phương cách uyển chuyển để phân loại e-mail vì một e-mail có thể có nhiều loại nhãn (trái với kiểu hệ thống trong đó e-mail chỉ thuộc một thư mục). Người dùng có thể trình bày tất cả e-mail có nhãn nào đó và có thể sử dụng các nhãn này làm điều kiện tìm kiếm.",
            "Gmail cung cấp một hệ thống lọc thư rác (spam). Theo Gmail, những thư bị đánh dấu là spam sẽ được tự động xóa sau 30 ngày, nhưng đã có những báo cáo ở trang Gmail Help Discussion (Thảo luận Giúp đỡ Gmail) về những spam mail nằm ở thư mục spam hàng tháng trời.",
        ];

        $avatars = [
            '/images/listing_bds02.jpg',
            '/images/listing_bds01.jpg',
            '/images/trang-tri-phong-ngu.jpg',
            '/images/cau-thang-phong-thuy.jpg',
            '/images/post-avatar-1.jpg',
            '/images/post-avatar-2.jpg',
            '/images/post-avatar-3.jpg',
        ];

        $names = [
            'Bảng giá bất động sản quận 10 mới nhất 2020',
            'Dự án chung cư cao cấp 3 - 4 tỷ đã hoàn thiện tại Quận 2, mua chung cư Quận 2',
            'Hủy cọc mua bán nhà đất - Khách mua làm gì để không thiệt hại?',
            'Bí quyết tiết kiệm tiền mua nhà hiệu quả cho vợ chồng trẻ',
            'Lãi suất vay ngân hàng mua nhà tháng 11 - Ngân hàng nào đang có mức ưu đãi tốt nhất?',
            '5 dự án gây bất động sản "sốt" tại TP. Hồ Chí Minh năm 2020, cập nhật tiến độ dự án',
            'Bài trí ghế sofa chuẩn phong thủy để phú quý gõ cửa, quý nhân đến nhà',
            'Mua nhà, nhập trạch trong tháng cô hồn, tưởng xui rủi ai dè đại lợi?',
            'Hoá giải xui xẻo, tiết kiệm hàng chục triệu khi mua nội thất tháng cô hồn',
        ];

        $max = 50;
        $admins = Admin::all();
        $cats = PostCategory::all();

        for ($i = 0; $i < $max; $i++) {
            $admin = $admins->random();
            $cat = $cats->random();
            $post = [
                'name' => $name = $names[array_rand($names, 1)],
                'slug' => $this->getSlug(\App\Models\Post::class, $name),
                'short_description' => $short_descriptions[array_rand($short_descriptions, 1)],
                'content' => $contents[array_rand($contents, 1)],
                'status' => rand(0, 1),
                'avatar' => $avatars[array_rand($avatars, 1)],
                'is_featured' => rand(0, 1),
                'created_by' => $admin->id,
            ];

            $new_post = Post::create($post);
            $this->updateCategory($new_post->id, [$cat->id]);
        }
    }

    private function getSlug($model, $string)
    {
        $is_exsist = true;
        $i = 1;
        $base_slug = Str::slug($string);
        $slug = $base_slug;
        while ($is_exsist == true) {
            $instance = $model::where('slug', $slug)->first();
            if (!$instance) {
                break;
            }
            $i++;
            if ($i >= 1) {
                $slug = $base_slug . '-' . $i;
            }
        }
        return $slug;
    }

    private function updateCategory($post_id, $categories)
    {
        DB::table('post_to_category')->where('post_id', $post_id)->delete();
        foreach ($categories as $category) {
            DB::table('post_to_category')->insert([
                'post_id' => $post_id,
                'category_id' => $category,
            ]);
        }
    }
}