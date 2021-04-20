<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Cấu hình trung tâm Email</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label for="watermark_opacity" class="control-label" value="top-right">Mailer</label><small
                class="float-md-right charcounter">Mặc định smtp</small>
            @php
                $list_mailer = [
                    'smtp' => 'SMTP',
                ]
            @endphp
            <select name="mail_mailer" class="form-control form-field" id="">
                @foreach ($list_mailer as $index => $name)
                <option
                @isset ($webconfig['mail_mailer'])
                    @if ($webconfig['mail_mailer'] == $index)
                    selected
                    @endif
                @endisset value="{{$index}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group ">
            <label for="mail_host" class="control-label">Host</label>
            <input
            class="form-field form-control"
            placeholder="Host"
            data-counter="255"
            name="mail_host"
            type="text"
            value="{{$web_config['mail_host'] ?? ''}}"
            id="mail_host">
        </div>

        <div class="form-group ">
            <label for="mail_port" class="control-label">Mail port</label>
            <input
            class="form-field form-control"
            placeholder="Mail port"
            data-counter="255"
            name="mail_port"
            type="number"
            value="{{$web_config['mail_port'] ?? ''}}"
            id="mail_port">
        </div>

        <div class="form-group ">
            <label for="mail_username" class="control-label">Mail username</label>
            <input
            class="form-field form-control"
            placeholder="Mail username"
            data-counter="255"
            name="mail_username"
            type="text"
            value="{{$web_config['mail_username'] ?? ''}}"
            id="mail_username">
        </div>

        <div class="form-group ">
            <label for="mail_password" class="control-label">Mail app password</label>
            <input
            class="form-field form-control"
            placeholder="Mail app password"
            data-counter="255"
            name="mail_password"
            type="text"
            value="{{$web_config['mail_password'] ?? ''}}"
            id="mail_password">
        </div>

        <div class="form-mail_from_address form-group">
            <label for="watermark_opacity" class="control-label" value="top-right">Encription</label><small
                class="float-md-right charcounter">Mặc định tls</small>
            @php
                $list_mailer = [
                    'tls' => 'TLS',
                    'SSL' => 'SSL'
                ]
            @endphp
            <select name="mail_from_address" class="form-control form-field" id="mail_from_address">
                @foreach ($list_mailer as $index => $name)
                <option
                @isset ($webconfig['mail_from_address'])
                    @if ($webconfig['mail_from_address'] == $index)
                    selected
                    @endif
                @endisset value="{{$index}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group ">
            <label for="mail_from_address" class="control-label">Mail from address</label>
            <input
            class="form-field form-control"
            placeholder="Mail from address"
            data-counter="255"
            name="mail_from_address"
            type="text"
            value="{{$web_config['mail_from_address'] ?? ''}}"
            id="mail_from_address">
        </div>

        <div class="form-group ">
            <label for="mail_from_name" class="control-label">Mail from name</label>
            <input
            class="form-field form-control"
            placeholder="Mail from name"
            data-counter="255"
            name="mail_from_name"
            type="text"
            value="{{$web_config['mail_from_name'] ?? ''}}"
            id="mail_from_name">
        </div>
    <!-- /.card -->
    </div>
</div>
