<section class="post section bg-section">
	<div class="container">
		<div class="row">
            @foreach ($home_featured_cats as $post_category)
            <div class="col-md-4">
				<div class="entry-head-2">
					<h2 class="title">
						<div class="title-top">Tin tức</div>
						<span>{{$post_category->name}}</span>
					</h2>
				</div>
				<div class="list-news">
                    @foreach ($post_category->posts->take(4) ?? [] as $key => $post)
                        @if ($key == 0)
                        <div class="post-top">
                            <div class="item">
                                <a href="{{route('customer.post.show',['cat_slug' => $post_category->slug ?? 'danh-muc', 'post_slug' => $post->slug] )}}" class="img"><img class=" loaded loaded" src="{{$post->thumb ?? ''}}"></a>
                                <div class="divtext">
                                    <a href="{{route('customer.post.show',['cat_slug' => $post_category->slug ?? 'danh-muc', 'post_slug' => $post->slug])}}" class="title">
                                        <h3 class="title-post">{{$post->name ?? ''}}</h3>
                                    </a>
                                    <div class="imeta-1"><span class="date">{{Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="post-item">
                            <div class="item">
                                <a href="{{route('customer.post.show',['cat_slug' => $post_category->slug ?? 'danh-muc', 'post_slug' => $post->slug] )}}" class="img"><img class="loaded" src="{{$post->thumb ?? ''}}"></a>
                                <div class="divtext">
                                    <a href="{{route('customer.post.show',['cat_slug' => $post_category->slug ?? 'danh-muc', 'post_slug' => $post->slug] )}}" class="{{$post->name ?? ''}}">
                                        <h3 class="title-post">{{$post->name ?? ''}}</h3>
                                    </a>
                                    <div class="imeta-1"><span class="date">{{Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span></div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
					<a class="btn view-all" href="{{route('customer.post.show_by_category', $post_category->slug)}}">Xem tất cả</a>
				</div>
			</div>
            @endforeach
			<div class="col-md-4">
				<div class="entry-head-2">
					<h2 class="title">
						<div class="title-top">Tin tức</div>
						<span>Nổi bật</span>
					</h2>
				</div>
				<div class="list-news">
                    @foreach ($home_featured_post as $post)
                    @php
                        $link = route('customer.post.show',['cat_slug' => $post_category->slug ?? 'danh-muc', 'post_slug' => $post->slug] )
                    @endphp
                    <div class="post-item">
						<div class="item">
                            <a href="{{$link}}" class="img"><img class=" loaded loaded" src="{{$post->thumb}}"></a>
							<div class="divtext">
								<a href="{{$link}}" class="title">
									<h3 class="title-post">{{$post->name}}</h3>
								</a>
                                <div class="imeta-1"><span class="date">{{Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span></div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</section>
