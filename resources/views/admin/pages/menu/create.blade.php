@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection


@section('content')
    @include('admin.partials.content_header', ['title' => 'Quản lý menu'])

    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <form action="{{route('admin.menu_category.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="menu_category" class="col-sm-2 col-form-label">Loại menu</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="menu_category" name="category_name" placeholder="Nhập loại menu">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary col-form-label">
                            <i class="fa fa-play"></i> Lưu</button>
                      </div>
                </form>

            </div>

        </div>
    </div>   

    {{-- @include('admin.pages.menu.menu_editor'); --}}
@endsection


