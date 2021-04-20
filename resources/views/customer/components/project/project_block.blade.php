<div class="project-block">
    <div class="realty-container shadow-6 flex-wrap rounded d-flex d-md-block">
        <div class="overflow-hidden col-5 px-0 col-md-12 order-2 bg-white">
            <a href="{{route('customer.project.show', $project->slug)}}"
                class="p-3 d-flex flex-column justify-content-end ml-2 ml-md-0 img-wraper height-md-200 height-120"
                style="background-image: linear-gradient(0deg, rgba(0,0,0,0.8855917366946778) 0%, rgba(0,0,0,0.5102415966386555) 16%, rgba(0,212,255,0) 100%), url({{$project->thumb}}); background-size: cover">

                <h2 class="text-light font-13 font-weight-400">{{$project->name ?? ''}}</h2>
                <div class="d-flex text-light font-9">
                    <div class="border-right flex-0 pr-2">
                        @if ($project->min_price && $project->max_price)
                        {{beautyPrice($project->min_price)}} - {{beautyPrice($project->max_price)}}
                        @else
                            $ Đang cập nhật
                        @endif
                    </div>
                    <div class="flex-fill text-truncate pl-2" style="max-width: calc(100% - 160px)">{{$project->full_address}}</div>
                </div>
            </a>
        </div>
    </div>
</div>
