<!DOCTYPE html>
<html lang="{{ Lang::locale()  }}">
<head>
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ trans('site.name') }}  @yield('title') </title>

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
<!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('site/css/ar-home.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/mediaquery.css') }}">


@if(Lang::locale() == 'en')
        <link rel="stylesheet" href="{{ asset('site/css/en-style.css')}}">
        <link rel="stylesheet" href="{{ asset('site/css/en-mediaquery.css') }}">
@endif

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">


    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /*jssor slider bullet skin 051 css*/
        .jssorb051 .i {
            position: absolute;
            cursor: pointer;
        }

        .jssorb051 .i .b {
            fill: white;
            fill-opacity: 1;
        }

        .jssorb051 .i:hover .b {
            fill-opacity: .7;
        }

        .jssorb051 .iav .b {
            fill-opacity: 1;
            fill: #940A01;
        }

        .jssorb051 .i.idn {
            opacity: .3;
        }

        /*jssor slider arrow skin 051 css*/
        .jssora051 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora051 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 360;
            stroke-miterlimit: 10;
        }

        .jssora051:hover {
            opacity: .8;
        }

        .jssora051.jssora051dn {
            opacity: .5;
        }

        .jssora051.jssora051ds {
            opacity: .3;
            pointer-events: none;
        }
    </style>

    <link rel="shortcut icon" href="/site/imgs/logo.jpg" />

    @stack('head')
</head>

<body>
    @include('site.includes.header')
    <!--end of header -->

    @yield('content')


    @include('site.includes.footer')

    <script src="{{ asset('site/css/jquery-3.4.1.min.js') }}"></script>

    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="{{ asset('site/js/js/jssor.slider-27.5.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/js.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        jssor_1_slider_init = function () {

            var jssor_1_options = {
                $AutoPlay: 1,
                $FillMode: 0,
                $SlideWidth: 850,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 2000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <script type="text/javascript">
        jssor_1_slider_init();


    </script>

    @stack('script')

</body>



</html>
