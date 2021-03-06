<?php

namespace App\Scraper;

use App\Models\RealtyPost;
use App\Services\ImageService;
use App\Services\SlugService;
use Goutte\Client;
use Str;

class RealtyScraper
{
    public function __construct(SlugService $slug_service, ImageService $image_service)
    {
        $this->slug_service = $slug_service;
        $this->image_service = $image_service;
        $this->slug_service->setModel(RealtyPost::class);
    }
    public function crawList($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $links = $crawler
            ->filter(".content-items .ct_title a")->each(function ($node) {
            return "https://alonhadat.com.vn" . $node->attr('href');
        });
        $list_item = [];

        foreach ($links as $link) {
            $item = $this->scrapeRealty($link);
            if ($item) {
                $list_item[] = $item;
            }
        }
        return $list_item;
    }

    public function scrapeRealty($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $realty_type = $crawler
            ->filter(".infor tr:nth-child(3) td:nth-child(2)")
            ->first()->text();

        $street = $crawler
            ->filter(".address .value")
            ->first()->text();

        $direction = $crawler
            ->filter(".infor tr:nth-child(1) td:nth-child(4)")
            ->first()->text();
        $direction = $this->getDirection($direction);

        $number_of_bed_rooms = $crawler
            ->filter(".infor tr:nth-child(5) td:nth-child(4)")
            ->first()->text();

        $number_of_floors = $number_of_bath_rooms = $crawler
            ->filter(".infor tr:nth-child(4) td:nth-child(4)")
            ->first()->text();

        $area = $crawler
            ->filter(".square .value")
            ->first()->text();

        $area = $this->getAreaFromString($area);

        $description = $crawler
            ->filter(".detail")
            ->first()->text();
        $full_address = $crawler
            ->filter(".address .value")
            ->first()->text();
        $google_map_lat = "20.990585";
        $google_map_lng = "105.831522";

        // realty post
        $title = $crawler
            ->filter(".title h1")
            ->first()->text();

        if ($this->slug_service->isExsist($title)) {
            return false;
        }

        $realty_post_type = $crawler
            ->filter(".infor tr:nth-child(2) td:nth-child(2)")
            ->first()->text();
        $price = $crawler
            ->filter(".price .value")
            ->first()->text();
        $price_type = $this->getPriceType($price);
        $price = intval($this->getPriceFromString($price));

        // images
        $images = $crawler
            ->filter(".images .image-list img")
            ->each(function ($node) {
                return "https://alonhadat.com.vn" . $node->attr('src');
            });

        $list = [];

        foreach ($images as $image) {
            try {
                $file = file_get_contents($image);
                $new_file = $this->image_service->store($file);
                $list[] = $new_file["path"];
            } catch (Exception $e) {
                continue;
            }
        }
        $list = implode(',', $list);

        $new_realty = [];
        $new_realty['type'] = $this->getRealtyType($realty_type);
        $new_realty['street'] = $street;
        $new_realty['direction'] = $direction;
        $new_realty['number_of_bed_rooms'] = $number_of_bed_rooms == "---" ? null : $number_of_bed_rooms;
        $new_realty['number_of_bath_rooms'] = $number_of_bath_rooms == "---" ? null : $number_of_bath_rooms;
        $new_realty['number_of_floors'] = $number_of_floors == "---" ? null : $number_of_floors;
        $new_realty['area'] = $area;
        $new_realty['description'] = $description;
        $new_realty['full_address'] = $full_address;
        $new_realty['google_map_lat'] = $google_map_lat;
        $new_realty['google_map_lng'] = $google_map_lng;
        $new_realty['house_image'] = $list;

        $new_realty_post = [];
        $new_realty_post["title"] = $title;
        $new_realty_post["type"] = $this->getRealtyPostType($realty_post_type);
        $new_realty_post["price"] = $price;
        $new_realty_post["price_type"] = $price_type;
        $new_realty_post["description"] = $description;
        $new_realty_post["slug"] = $this->slug_service->getSlug($title);

        return [
            'realty' => $new_realty,
            'realty_post' => $new_realty_post,
        ];
    }

    private function getPriceType($string)
    {
        if (strpos($string, 'th??ng')) {
            return 3;
        };
        if (strpos($string, 'm2')) {
            return 2;
        };
        if (strpos($string, 'Th???a thu???n')) {
            return 0;
        };
        return 1;
    }

