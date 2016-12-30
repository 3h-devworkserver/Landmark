@if( $class != 'country-section')
<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head id="www-sitename-com" data-template-set="html5-reset">
@endif
    <meta charset="utf-8">
    
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>LandMark</title>
    @if( $class != 'country-section')
    <meta name="title" content="{{ $metavalues->meta_title }}" />
    <meta name="description" content="{{ $metavalues->meta_desc }}" />
    <meta name="author" content="{{ $metavalues->meta_keyword }}" />
    @endif
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    
    <meta name="google-site-verification" content="" />
    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    
    <!-- <meta name="author" content="" /> -->
    <meta name="Copyright" content="" />
    
    <!--  Mobile Viewport Fix
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
    -->
    <!-- Uncomment to use; use thoughtfully!-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    

    <!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
    <link rel="shortcut icon" href="{{ asset('/img/'.$home->favicon ) }}" />
    <!-- This is the traditional favicon.
        - size: 16x16 or 32x32
    - transparency is OK -->
    
    <link rel="apple-touch-icon" href="{{asset('/img/apple-touch-icon.png')}}" />
    <!-- The is the icon for iOS's Web Clip and other things.
        - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for retina display (IMHO, just go ahead and use the biggest one)
        - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
    - Transparency is not recommended (iOS will put a black BG behind the icon) -->
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i" rel="stylesheet">

    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->


    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}"/>    
<!--     <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}"/> 
 -->    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> 
    <link rel="stylesheet" href="{{asset('/assets/fonts/bebas/stylesheet.css')}}"/>   
    
    <link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/responsive.css')}}" />

    <script>
        var base_url = '{{ URL::to("") }}';
        var full_current_url = '{{ URL::full() }}';
        var current_url = '{{ URL::current() }}';
    </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{asset('/assets/js/maps.js')}}"></script>
</head>
<body class="{{$class}}">


    @include('frontend.header')

    @yield('content')

    @include('frontend.footer')


<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script>window.jQuery || document.write("<script src='assets/js/jquery.min.js'>\x3C/script>")</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
<script src="{{asset('/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.scrollme.js')}}"></script>

<script src="{{asset('/assets/js/custom.js')}}"></script>
<script>
    $(document).ready(function(){
            var win = $(window).width()
            var winx = ( win/2 - 15 );
            $('#forth .box-wrap.animateme:first').attr('data-translatex',winx)
            $('#forth .box-wrap.animateme:nth-child(2)').attr('data-translatex',(-winx))
    })
</script>
</body>
</html>