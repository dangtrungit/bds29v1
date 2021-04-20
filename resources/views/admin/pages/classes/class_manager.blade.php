<div class="col-md-9">
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Lịch học</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success update-schedule">Cập nhật lịch học</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.class.update_schedule', $class->id)}}" class="lecture-schedule-form" method="post">
                @foreach ($class->courses as $course)
                    @foreach ($course->course_terms as $course_term)
                    <div class="card">
                        <!-- Nội dung học phần -->
                        <div class="card-header handle">
                            <h3 class="card-title">{{$course_term->name}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="lecture-list p-0">
                                    @csrf
                                    @foreach ($course_term->lectures as $lecture)
                                    <li class="form-row border-bottom lecture-shedule" data-lecture-id="{{$lecture->id}}">
                                        <span class="text col-7">{{$lecture->title}}</span>
                                        <div class="col">
                                            <label for="">Từ: </label>
                                            <input style="border:none; outline: none" 
                                            class="date-picker" 
                                            type="text" 
                                            name="schedule[{{$lecture->id}}][start_at]"
                                            @php
                                                $start_at = $times->where('lecture_id', $lecture->id)->first()->start_at ?? '';
                                            @endphp
                                            value="@isset($class)
                                            {{Carbon\Carbon::parse($start_at)->format('H:i d/m/Y')}}
                                            @endisset"
                                            >
                                        </div>  
                                        <div class="col">
                                            <label for="">Đến: </label>
                                            <input style="border:none; outline: none" 
                                            class="date-picker" 
                                            type="text" 
                                            name="schedule[{{$lecture->id}}][end_at]"
                                            @php
                                                $end_at = $times->where('lecture_id', $lecture->id)->first()->end_at ?? '';
                                            @endphp
                                            value="@isset($class)
                                            {{Carbon\Carbon::parse( $end_at)->format('H:i d/m/Y')}}
                                            @endisset"
                                            >
                                        </div>                      
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </form>

        </div>
    </div>
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Danh sách học viên</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="students-table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên</th>
                      <th>Email</th>
                      <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($class->students as $index => $student)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>
                            
                        </td>
                    </tr>    
                    @endforeach
                    
                  </tbody>
            </table>
        </div>
    </div>

    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Video lớp học</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success btn-new-video" data-toggle="modal" data-target="#media_model">Thêm mới</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Tiêu đề video</th>
                    <th>Link</th>
                    <th style="width: 150px">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($class->getMediaByType('video', 'class_video') as $index => $item)
                      <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$item->title}}</td>
                          <td>{{$item->link}}</td>
                          <td>
                            <span style="cursor:pointer" href="{{route('admin.media.edit', $item->id)}}" class="btn-edit-video text-success mr-2"><i class="fas fa-edit"></i></span>
                            <span style="cursor:pointer" href="{{route('admin.media.destroy', $item->id)}}" class="btn-destroy-video text-danger"><i class="fas fa-trash"></i></span>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

    </div>
</div>
<div class="col-md-3"></div>

<div class="modal fade" id="media_model" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Thêm mới video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="course_id" value="">

        <div class="form-group">
            <label for="course_term_name">Tiêu đề video (<span class="text-red">*</span>)</label>
            <input 
            name="video_title" 
            type="text" 
            class="form-control" 
            id="video_title" 
            placeholder="Nhập tiêu đề"
            >
        </div>



        <div class="form-group">
            <label for="video_link">Link (<span class="text-red">*</span>)</label>
            @include('admin.components.button_link_manager', ['id' => 'video_link', 
                    'input_name' => 'video_link',
                    'current_input' => ''
                ])
        </div>

        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea name="description" id="description" class="form-control" rows="3"
                placeholder="Nhập mô tả ..."></textarea>
        </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button 
        data-href="" 
        data-model-id="{{$model->id ?? ''}}" 
        type="button" 
        class="btn btn-primary btn-save-video">Lưu</button>
        </div>
    </div>
    </div>
</div>
@section('script')
    @parent
    <script>
        $("#students-table").dataTable({
            responsive: true,
            autoWidth:false,
            columns: [
                    { 'width': '10px'},
                    { 'width': '200px'},
                    {  },
                    { 'width': '80px' },
                ],
        });
        $('.update-schedule').on('click', function(){
            $('.lecture-schedule-form').trigger('submit');
        });
        
         //course term logic
        function saveVideo(url, object) {

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    model: object.model,
                    model_id: object.model_id,
                    link: object.link,
                    title: object.title,
                    description: object.description,
                    file_type: object.file_type,
                    type: object.type
                },
                success: function () {
                    location.reload();
                    swalToast('Cập nhật thành công');
                }
            })
        }
    
        function cleanForm(){
            $('#video_title').val('');
            $('#description').val('');
            $('[name="video_link"]').val('');
        }

        $('.btn-save-video').on('click', function () {
            var url = $(this).data('href');
            var model_id = $(this).data('model-id');
            var model = "App\\Models\\OnlineClass";
            var title = $('#video_title').val();
            var description = $('#description').val();
            var link = $('[name="video_link"]').val();

            saveVideo(url, {
                model: model,
                model_id: {{$class->id}},
                link: link,
                title: title,
                description: description,
                file_type: 'video',
                type: 'class_video'
            });

            $('#courseModal').modal('hide');
        })
    
        $('.btn-new-video').on('click', function () {
            cleanForm();
            $('.btn-save-video').data('href', "{{route('admin.media.store')}}");
        })
    
        function getMedia(href) {
            $.ajax({
                url: href,
                type: 'get',
                success: function (data) {
                    $('#video_title').val(data.media.title);
                    $('#description').val(data.media.description);
                    $('#video_link').val(data.media.link);
                    $('#media_model').modal('show');
                },
                error: function (err) {
                    swalToast('Không tìm thấy video!', 'error');
                }
            })
        }
    
        $(document).on('click', '.btn-edit-video', function () {
            var url = $(this).attr('href');
            getMedia(url);
            $('.btn-save-video').data('href', url);
        });
    
        $(document).on('click', '.btn-destroy-video', function (e) {
            var url = $(this).attr('href');
            Swal.fire({
                title: 'Xóa học phần này?',
                text: "Bạn không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vẫn xóa!',
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        success: function (data) {
                            if (data.error) {
                                swalToast(data.error, 'error');
                            }
                            if (data.msg) {
                                swalToast(data.msg);
                                location.reload();
                            }
                        },
                        error: function (errors) {
                            if (errors.status == 403) {
                                return swalToast('Bạn không có quyền truy cập', 'error');
                            }
                            swalToast('Lỗi không rõ phát sinh trong quá trình xóa', 'error');
                        }
                    });
                }
            });
        })
    

    </script>
@endsection