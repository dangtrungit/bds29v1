<section class="district-hot section bg-section">
   <div class="container">
      <div class="entry-head-2">
         <h2 class="title">
            <div class="title-top">Danh sách</div>
            <span>Quận/ huyện nổi bật</span>
        </h2>
    </div>
    <div class="slider-district owl-carousel">
    @foreach ($featured_district as $item)
    <a href="/{{$item->slug}}" class="item">
        <img src="{{asset('images/tan-binh.jpg')}}" alt="">
        <h3><span class="text">{{$item->name_with_type}}</span></h3>
    </a>
    @endforeach
</div>
</div>
</section>
