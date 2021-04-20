<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Danh sách ngân hàng</h5>
        <button type="button" class="bankSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body bank">
        <div class="bank-list">
            @php
                $banks = json_decode($web_config['bank']) ;
            @endphp
            @foreach ($banks as $bank)
            <div class="card bank-wraper">
                <div class="card-header">
                    <h3 class="card-title">{{$bank->bank_name ?? ''}}</h3>
                    <div class="card-tools m-0">
                        <button type="button" class="btn btn-tool text-danger bank-remove" ><i
                            class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bank-group row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Tên công ty" class="control-label">Tên ngân hàng</label>
                                    <input
                                    class="form-field form-control bank-name"
                                    placeholder="Site title"
                                    data-counter="255"
                                    name="bank_name"
                                    value="{{$bank->bank_name ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Tên công ty" class="control-label">Số tài khoản</label>
                                    <input
                                    class="form-field form-control bank-account"
                                    placeholder="Site title"
                                    data-counter="255"
                                      name="bank_account"
                                    value="{{$bank->bank_account ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    id="Tên công ty"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="chu_tai_khoan" class="control-label">Chủ tài khoản</label>
                                    <input
                                    class="form-field form-control bank-owner"
                                    placeholder="Site title"
                                    data-counter="255"
                                    name="bank_owner"
                                    value="{{$bank->bank_owner ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    id="chu_tai_khoan"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="chu_tai_khoan" class="control-label">Chi nhánh</label>
                                    <input
                                    class="form-field form-control branch"
                                    placeholder="Site title"
                                    data-counter="255"
                                    name="bank_branch"
                                    value="{{$bank->bank_branch ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    id="chu_tai_khoan"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="chu_tai_khoan" class="control-label">Số điện thoại</label>
                                    <input
                                    class="form-field form-control owner-phone"
                                    placeholder="Site title"
                                    data-counter="255"
                                    name="owner_phone"
                                    value="{{$bank->owner_phone ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    id="chu_tai_khoan"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="chu_tai_khoan" class="control-label">Email liên hệ</label>
                                    <input
                                    class="form-field form-control owner"
                                    placeholder="Site title"
                                    data-counter="255"
                                    name="owner_email"
                                    value="{{$bank->owner_email ?? ''}}"
                                    type="text"
                                    value="Botble Technologies"
                                    id="chu_tai_khoan"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ảnh ngân hàng</label>
                            @include('admin.components.button_file_manager', ['id' => $bank->bank_account ?? '',
                                'input_name' => 'bank_avatar',
                                'current_input' => $bank->bank_avatar ?? ''
                            ])
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <button type="button" class="addBank ml-auto btn btn-info float-right p-1">Thêm ngân hàng</button>
    </div>
    <!-- /.card -->
</div>

@section('script')
    <script>
        function createImageManager(name){
            var id = Math.floor(Math.random() * 10000000);
            var element =  `
            <div class="input-group file-btn-wraper">
                <input type="hidden" name="${name}" value="" class="form-field stand-alone-input">
                <div class="image-holder">

                </div>
                <span class="input-group-btn">
                    <a id="${id}"
                    data-input="thumbnail"
                    data-preview="holder"
                    class="d-block"
                    style=" border: 1px dashed gray;">
                        <img style="height:8rem; width:8rem; cursor: pointer;" src="{{asset('/images/placeholder.png')}}">
                        <button type="button" class="p-1 d-block btn btn-link text-red mx-auto">Thêm mới</button>
                    </a>
                </span>
            </div>
            `;

            return {
                element: element,
                id: id,
            };
        }

        function getBankList(){
            var bank_list = [];
            $('.bank-group').each(function(){
                var bank_name = $(this).find('[name=bank_name]')[0].value;
                var bank_account = $(this).find('[name=bank_account]')[0].value;
                var bank_owner = $(this).find('[name=bank_owner]')[0].value;
                var bank_branch = $(this).find('[name=bank_branch]')[0].value;
                var owner_phone = $(this).find('[name=owner_phone]')[0].value;
                var owner_email = $(this).find('[name=owner_email]')[0].value;
                var bank_avatar = $(this).find('[name=bank_avatar]')[0].value;

                bank_list.push({
                    bank_name: bank_name,
                    bank_account: bank_account,
                    bank_owner: bank_owner,
                    bank_branch: bank_branch,
                    owner_phone: owner_phone,
                    owner_email: owner_email,
                    bank_avatar: bank_avatar,

                })
            })

            return bank_list;
        }

        function addBank(){
            var newImageManage = createImageManager('bank_avatar');
            var emptyBank = `
            <div class="card bank-wraper">
                <div class="card-header">
                    <h3 class="card-title">Ngân hàng mới</h3>
                    <div class="card-tools m-0">
                        <button type="button" class="btn btn-tool text-danger bank-remove"><i
                            class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bank-group row">
                    <div class="col-md-7 row">
                        <div class="form-group col-md-6">
                            <label for="Tên công ty" class="control-label">Tên ngân hàng</label>
                            <input
                            class="form-field form-control bank-name"
                            placeholder="Site title"
                            data-counter="255"
                            name="bank_name"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Tên công ty" class="control-label">Số tài khoản</label>
                            <input
                            class="form-field form-control bank-account"
                            placeholder="Site title"
                            data-counter="255"
                            name="bank_account"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            id="Tên công ty"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chu_tai_khoan" class="control-label">Chủ tài khoản</label>
                            <input
                            class="form-field form-control bank-owner"
                            placeholder="Site title"
                            data-counter="255"
                            name="bank_owner"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            id="chu_tai_khoan"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chu_tai_khoan" class="control-label">Chi nhánh</label>
                            <input
                            class="form-field form-control branch"
                            placeholder="Site title"
                            data-counter="255"
                            name="bank_branch"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            id="chu_tai_khoan"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chu_tai_khoan" class="control-label">Số điện thoại liên hệ</label>
                            <input
                            class="form-field form-control owner-phone"
                            placeholder="Site title"
                            data-counter="255"
                            name="owner_phone"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            id="chu_tai_khoan"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chu_tai_khoan" class="control-label">Email liên hệ</label>
                            <input
                            class="form-field form-control owner"
                            placeholder="Site title"
                            data-counter="255"
                            name="owner_email"
                            value=""
                            type="text"
                            value="Botble Technologies"
                            id="chu_tai_khoan"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="control-label">Ảnh ngân hàng</label>
                        ${newImageManage.element}
                    </div>
                </div>
                </div>
            </div>
            `;
            $('.bank-list').append(emptyBank);
            lfm(newImageManage.id, 'image', { prefix: '/admin/laravel-filemanager' });
        }


        $('.bankSave').on('click', function(e){
            e.preventDefault();
            var bankList = getBankList();
            data =  {
                bank: bankList,
            }
            storeData(data);
        })

        $('.addBank').on('click', function(e){
            e.preventDefault();
            addBank();
        })

        $(document).on('click', '.bank-remove', function(){
            $(this).closest('.bank-wraper').remove();
        })

    </script>
@endsection




