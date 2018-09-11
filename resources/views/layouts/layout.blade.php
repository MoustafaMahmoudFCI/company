<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Corlate</title>
        
        <!-- core CSS -->
        {!! Html::style('website/css/bootstrap.min.css') !!}
        {!! Html::style('website/css/font-awesome.min.css') !!}
        {!! Html::style('website/css/animate.min.css') !!}
        {!! Html::style('website/css/prettyPhoto.css') !!}
        {!! Html::style('website/css/main.css') !!}
        {!! Html::style('website/css/responsive.css') !!}
        <link rel="stylesheet" href="{{ url('/')}}/website/css/main_{{ LaravelLocalization::getCurrentLocale() }}.css ">        
        <!--[if lt IE 9]>
        {!! Html::script('website/js/html5shiv.js') !!}
        {!! Html::script('website/js/respond.min.js') !!} 
        <![endif]-->       
        <link rel="shortcut icon" href="{{ asset('website/images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('website/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('website/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('website/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('website/images/ico/apple-touch-icon-57-precomposed.png') }}">
    </head><!--/head--> 
<body>
    @include('inc.header') <!-- top bar &  navbar -->
         @yield('content') <!-- body -->
    @include('inc.footer') <!-- bottom & footer -->
   
    {!! Html::script('website/js/jquery.js') !!}
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.prettyPhoto.js') !!}
    {!! Html::script('website/js/jquery.isotope.min.js') !!}
    {!! Html::script('website/js/main.js') !!}
    {!! Html::script('website/js/wow.min.js') !!}
   
</body>
</html>
