@extends('customer.layouts.main')

@section('title')
Đăng tin mua bán nhà đất, bất động sản miễn phí
@endsection

@section('content')
<div class="banner-news">
	<div class="slider-news owl-carousel">
		<img src="{{asset('images/dangtin1.jpg')}}" alt="">
		<img src="{{asset('images/dangtin1.jpg')}}" alt="">
	</div>
</div>
<div class="post-news">
	<div class="container">
		<div class="choose-title">
			<button class="btn active">Chủ Nhà</button>
			<button id="is-agent" class="btn">Môi Giới</button>
		</div>
		<div class="content-dangtin">
			<h2 class="title-dangtin">Thông tin BĐS</h2>
			<form action="{{route('customer.realty_post.store')}}" id="realty-post-form" method="POST" class="info-credibility form-news">
				@csrf
				@include('customer.pages.realty_post.form')
			</form>
		</div>
	</div>
</div>
@endsection
