<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\Project;
use App\Services\SlugService;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{

    public function __construct(SlugService $slug_service)
    {
        $this->slug_service = $slug_service;
        $this->slug_service->setModel(Project::class);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intestors = [
            'VinGroup',
            'Masterties House',
            'Công ty CP Tập đoàn BRG',
            'Tập đoàn Jaccar Bourbon',
            'Tập đoàn Tân Hoàng Minh',
            'Công ty CP Đầu tư Văn Phú',
            'Công ty CP Đầu tư Thương mại Thu Hà',
        ];

        $description = [
            "Gmail là một dịch vụ email miễn phí hỗ trợ quảng cáo do Google phát triển. Người dùng có thể truy cập vào Gmail trên web và thông qua các ứng dụng dành cho thiết bị di động dành cho Android và iOS cũng như thông qua các chương trình của bên thứ ba đồng bộ hóa nội dung email thông qua giao thức POP hoặc IMAP. Gmail bắt đầu bằng bản phát hành beta có giới hạn vào ngày 1 tháng 4 năm 2004 và kết thúc giai đoạn thử nghiệm vào ngày 7 tháng 7 năm 2009.",
            "Khi khởi động, Gmail có dung lượng lưu trữ ban đầu là 1 GB cho mỗi người dùng, có dung lượng lớn hơn đáng kể so với các đối thủ cạnh tranh được cung cấp vào thời điểm đó. Ngày nay, dịch vụ này đi kèm với 15 GB dung lượng miễn phí. Người dùng có thể nhận email với dung lượng lên đến 50 MB, bao gồm tệp đính kèm, trong khi họ có thể gửi email đến 25 MB. Để gửi các tệp lớn hơn, người dùng có thể chèn tệp từ Google Drive vào thư. Gmail có giao diện định hướng tìm kiếm và  tương tự như diễn đàn trên Internet. Dịch vụ này đáng chú ý giữa các nhà phát triển trang web về việc sử dụng Ajax tiên phong của nó.",
            "Tính đến tháng 2 năm 2016, Gmail có một tỷ người dùng hoạt động trên toàn thế giới và là ứng dụng đầu tiên trên Cửa hàng Google Play đạt được một tỷ lượt cài đặt trên các thiết bị Android. Theo ước tính năm 2014, 60% các công ty Mỹ cỡ trung và 92% số doanh nghiệp mới thành lập đang sử dụng Gmail.",
            "Để tổ chức các thư dễ dàng hơn, e-mail có thể được gán nhãn. Các nhãn cung cấp cho người dùng một phương cách uyển chuyển để phân loại e-mail vì một e-mail có thể có nhiều loại nhãn (trái với kiểu hệ thống trong đó e-mail chỉ thuộc một thư mục). Người dùng có thể trình bày tất cả e-mail có nhãn nào đó và có thể sử dụng các nhãn này làm điều kiện tìm kiếm.",
            "Gmail cung cấp một hệ thống lọc thư rác (spam). Theo Gmail, những thư bị đánh dấu là spam sẽ được tự động xóa sau 30 ngày, nhưng đã có những báo cáo ở trang Gmail Help Discussion (Thảo luận Giúp đỡ Gmail) về những spam mail nằm ở thư mục spam hàng tháng trời.",
        ];

        $promotion_term = [
            "Gmail là một dịch vụ email miễn phí hỗ trợ quảng cáo do Google phát triển. Người dùng có thể truy cập vào Gmail trên web và thông qua các ứng dụng dành cho thiết bị di động dành cho Android và iOS cũng như thông qua các chương trình của bên thứ ba đồng bộ hóa nội dung email thông qua giao thức POP hoặc IMAP. Gmail bắt đầu bằng bản phát hành beta có giới hạn vào ngày 1 tháng 4 năm 2004 và kết thúc giai đoạn thử nghiệm vào ngày 7 tháng 7 năm 2009.",
            "Khi khởi động, Gmail có dung lượng lưu trữ ban đầu là 1 GB cho mỗi người dùng, có dung lượng lớn hơn đáng kể so với các đối thủ cạnh tranh được cung cấp vào thời điểm đó. Ngày nay, dịch vụ này đi kèm với 15 GB dung lượng miễn phí. Người dùng có thể nhận email với dung lượng lên đến 50 MB, bao gồm tệp đính kèm, trong khi họ có thể gửi email đến 25 MB. Để gửi các tệp lớn hơn, người dùng có thể chèn tệp từ Google Drive vào thư. Gmail có giao diện định hướng tìm kiếm và  tương tự như diễn đàn trên Internet. Dịch vụ này đáng chú ý giữa các nhà phát triển trang web về việc sử dụng Ajax tiên phong của nó.",
            "Tính đến tháng 2 năm 2016, Gmail có một tỷ người dùng hoạt động trên toàn thế giới và là ứng dụng đầu tiên trên Cửa hàng Google Play đạt được một tỷ lượt cài đặt trên các thiết bị Android. Theo ước tính năm 2014, 60% các công ty Mỹ cỡ trung và 92% số doanh nghiệp mới thành lập đang sử dụng Gmail.",
            "Để tổ chức các thư dễ dàng hơn, e-mail có thể được gán nhãn. Các nhãn cung cấp cho người dùng một phương cách uyển chuyển để phân loại e-mail vì một e-mail có thể có nhiều loại nhãn (trái với kiểu hệ thống trong đó e-mail chỉ thuộc một thư mục). Người dùng có thể trình bày tất cả e-mail có nhãn nào đó và có thể sử dụng các nhãn này làm điều kiện tìm kiếm.",
            "Gmail cung cấp một hệ thống lọc thư rác (spam). Theo Gmail, những thư bị đánh dấu là spam sẽ được tự động xóa sau 30 ngày, nhưng đã có những báo cáo ở trang Gmail Help Discussion (Thảo luận Giúp đỡ Gmail) về những spam mail nằm ở thư mục spam hàng tháng trời.",
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
        $avatars = [
            '/images/bds-01.jpg',
            '/images/bds-04.jpg',
            '/images/bds-02.jpg',
            '/images/bds-05.jpg',
            '/images/bds-03.jpg',

        ];

        $streets = [
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

        $communes = Commune::with('district', 'district.province')->get();

        for ($i = 0; $i < 100; $i++) {
            $commune = $communes->random();
            Project::create([
                'project_type' => $type = rand(1, 8),
                'name' => $name = config('constant.project_type.' . $type)['name'] . " tại " . $commune->path_with_type,
                'slug' => $this->slug_service->getSlug($name),
                'investor' => $intestors[array_rand($intestors, 1)],
                'avatar' => $avatars[array_rand($avatars, 1)],
                'street' => $street = $streets[array_rand($streets, 1)],
                'full_address' => $street . ", " . $commune->path_with_type,
                'province_code' => $commune->district->province->code,
                'district_code' => $commune->district->code,
                'commune_code' => $commune->code,
                'site_area' => $site_area = rand(5000, 20000),
                'construction_area' => rand(4000, $site_area),
                'start_time' => '2019-4-14',
                'launch_time' => '2020-1-23',
                'status' => '1',
                'description' => $description[array_rand($description, 1)],
                'promotion_term' => $promotion_term[array_rand($promotion_term, 1)],
            ]);
        }
    }
}