{{-- Need add under script of sweetaleart2 --}}
<!--message-->


@section('script')
@parent
<script>
    function swalAlert(message, type = 'success'){
        const Toast = Swal.mixin({
            showConfirmButton: false,
            timer: 3000,
        });

        Toast.fire({
            type: type,
            icon: type,
            title: message,
        })
    }
</script>

@if (session()->has('reset_status'))
    @parent
    <script>
        swalAlert('Cập nhật thành công mật khẩu mới');
    </script>
@endif

@if(session()->has('success'))
@parent

<script type="text/javascript">
  const Toast = Swal.mixin({
    showConfirmButton: false,
    timer: 3000,
  });

  Toast.fire({
    type: 'success',
    icon: 'success',
    title: '{!! session()->get('success') !!}'
  })
</script>
@endif

@if(session()->has('error'))
@parent

<script type="text/javascript">
  const Toast = Swal.mixin({
    showConfirmButton: false,
    timer: 3000
  });

  Toast.fire({
    type: 'error',
    icon: 'error',
    title: '{!! session()->get('error') !!}'
  })
</script>
@endif

@if(session()->has('warning'))
@parent

<script type="text/javascript">
  const Toast = Swal.mixin({
    showConfirmButton: false,
    timer: 3000
  });

  Toast.fire({
    type: 'warning',
    icon: 'warning',
    title: '{!! session()->get('warning') !!}'
  })

  //===============Toast function================//

</script>
@endif

@endsection
