<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    {!! Html::style('admin/assets/css/bootstrap.min.css') !!}
    {!! Html::style('admin/assets/css/now-ui-dashboard.css?v=1.1.0') !!}
    {!! Html::style('css/custom.css') !!}
</head>
<body>
    <div class="wrapper">
        @include('admin.share.sidebar')
        <div class="main-panel">
            @include('admin.share.navbar')

            <div class="panel-header panel-header-sm">
            </div>
            @yield('content')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../"></script>
    {!! Html::script('admin/assets/js/core/jquery.min.js') !!}
    {!! Html::script('admin/assets/js/core/popper.min.js') !!}
    {!! Html::script('admin/assets/js/core/bootstrap.min.js') !!}
    {!! Html::script('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') !!}
    <!--  Notifications Plugin    -->
    {!! Html::script('admin/assets/js/plugins/bootstrap-notify.js') !!}
    
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    {!! Html::script('admin/assets/js/now-ui-dashboard.min.js?v=1.1.0') !!}

    <script>
    
            @include('admin.share.notification')
    </script>
   
  </body>
</html>


      