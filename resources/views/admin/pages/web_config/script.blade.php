<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
<script>
</script>
<script>
    var formData = {};
    function loadEditField(key, value){
        formData[key] = value;
    }

    $('.form-field').on('change', function(){
        loadEditField($(this).attr('name'), $(this).val());
    });

    CKEDITOR.on('instanceReady', function(event) {
        var editor = event.editor;

        editor.on('change', function(event) {
            var name = this.name;
            var content = this.getData();
            loadEditField(name, content);
        });
    });

    $('.btnSave').on('click', function(){
        console.log(formData);
        storeData(formData);
        formData = {};
    })
</script>
