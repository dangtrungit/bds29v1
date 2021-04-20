<section class="home-post pt-5 pb-2 section bg-white">
	<div class="container">
        <div class="p-0">
            <div>
                <div class="text-center mb-5">
                    <h2 class="font-18 home-title color-dark">Dự án nổi bật</h2>
                </div>
                <div class="project-container row">
                    @foreach ($home_projects as $item)
                        <div class="col-md-4 pb-3">
                            @include('customer.components.project.project_block', ['project' => $item])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
	</div>
</section>