    private function getRealtyType($string)
    {
        switch ($string) {
            case 'Nh?? m???t ti???n':
                return 2;
                break;
            case 'Nh?? trong h???m':
                return 2;
                break;
            case 'Bi???t th???, nh?? li???n k???':
                return 3;
                break;
            case 'C??n h??? chung c??':
                return 1;
                break;
            case 'Ph??ng tr???, nh?? tr???':
                return 8;
                break;
            case 'V??n ph??ng':
                return 9;
                break;
            case 'Kho, x?????ng':
                return 11;
                break;
            case 'Shop, kiot, qu??n':
                return 10;
                break;
            case 'Trang tr???i':
                return 6;
                break;
            case 'M???t b???ng':
                return 5;
                break;
            case '?????t th??? c??, ?????t ???':
                return 5;
                break;
            case '?????t n???n, li???n k???, ?????t d??? ??n':
                return 5;
                break;
            case 'c??c lo???i kh??c':
                return 12;
                break;
            default:
                return 12;
                break;
        }
    }

    private function getRealtyPostType($string)
    {
        switch ($string) {
            case 'Cho thu??':
                return 2;
                break;

            default:
                return 1;
                break;
        }
    }

    private function getDirection($string)
    {
        switch ($string) {
            case '????ng':
                return 1;
                break;
            case 'T??y':
                return 2;
                break;
            case 'Nam':
                return 3;
                break;
            case 'B???c':
                return 4;
                break;
            case '????ng B???c':
                return 5;
                break;
            case '????ng Nam':
                return 6;
                break;
            case 'T??y B???c':
                return 7;
                break;
            case 'T??y Nam':
                return 8;
                break;
            default:
                return null;
                break;
        }
    }

    private function getPriceFromString($string)
    {
        if (strpos($string, 't???')) {
            return floatval(trim(Str::replaceLast('t???', '', $string))) * 1000000000;
        };
        if (strpos($string, 'tri???u')) {
            return floatval(trim(Str::replaceLast('tri???u', '', $string))) * 1000000;
        };
        if (strpos($string, 'ngh??n')) {
            return floatval(trim(Str::replaceLast('ngh??n', '', $string))) * 1000;
        };

        return floatval($string);
    }

    private function getAreaFromString($string)
    {
        return intval(trim(Str::replaceLast('m2', '', $string)));
    }

    private function createRealty($realty, $realty_post)
    {
        // store realty
        $commune = Commune::where('code', $request->commune)->first();
        $new_realty = Realty::create([
            'type' => $request->realty_type,
            'province_code' => $request->province,
            'district_code' => $request->district,
            'commune_code' => $request->commune,
            'street' => $request->street,
            'direction' => $request->direction,
            'number_of_bed_rooms' => $request->number_of_bed_rooms,
            'number_of_bath_rooms' => $request->number_of_bath_rooms,
            'number_of_floors' => $request->number_of_floors,
            'area' => $request->area,
            'description' => $request->description,
            'house_image' => $request->house_image,
            'house_design_image' => $request->house_design_image,
            'apartment_number' => $request->apartment_number,
            'full_address' => 'S??? nh??' . $request->apartment_number . ", " . $request->street . ", " . $commune->path_with_type,
            'google_map_lat' => $request->google_map_lat,
            'google_map_lng' => $request->google_map_lng,
            'project_id' => $request->project_id,

        ]);
        // store realty post
        $open_at = Carbon::createFromFormat('d/m/Y', $request->open_at);
        $close_at = Carbon::createFromFormat('d/m/Y', $request->close_at);
        $slug = $this->slug_service->getSlug($request->title);
        $new_realty_post = RealtyPost::create([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->realty_post_type,
            'price' => $request->price,
            'price_type' => $request->price_type,
            'description' => $request->description,
            'realty_id' => $new_realty->id,
            'contact_name' => $request->contact_name,
            'contact_phone_number' => $request->contact_phone_number,
            'contact_email' => $request->contact_email,
            'contact_address' => $request->contact_address,
            'rank' => $request->realty_post_rank,
            'open_at' => $open_at->format('Y-m-d H:i:s'),
            'close_at' => $close_at->format('Y-m-d H:i:s'),
            'created_by' => auth()->user()->id ?? null,
        ]);
        $post_rank = PostRank::where('rank_code', $request->realty_post_rank)->first();
        $duration = $close_at->diffInDays($open_at);
    }

}