<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#70B125">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url(mix('css/styles.css'))}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Google Tag Manager --> <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-W5559GK');</script> <!-- End Google Tag Manager -->
    <script>
        var https = '{{url('/')}}';
        var imageURL_2 = '{{url('/img/logo2.png')}}';
        var idLogin_service = 0;
        var login_go_service = 0;
    </script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p .parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjsconnected/js/users/c0bd22b867ba677efb77f42dd/98f9b71e8e459da8a851b0291.js");</script>
</head>
<body>
<!-- Google Tag Manager (noscript) --> <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5559GK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> <!-- End Google Tag Manager (noscript) -->
<section class="content">
    @include('components.header')

    @yield('content')

    @include('components.loginModal',[
      'banners_value'=>$banners_value
    ])

    @include('components.footer')
</section>

<script src="https://www.google.com/recaptcha/api.js?render=6LeaIIkkAAAAALppbcYBsDBy5YsYI50NwTn5NF0o"></script>
<script type="text/javascript" src="{{url(mix('js/app.js'))}}"></script>
@yield('script')
</body>
</html>
