@section('css')
    @parent
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="{{asset('template/menu-manage/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')}} ">
    <link rel="stylesheet" href="{{asset('template/menu-manage/nestable2/nestable.min.css')}} ">
    <style>
        .item-edit{
            cursor: pointer;
        }
    </style>
@endsection


<div class="row p-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form action="{{route('admin.menu_category.update', $category->id)}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-8">
                          <input type="text" class="form-control border-0" id="menu_category" name="category_name" placeholder="Nhập loại menu" value="{{$category->name}}">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary col-form-label">
                            <i class="fa fa-play"></i> Lưu</button>
                      </div>
                </form>
            </div>
            <div class="card-body row">
                {{-- nestable here --}}
                <div  id="menuTree" class="dd col-md-7">
                    <ol class='dd-list dd3-list'>
                    </ol>
                </div>

                <div class="col-md-5">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">Edit item</div>
                        <div class="card-body">
                            <form id="frmEdit" class="form-horizontal">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="title" id="title"
                                            placeholder="Title">
                                        <div class="input-group-append">
                                            <button type="button" role="iconpicker" name="icon" id="myEditor_icon"
                                                class="btn btn-outline-secondary"></button>
                                        </div>
                                    </div>
                                    {{-- <input type="hidden" name="icon" class="item-menu"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="href">URL</label>
                                    <input type="text" class="form-control item-menu" id="href" name="href"
                                        placeholder="URL">
                                </div>
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <input type="text" name="text" class="form-control item-menu" id="text"
                                        placeholder="text">
                                </div>
                                <div class="form-group">
                                    <label for="html">HTML</label>
                                    <input type="text" name="html" class="form-control item-menu" id="html"
                                        placeholder="HTML">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i
                                    class="fas fa-sync-alt"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i>
                                Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('template/menu-manage/nestable2/nestable.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/menu-manage/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/menu-manage/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script>
    <script>
    
    var listMenu = {!!$menu_list!!};
    if(listMenu.length !== 0){
        renderMenu(listMenu);
    }

    function addItem(formData){
        var menuCategory = {{$category->id}};
        $.ajax({
            url: "{{route('admin.menu.store')}}" + `?${formData}`,
            type: 'post',
            data: {
                category: menuCategory,
            },
            success: function(data){
                swalToast('Thêm mới thành công!');
                renderMenu(JSON.parse(data.menus));
            },
            error: function(err){
                swalToast('Lỗi trong quá trình thêm mới!', 'error');
            }
        })  
    }

    function updateItem(formData){
        var menuCategory = {{$category->id}};
        $.ajax({
            url: "{{route('admin.menu.update')}}" + `?${formData}`,
            type: 'post',
            data: {
                category: menuCategory,
            },
            success: function(data){
                swalToast('Sửa thành công!');
                renderMenu(JSON.parse(data.menus));
            },
            error: function(err){
                swalToast('Lỗi trong quá trình thêm mới!', 'error');
            }
        })  
    }

    function removeItem(id){
        var menuCategory = {{$category->id}};
        $.ajax({
            url: "{{route('admin.menu.destroy')}}" ,
            type: 'post',
            data: {
                id: id,
                category: menuCategory,
            },
            success: function(data){
                swalToast('Xóa thành công!');
                renderMenu(JSON.parse(data.menus));
            },
            error: function(err){
                swalToast('Lỗi trong quá trình thêm mới!', 'error');
            }
        })  
    }
 
    function buildItem(item) {
        var html = `<li 
        class='dd-item' 
        data-html='${item.html}' 
        data-href='${item.href}' 
        data-target='${item.target}' 
        data-text='${item.text}' 
        data-id='${item.id}' 
        data-title='${item.title}' 
        data-icon='${item.icon}'
        >`;
        html += `<div class='dd-handle'>
            ${item.title}
            <span class="dd-nodrag item-destroy text-danger float-right"><i class="fas fa-trash"></i></span>
            <span class="dd-nodrag item-edit text-success float-right mr-2"><i class="fas fa-edit"></i></span>
            </div>`;

        if (item.children) {
            html += "<ol class='dd-list'>";
            $.each(item.children, function (index, sub) {
                html += buildItem(sub);
            });
            html += "</ol>";
        }
        html += "</li>";
        return html;
    }

    function renderMenu(data){
        output = '';
        $.each(data, function (index, item) {
            output += buildItem(item);
        });
        $('.dd3-list').html(output);
        $('#menuTree').nestable();

    }

    $('#btnAdd').on('click', function(){
        var formData = $('#frmEdit').serialize();
        console.log(formData);
        addItem(formData);
        $("#frmEdit").trigger('reset');
        resetForm();
        $('#frmEdit input[name="id"]').trigger('change');
    });

    $('#btnUpdate').on('click', function(){
        var formData = $('#frmEdit').serialize();
        updateItem(formData);
        resetForm();
        $('#frmEdit input[name="id"]').trigger('change');
    });

    $(document).on('change', 'input[name="id"]', function(){
        if($(this).val() != '' ){
            $('#btnUpdate').prop('disabled', false);
        }else{
            $('#btnUpdate').prop('disabled', true);
        }
    })

    function saveTree(data){
        $.ajax({
            type: 'post',
            url: "{{route('admin.menu.save_tree')}}",
            data: {
                jsonData:data,
            },
        }).done(function (result) {
            console.log(result);
            swalToast('Thành công');
        }).fail(function(){
            swalToast('Lỗi', 'error');
        })
    }

    $(document).on("click",".item-edit",function() {
        var item = $(this).closest('li');
        var data =item.data();
        $('#frmEdit input[name="title"]').val(data.title);
        $('#frmEdit input[name="text"]').val(data.text);
        $('#frmEdit input[name="icon"]').val(data.icon);
        $('#frmEdit input[name="target"]').val(data.target);
        $('#frmEdit input[name="html"]').val(data.html);
        $('#frmEdit input[name="id"]').val(data.id);
        $('#frmEdit input[name="href"]').val(data.href);
        $('#frmEdit input[name="id"]').trigger('change');
    });

    $(document).on("click",".item-destroy",function() {
        var item = $(this).closest('li');
        var data =item.data();
        removeItem(data.id);
    });

    $('#menuTree').on('change', function() {
        var data = $('#menuTree').nestable('serialize');
        saveTree(data);
    });

    function resetForm(){
        $('#frmEdit input[name="title"]').val('');
        $('#frmEdit input[name="text"]').val('');
        $('#frmEdit input[name="icon"]').val('');
        $('#frmEdit input[name="target"]').val('');
        $('#frmEdit input[name="html"]').val('');
        $('#frmEdit input[name="id"]').val('');
        $('#frmEdit input[name="href"]').val('');
    }
    </script>
@endsection