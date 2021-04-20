<div class="input-group file-btn-wraper">
    <input placeholder="Có thể dán link ngoài hoặc duyệt từ máy chủ" type="text" name="{{$input_name}}" value="{{$current_input}}" class="form-field form-control stand-alone-input @error($input_name) is-invalid @enderror">
    <span class="input-group-btn">
        <a id="{{$id}}" 
        data-input="thumbnail" 
        data-preview="holder"
        class="d-block"
        >
            <button class="btn btn-secondary" type="button" class="p-1 d-block btn btn-link text-red mx-auto">Duyệt máy chủ</button>
        </a>
    </span>
</div>

@section('script')
@parent
<script>
    fileInput("{{$id}}", 'file', { prefix: '/admin/laravel-filemanager' });
</script>
@endsection
