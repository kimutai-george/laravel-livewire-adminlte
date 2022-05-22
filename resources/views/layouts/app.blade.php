<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
  <livewire:styles />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.partials.navbar');

  <!-- Main Sidebar Container -->
@include('layouts.partials.sidebar');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script>
  $(document).ready(function(){
    toastr.options = {
      "positionClass": "toast-top-right",
      "progressBar": false,
    },

    window.addEventListener('hide-form',event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message,'Success!')
  })
  
  window.addEventListener('close-confirmation-modal',event => {
    $('#confirmatioModal').modal('hide');
    toastr.success(event.detail.message,'Success!')
  })
  })
</script>
<script>
  window.addEventListener('show-form',event => {
    $('#form').modal('show');
  })
  window.addEventListener('show-delete-form',event => {
    $('#confirmatioModal').modal('show');
  })

</script>
<livewire:scripts />
</body>
</html>
