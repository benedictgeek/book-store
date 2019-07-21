<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/color.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/color-purple.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/frontend_css/form-validation.css')}}"> -->
    <script src="{{asset('js/frontend_js/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    
</head>
<body class="tg-home tg-homeone">
    <div id="app">
        <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
            @include('layouts.siteLayout.siteheader')
            
            @yield('content')
            
            @include('layouts.siteLayout.sitefooter')  
        </div>
    </div>
    <script src="/js/app.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
    <script src="{{asset('js/frontend_js/jquery-library.js')}}"></script>
    <script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.vide.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/countdown.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/frontend_js/parallax.js')}}"></script>
    <script src="{{asset('js/frontend_js/countTo.js')}}"></script>
    <script src="{{asset('js/frontend_js/appear.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/frontend_js/form-validation.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="{{asset('js/frontend_js/main.js')}}"></script>
    
    <script>
        $(".rateYo").each(function() {
            $(this).rateYo({
                rating : $(this).attr("rel"),
                starWidth : "15px",
                ratedFill: "#fcd01e",
                readOnly: true,
                normalFill: "#d8d8d8"
            });
        });
    </script>
</body>
</html>
