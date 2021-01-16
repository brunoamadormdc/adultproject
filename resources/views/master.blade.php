<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste</title>

        <!-- Fonts -->
        
       
        <link rel="stylesheet" href="{!! asset('betube/css/app.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/font-awesome.min.css') !!}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{!! asset('betube/layerslider/css/layerslider.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/owl.theme.default.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/jquery.kyco.easyshare.css') !!}">
    <link rel="stylesheet" href="{!! asset('betube/css/responsive.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/css.css') !!}">
        <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js'></script>      
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery(".owl-carousel").owlCarousel({
        items:3,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
  });
});
       </script>
     
    </head>
    <body>
        <div class="off-canvas-wrapper">
            <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
               @include('header-responsive')
               <div class="off-canvas-content" data-off-canvas-content>
                @yield('header')
        @yield('conteudo')
        @yield('footer')
    </div>
            </div>
        </div>
    </body>
    <script src="{!! asset('betube/bower_components/jquery/dist/jquery.js')!!}"></script>
<script src="{!! asset('betube/bower_components/what-input/what-input.js')!!}"></script>
<script src="{!! asset('betube/bower_components/foundation-sites/dist/foundation.js')!!}"></script>
<script src="{!! asset('betube/js/jquery.showmore.src.js')!!}" type="text/javascript"></script>
<script src="{!! asset('betube/js/app.js')!!}"></script>
<script src="{!! asset('betube/layerslider/js/greensock.js')!!}" type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="{!! asset('betube/layerslider/js/layerslider.transitions.js')!!}" type="text/javascript"></script>
<script src="{!! asset('betube/layerslider/js/layerslider.kreaturamedia.jquery.js')!!}" type="text/javascript"></script>
<script src="{!! asset('betube/js/owl.carousel.min.js')!!}"></script>
<script src="{!! asset('betube/js/inewsticker.js')!!}" type="text/javascript"></script>
<script src="{!! asset('betube/js/jquery.kyco.easyshare.js')!!}" type="text/javascript"></script>
</html>
