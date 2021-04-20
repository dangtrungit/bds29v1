<?php
namespace App\Services;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProjectService
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter($query)
    {
        $this->readQuery();
        $query = QueryBuilder::for($query);

        $projects = $query
            ->allowedFilters(
                AllowedFilter::scope('price_between'),
                AllowedFilter::exact('trang-thai', 'status'),
                AllowedFilter::exact('tinh', 'province_code'),
                AllowedFilter::exact('huyen', 'district_code'),
                AllowedFilter::exact('loai-du-an', 'project_type'),
                'full_address',
            )
            ->allowedSorts('price', 'area');

        return $projects;
    }

    protected function readQuery()
    {
        $result = [];
        $query = $this->request->all();
        if (!$this->request->has('filter')) {
            $this->request->filter = [];
        }
        foreach ($this->request->all() as $key => $value) {
            switch ($key) {
                case 'trang-thai':
                    $result['trang-thai'] = $value;
                    break;
                case 'loai-du-an':
                    $result['loai-du-an'] = $value;
                    break;
                case 'gia':
                    $result['price_between'] = $value;
                    break;
                case 'tinh':
                    $result['tinh'] = $value;
                    break;
                case 'huyen':
                    $result['huyen'] = $value;
                    break;
                case 'dia-chi':
                    $result['full_address'] = $value;
                    break;
                default:
                    break;
            }
        }

        $this->request->request->set('filter', array_merge($this->request->filter, $result));
    }

    public function getProjectDetails($projects)
    {
        foreach ($projects as $project) {
            $realty_posts = $project->realty_posts;

            $project->min_price = $realty_posts->min('price');
            $project->max_price = $realty_posts->max('price');

            $list_realty_type = [];

            foreach ($realty_posts as $item) {
                if (!in_array($item->realty->type, $list_realty_type)) {
                    $list_realty_type[] = $item->realty->type;
                }
            }
            // $sell_realty = $project->realty_posts->where('type', 1)->count();
            // $rent_realty = $project->realty_posts->where('type', 2)->count();
            // $project->sell_realty = $sell_realty;
            // $project->rent_realty = $rent_realty;

            $project->list_realty_type = $list_realty_type;
        }

        return $projects;
    }
}