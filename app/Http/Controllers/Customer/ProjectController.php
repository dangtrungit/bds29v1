<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\ProjectSlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(ProjectService $project_service, ProjectSlugHelper $project_slug_helper)
    {
        $this->project_slug_helper = $project_slug_helper;
        $this->project_service = $project_service;
    }

    public function index($search_slug, Request $request)
    {
        $query = Project::with('realty_posts', 'realty_posts.realty');

        $query_from_slug = $this->project_slug_helper->getFilterStringFromSlug($search_slug);

        $request->request->add(['filter' => $query_from_slug]);

        $projects = $this->project_service->filter($query)->paginate(10);
        foreach ($projects as $project) {
            $lowest_cost = 1000000000;
            $realty_posts = $project->realty_posts;

            $project->min_price = $realty_posts->min('price');
            $project->max_price = $realty_posts->max('price');

            $list_realty_type = [];

            foreach ($realty_posts as $item) {
                if (!in_array($item->realty->type, $list_realty_type)) {
                    $list_realty_type[] = $item->realty->type;
                }
            }

            $project->list_realty_type = $list_realty_type;
        }
        return view('customer.pages.project.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        if (!$project) {
            return abort(404);
        }

        $lowest_cost = 1000000000;
        foreach ($project->realty_posts as $realty_post) {
            if ($realty_post->price / $realty_post->realty->area < $lowest_cost) {
                $lowest_cost = $realty_post->price / $realty_post->realty->area;
            }
        }
        if ($lowest_cost == 1000000000) {
            $lowest_cost = 0;
        }
        $sell_realty = $project->realty_posts->where('type', 1)->take(9);
        $rent_realty = $project->realty_posts->where('type', 2)->take(9);
        $project->lowest_cost = round($lowest_cost / 1000000, 2);
        $project->sell_realty = $sell_realty;
        $project->rent_realty = $rent_realty;

        return view('customer.pages.project.show', compact('project'));
    }
}