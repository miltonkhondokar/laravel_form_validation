<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SALES</title>

  <!-- Header -->
   @include('admin.common.header')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- @include('admin.common.pre-loader') --}}


  <!-- Navbar -->
  @include('admin.common.navbar')


  <!-- Main Sidebar Container -->
  @include('admin.common.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- breadcrumb -->
    @include('admin.common.breadcrumb')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">




            @yield('content')



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  @include('admin.common.footer')
</div>
<!-- ./wrapper -->

<!-- footer js -->
@include('admin.common.footer-js')
</body>
</html>
