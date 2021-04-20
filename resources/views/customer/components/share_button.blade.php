<a class="d-inlineblock btn btn-share hrm-menu-item">Chia sẻ <i class="far text-info fa-share font-12"></i>
    <div class="submenu-bottom border bg-white p-3 rounded shadow-5 text-left">
        <div
        class="zalo-share-button text-left bg-white"
        data-href="{{request()->url()}}"
        data-oaid="579745863508352884"
        data-layout="1"
        {{-- data-color="blue" --}}
        data-customize=true
        >
            <img class="mr-2" style="width:1.5rem; height:1.5rem" src="{{asset('images/icons/zalo.png')}}" alt="">
            <strong class="font-9 text-muted">Zalo</strong >
        </div>
        <div class="mt-3 share-facebook" >
            <i class="fab fa-facebook-square font-15 text-primary mr-2"></i>
            <strong class="font-9 text-muted">Facebook</strong >
        </div>
    </div>
</a>

@section('script')
@parent
<!-- Your share button code -->
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<script>
function share_fb(url) {
    window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626, height=436")
}
$('.share-facebook').on('click', function(){
    share_fb('{{request()->url()}}');
})
</script>


@endsection
