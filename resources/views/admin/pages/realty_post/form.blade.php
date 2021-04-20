<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin Bất động sản</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="">Tiêu đề bài rao</label>
                    <input
                    id="title"
                    type="text"
                    class="form-control "
                    name="title"
                    placeholder="Tiêu đề bài rao"
                    @isset($realty_post)
                    value="{{$realty_post->title ?? ''}}"
                    @endisset
                    >
                    @error('description')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <label for="">Slug</label>
                    <input
                    id="slug"
                    type="text"
                    class="form-control "
                    name="slug"
                    placeholder="Slug"
                    @isset($realty_post)
                    value="{{$realty_post->slug ?? ''}}"
                    @endisset
                    >
                    @error('description')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="realty_post_type">Loại hình giao dịch (<span class="text-red">*</span>)</label>
                    <select class="form-control" name="realty_post_type" id="realty_post_type">
                        <option value="1" @if (isset($realty_post) && $realty_post->type == 1) selected @endif >Bán</option>
                        <option value="2" @if (isset($realty_post) && $realty_post->type == 2) selected @endif >Cho thuê</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="realty_type">Loại hình bất động sản (<span class="text-red">*</span>)</label>
                    <select class="form-control" name="realty_type" id="realty_type">
                        <option value="1" @if (isset($realty) && $realty->type == 1) selected @endif >Chung cư/ Căn hộ</option>
                        <option value="2" @if (isset($realty) && $realty->type == 2) selected @endif >Nhà riêng</option>
                        <option value="3" @if (isset($realty) && $realty->type == 3) selected @endif >Đất nền</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="area">Diện tích (<span class="text-red">*</span>)</label>
                    <input
                    name="area"
                    type="number"
                    class="form-control @error('area') is-invalid @enderror"
                    id="area"
                    placeholder="Nhập diện tích BDS"
                    value="{{$realty_post->realty->area ?? old('area')}}"
                    >
                    @error('area')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="direction">Hướng (<span class="text-red">*</span>)</label>
                    <select class="form-control" id="direction" name="direction">
                        <option value="">Hướng</option>
                        <option value="1" @if (isset($realty) && $realty->direction == 1) selected @endif >Đông</option>
                        <option value="2" @if (isset($realty) && $realty->direction == 2) selected @endif >Tây</option>
                        <option value="3" @if (isset($realty) && $realty->direction == 3) selected @endif >Nam</option>
                        <option value="4" @if (isset($realty) && $realty->direction == 4) selected @endif >Bắc</option>
                        <option value="5" @if (isset($realty) && $realty->direction == 5) selected @endif >Đông Bắc</option>
                        <option value="6" @if (isset($realty) && $realty->direction == 6) selected @endif >Đông Nam</option>
                        <option value="7" @if (isset($realty) && $realty->direction == 7) selected @endif >Tây Bắc</option>
                        <option value="8" @if (isset($realty) && $realty->direction == 8) selected @endif >Tây Nam</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="price">Tầng(<span class="text-red">*</span>)</label>
                    <input
                    name="number_of_floors"
                    type="number"
                    class="form-control @error('number_of_floors') is-invalid @enderror"
                    id="number_of_floors"
                    placeholder="Số tầng"
                    value="{{$realty->number_of_floors ?? old('number_of_floors')}}"
                    >
                    @error('number_of_floors')
                    <div id="" class="error invalid-feedback d-block">
                            {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="number_of_bath_rooms">Phòng tắm(<span class="text-red">*</span>)</label>
                    <input
                    name="number_of_bath_rooms"
                    type="number"
                    class="form-control @error('number_of_bath_rooms') is-invalid @enderror"
                    id="number_of_bath_rooms"
                    placeholder="Phòng tắm"
                    value="{{$realty->number_of_bath_rooms ?? old('number_of_bath_rooms')}}"
                    >
                    @error('number_of_bath_rooms')
                    <div id="" class="error invalid-feedback d-block">
                            {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="price">Phòng ngủ(<span class="text-red">*</span>)</label>
                    <input
                    name="number_of_bed_rooms"
                    type="number"
                    class="form-control @error('number_of_bed_rooms') is-invalid @enderror"
                    id="number_of_bed_rooms"
                    placeholder="Phòng ngủ"
                    value="{{$realty->number_of_bed_rooms ?? old('number_of_bed_rooms')}}"
                    >
                    @error('number_of_bed_rooms')
                    <div id="" class="error invalid-feedback d-block">
                            {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="price">Nội thất(<span class="text-red">*</span>)</label>
                    <select class="form-control  @error('furniture') is-invalid @enderror" id="furniture" name="furniture">
                        <option value="">Nội thất</option>
                        <option value="0" name="option-noi-that" @if($realty->furniture==0) selected @endif>Cơ bản</option>
                        <option value="1" name="option-noi-that" @if($realty->furniture==1) selected @endif>Nguyên bản</option>
                        <option value="2" name="option-noi-that" @if($realty->furniture==2) selected @endif>Full đồ</option>
                    </select>
                    @error('furniture')
                    <div id="" class="error invalid-feedback d-block">
                            {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="price">Giá(<span class="text-red">*</span>)</label>
                <input
                name="price"
                type="number"
                class="form-control @error('price') is-invalid @enderror"
                id="price"
                placeholder="Nhập giá bất động sản"
                value="{{$realty_post->price ?? old('price')}}"
                >
                @error('price')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-12"><label>Địa chỉ BĐS</label></div>
                <div class="col-md-4 form-group">
                    <select class="form-control address_input" name="province" id="province">
                        <option value="">Tỉnh/Thành phố</option>
                        @foreach ($provinces as $province)
                        <option
                        @if (isset($realty) && $province->code == $realty->province_code) selected @endif
                        value="{{$province->code}}">{{$province->name_with_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <select class="form-control address_input" name="district" id="district">
                        <option value="0">Huyện/Thị xã</option>
                        @isset($districts)
                            @foreach ($districts as $district)
                            <option
                            @if ($district->code == $realty->district_code) selected @endif
                            value="{{$district->code}}">{{$district->name_with_type}}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <select class="form-control address_input" name="commune" id="commune">
                        <option value="0">Xã/ Phường</option>
                        @isset($communes)
                        @foreach ($communes as $commune)
                        <option
                        @if ($commune->code == $realty->commune_code) selected @endif
                        value="{{$commune->code}}">{{$commune->name_with_type}}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <input
                    @isset($realty)
                    value="{{$realty->apartment_number ?? old('apartment_number')}}"
                    @endisset
                    type="text" name="apartment_number" class="form-control" placeholder="Số nhà">
                </div>

                <div class="col-md-8 form-group">
                    <input
                    type="text"
                    class="form-control address_input"
                    name="street"
                    placeholder="Địa chỉ cụ thể"
                    @isset($realty)
                    value="{{$realty->street ?? ''}}"
                    @endisset
                    >
                    @error('description')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="row">
                <div class="map-container mx-auto col-12" style="padding:20px">
                    <div id="map" style="width: 100%; height:500px"></div>
                </div>
                <input type="hidden" name="google_map_lat">
                <input type="hidden" name="google_map_lng">
            </div> --}}


            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"
                    placeholder="Nhập mô tả ...">{{$realty_post->description ?? old('description')}}</textarea>
                @error('description')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Hình ảnh nhà</label>
                @include('components.dropzone_upload', [
                    'input_name' => 'house_image',
                    'mock_file' => $house_image ?? null,
                ])
                @error('house_image')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Bản vẽ và sơ đồ</label>
                @include('components.dropzone_upload', [
                    'input_name' => 'house_design_image',
                    'mock_file' => $house_design_image ?? null,
                ])
                @error('house_design_image')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin liên hệ</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tên người dùng</label>
                    <input
                    type="text"
                    class="form-control"
                    name="contact_name"
                    placeholder="Tên người dùng"
                    @isset($realty_post)
                    value="{{$realty_post->contact_name ?? ''}}"
                    @endisset
                    >
                    @error('contact_name')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="col-md-6 form-group">
                    <label>Số điện thoại</label>
                    <input
                    type="text"
                    class="form-control"
                    name="contact_phone_number"
                    placeholder="Số điện thoại"
                    @isset($realty_post)
                    value="{{$realty_post->contact_phone_number ?? ''}}"
                    @endisset
                    >
                    @error('contact_phone_number')
                    <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Email liên hệ</label>
                <input
                type="text"
                class="form-control"
                name="contact_email"
                placeholder="Email"
                @isset($realty_post)
                value="{{$realty_post->contact_email ?? ''}}"
                @endisset
                >
                @error('contact_email')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input
                type="text"
                class="form-control"
                name="contact_address"
                placeholder="Nhập địa chỉ"
                @isset($realty_post)
                value="{{$realty_post->contact_address ?? ''}}"
                @endisset
                >
                @error('contact_address')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror

            </div>
        </div>
    </div>
</div>
<div class="col-md-3">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thao tác</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="btn-set">
                <button type="submit" name="submit" value="save" class="btn btn-info">
                    <i class="fa fa-save"></i> Lưu
                </button>
                &nbsp;
                <button type="submit" name="submit" value="apply" class="btn btn-success">
                    <i class="fa fa-check-circle"></i> Lưu &amp; Thoát
                </button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Trạng thái </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control select2 select2-info" value="" name="status" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    <option value="1" @if (isset($realty_post) && $realty_post->status == 1) selected @endif >Tin chưa duyệt</option>
                    <option value="2" @if (isset($realty_post) && $realty_post->status == 2) selected @endif >Đã thanh toán</option>
                    <option value="3" @if (isset($realty_post) && $realty_post->status == 3) selected @endif >Tin đã duyệt</option>
                    <option value="4" @if (isset($realty_post) && $realty_post->status == 4) selected @endif >Tin rác</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label mr-2 d-block" name="is_featured" for="">Tin nổi bật</label>
                <input class=""
                name="is_featured"
                type="checkbox"
                @isset($realty_post->is_featured)
                    @if ($realty_post->is_featured == 1 )
                        selected
                    @endif
                @endisset
                data-bootstrap-switch
                data-off-color="danger"
                data-on-color="success">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lịch đăng tin</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Loại tin đăng</label>
                <select class="form-control select2 select2-info" value="" name="rank" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    <option value="1" @if (isset($realty_post) && $realty_post->rank == 1) selected @endif >Tin thường</option>
                    <option value="2" @if (isset($realty_post) && $realty_post->rank == 2) selected @endif >Tin Vip</option>
                    <option value="3" @if (isset($realty_post) && $realty_post->rank == 3) selected @endif >Tin ưu đãi</option>
                    <option value="4" @if (isset($realty_post) && $realty_post->rank == 4) selected @endif >Tin Vip đặc biệt</option>
                </select>
            </div>

            <div class="form-group">
                <label class="">Ngày bắt đầu</label>
                <input
                id="date-picker"
                @isset($realty_post)
                value="{{Carbon\Carbon::parse( $realty_post->open_at)->format('d/m/Y') ?? ''}}"
                @endisset
                class="date-picker form-control"
                type="text"
                name="open_at"
                >
                @error('open_at')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="">Ngày kết thúc</label>
                <input
                id="date-picker"
                @isset($realty_post)
                value="{{Carbon\Carbon::parse( $realty_post->close_at)->format('d/m/Y') ?? ''}}"
                @endisset
                class="date-picker form-control"
                type="text"
                name="close_at"
                >
                @error('close_at')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>
</div>

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/dropzone-5.7.0/dist/dropzone.css')}}">
@endsection

@section('script')
@parent
    <script src="{{asset('template/dropzone-5.7.0/dist/dropzone.js')}}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLEMAP_KEY")}}&callback=initMap"> </script>
    <script>
        async function getPlace(url) {
            let data = await fetch(url).then(res => res.json());
            return data;
        }

        function getFullAddress(){
            $address = $('[name="street"]').val() + ',' + $('#commune option:selected').text() + ',' + $('#district option:selected').text() + ',' + $('#province option:selected').text();
            return $address;
        }

        function initMap() {
            // The location of Uluru
            @isset($realty)
            var current = {
                lat: {{$realty->google_map_lat ?? 21.027964}},
                lng: {{$realty->google_map_lng ?? 105.8510132}},
            };
            @else
            var current = {
                lat:  21.027964,
                lng: 105.8510132
            };
            @endisset


            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), { zoom: 17, center: current, optimized: true });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: current,
                map: map,
                draggable: true,
            });
            map.addListener('mouseout', function () {
                $('[name="google_map_lat"]').val(marker.getPosition().lat());
                $('[name="google_map_lng"]').val(marker.getPosition().lng());
            });

            $('.address_input').on('blur', function(e){
                var address = getFullAddress();
                changeMarker(address);
            })

            function changeMarker(address){
                let link = `/get-geo-by-name?search_string=${address}`;
                getPlace(link).then(data => {
                    geo = data.results[0].geometry.location;
                    marker.setPosition( new google.maps.LatLng( geo.lat, geo.lng ) );
                    map.panTo( new google.maps.LatLng( geo.lat, geo.lng ));
                    $('[name="google_map_lat"]').val(geo.lat);
                    $('[name="google_map_lng"]').val(geo.lng);
                });
            }
        }

        Dropzone.autoDiscover = false;
        $('#class_name').on('blur', function () {
        getSlug('online_class', $(this).val(), $('#slug'));
        });

        function getDistricts(province_code){
            url = '/get-district-of-province/' + province_code;
            return $.ajax({
                url: url,
                type: 'get',
            })
        }
        $('#province').on('change', function(){
            var province_code = $(this).val();
            var district_inputs = '<option value="">Quận/Huyện</option>';
            getDistricts(province_code)
            .done(function(data){
                data.forEach(element => {
                    district_inputs += `<option value="${element.code}">${element.name_with_type}</option>`;
                });
                $('#district').html(district_inputs);
            });
        })

        function getCommunes(district_code){
            url = '/get-commune-of-district/' + district_code;
            return $.ajax({
                url: url,
                type: 'get',
            })
        }

        $(document).on('change', "#district" , function(){
            var district_code = $(this).val();
            var commune_inputs = '<option value="">Phường/Xã</option>';
            getCommunes(district_code)
            .done(function(data){
                data.forEach(element => {
                    commune_inputs += `<option value="${element.code}">${element.name_with_type}</option>`;
                });
                $('#commune').html(commune_inputs);
            });
        })

            // get slug
        $('#title').on('blur', function () {
            getSlug('realty_post', $(this).val(), $('#slug'));
        });

    </script>
@endsection
