{{-- Need add under script of sweetaleart2 --}}
<!--message-->
@if(session()->has('success'))

<script type="text/javascript">
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
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
<script type="text/javascript">
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
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
<script type="text/javascript">
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
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
