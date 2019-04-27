<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
    <title>{{$setting->sitename}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="/main/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/main/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/main/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/main/revolution/css/navigation.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/main/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/main/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/main/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/main/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/main/css/dark-color.css">
    <link rel="stylesheet" type="text/css" href="/main/css/style.css">
    <link rel="stylesheet" type="text/css" href="/main/css/responsive.css">
    @yield('css')
</head>

<body>

<div class="page-loading">
    <div class="thecube">
        <div class="cube c1"></div>
        <div class="cube c2"></div>
        <div class="cube c4"></div>
        <div class="cube c3"></div>
    </div>
</div>

<!--page-loading end-->
<div class="wrapper">
    //Header ve Mobil Menu
   @include('main.include.header')

    @if(request()->route()->getName()=='home.page')
        @include('main.include.slider')
    @endif

    <main>
        @yield('content')

    </main>

   @include('main.include.footer')

</div>



<script type="text/javascript" src="/main/js/jquery.min.js"></script>
<script type="text/javascript" src="/main/js/popper.js"></script>
<script type="text/javascript" src="/main/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/main/lib/slick/slick.js"></script>
<script type="text/javascript" src="/main/js/html5lightbox.js"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="/main/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script type="text/javascript" src="/main/revolution/js/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="/main/revolution/js/revolution.initialize2.js"></script>

<script type="text/javascript" src="/main/js/script.js"></script>
@yield('js')
</body>

</html>