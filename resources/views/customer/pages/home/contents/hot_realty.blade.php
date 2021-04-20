<section class="random-realty py-3 py-lg-5 section hrm-bg-secondary">
	<div class="container">
        <div class="d-md-flex">
            <h3 class="font-18 font-weight-600 color-dark home-title">Bất động sản dành cho bạn</h3>
            <div class="ml-auto d-flex align-items-center ">
                <a href="/ban" class="px-md-2 border-md-right secondary-text">Tin nhà đất bán mới nhất</a>
                <a href="/cho-thue" class="px-md-2 secondary-text">Tin nhà đất cho thuê mới nhất</a>
            </div>
        </div>

        <div class="row pt-3">
            @foreach ($random_realties as $index => $item)
            <div class="item col-md-3 my-2 wow fadeIn"
            data-wow-offset="1"
            data-wow-delay="{{0.1 * $index}}s"
            >
                @include('customer.components.realty_post.realty_block', ['item' => $item])
            </div>
            @endforeach
        </div>
    </div>
</section>
