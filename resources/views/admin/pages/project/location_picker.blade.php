@section('css')
@parent
<style>
    .place-search-result{
        max-height: 300px;
        overflow-y: scroll;
    }
    .place-select{
        cursor: pointer;
    }
</style>
@endsection
<div class="row">
    <div class="col-12"><label>Địa chỉ BĐS</label></div>
    <div class="col-md-4 form-group">
        <select class="form-control address_input @error('province_code') is-invalid @enderror" name="province_code" id="province">
            <option value="">Tỉnh/Thành phố</option>
            @foreach ($provinces as $province)
            <option
            @if (isset($project) && $province->code == $project->province_code) selected @endif
            value="{{$province->code}}">{{$province->name_with_type}}</option>
            @endforeach
        </select>
        @error('province_code')
        <div id="" class="error invalid-feedback d-block">
                {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <select
        class="form-control address_input @error('district_code') is-invalid @enderror"
        name="district_code" id="district"
        >
            <option value="">Huyện/Thị xã</option>
            @isset($districts)
                @foreach ($districts as $district)
                <option
                @if ($district->code == $project->district_code) selected @endif
                value="{{$district->code}}">{{$district->name_with_type}}</option>
                @endforeach
            @endisset
        </select>
        @error('district_code')
        <div id="" class="error invalid-feedback d-block">
                {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <select class="form-control address_input @error('commune_code') is-invalid @enderror" name="commune_code" id="commune"
        >
            <option value="">Phường/Xã</option>
            @isset($communes)
            @foreach ($communes as $commune)
            <option
            @if ($commune->code == $project->commune_code) selected @endif
            value="{{$commune->code}}">{{$commune->name_with_type}}</option>
            @endforeach
            @endisset
        </select>
        @error('commune_code')
        <div id="" class="error invalid-feedback d-block">
                {{$message}}
        </div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-8 form-group" style="position: relative; z-index:1000">
        <input
        autocomplete="none"
        type="text"
        id="street"
        class="form-control address_input"
        name="street"
        placeholder="Địa chỉ cụ thể"
        @isset($project)
        value="{{$project->street ?? ''}}"
        @endisset
        >
        @error('description')
        <div id="" class="error invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror
        <ul class="place-search-result list-group" style="display: none; position:absolute; width:100%">
        </ul>
    </div>
</div>

@section('script')
@parent
<script defer src="https://maps.googleapis.com/maps/api/js?key={{config('api_keys.google_map')}}&callback=initMap"> </script>
    <script>
        async function getPlace(url) {
            let data = await fetch(url).then(res => res.json());
            return data;
        }

        function getFullAddress(){
            var address = $('[name="street"]').val() + ',' + $('#commune option:selected').text() + ',' + $('#district option:selected').text() + ',' + $('#province option:selected').text();
            address = address.replace('Phường/Xã', '');
            address = address.replace('Quận/Huyện', '');
            address = address.replace(/,+/g, ',');
            return address;
        }

        function setSelect(ggMapData){
            console.log(ggMapData);
            var places = '';
            ggMapData.results.forEach(element => {
                places += `<li class="place-select list-group-item p-2" data-name="${element.name}">${element.name}</li>`;
            });
            $('.place-search-result').html(places);
        }

        function initMap() {
            // The location of Uluru
            @isset($project)
            var current = {
                lat: {{$project->google_map_lat ?? 21.027964}},
                lng: {{$project->google_map_lng ?? 105.8510132}},
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
                let link = `/get-geo-by-name?search_string=${address}`
                getPlace(link).then(data => {
                    geo = data.results[0].geometry.location;
                    marker.setPosition( new google.maps.LatLng( geo.lat, geo.lng));
                    map.panTo( new google.maps.LatLng( geo.lat, geo.lng ));
                    $('[name="google_map_lat"]').val(geo.lat);
                    $('[name="google_map_lng"]').val(geo.lng);
                });
            }
            var search;

            $('#street').on('input', function(e){
                var address = getFullAddress();
                let link = `/get-geo-by-name?search_string=${address}`;
                clearTimeout(search);
                search = setTimeout(function(){
                        var list_place = getPlace(link).then(data => {
                        setSelect(data);
                    });
                }, 300);
            })

            $('#street').on('blur', function(e) {
                setTimeout(function(){
                    $('.place-search-result').hide();
                }, 500)
            })

            $('#street').on('focus', function(e) {
                $('.place-search-result').show();
            })

            $(document).on('click', '.place-select', function(e){
                $('#street').val($(this).text());
            });
        }

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
                $('#commune').html('<option value="">Phường/Xã</option>');

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
    </script>
@endsection
