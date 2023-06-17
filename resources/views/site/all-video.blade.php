@extends('layouts.site')

@section('title', @$categoryName)

@section('content')
    <div class="container container-mobile">
        <div class="right-section right-section-mobile">

            <div class="newsbar" style="background-color: #2D2D2D;margin-top: 8px">
                <div class="sec1">
                    <div class="arrows">
                        <img src="http://127.0.0.1:8000/site/imgs/path36.png" alt="" id="arrow1">
                        <img src="http://127.0.0.1:8000/site/imgs/Path36.png" alt="" id="arrow2">
                    </div>
                    <a href="">
                        <h2>  {{@$categoryName}} </h2>
                    </a>
                </div>
                <a href="#" class="sec2">
                    {{--<div> المزيد</div>--}}
                    <img src="http://127.0.0.1:8000/site/imgs/Path 36.png" width="13" alt="" class="rotated">
                </a>
            </div>

            <div class="episodes">
                @foreach(@$videoDetails as $videoDetail )
                <div class="episode-item episode-item-mobile"
                     style="background-image: url({{asset('storage/imageVideo/' . $videoDetail->image)}}); background-position: center;background-size:cover;">
                    <a href="{{route('site.detailsVideo',$videoDetail->id)}}">
                        <div>
                            <h2> {{$videoDetail->name}}</h2>
                            <img src="imgs/NoPath - Copy (-1.png" alt="">
                        </div>
                    </a>
                </div>
              @endforeach
                {{@$videoDetails->links() }}

            </div>
        </div>
        {{--<div class="left-section">--}}
            {{--<h2 class="chosen-title">--}}
                {{--{{trans('site.choose-for-you')}}--}}
            {{--</h2>--}}
            {{--@foreach(@$randomVidoes as $randomVidoe)--}}
            {{--<a href="{{route('site.detailsVideo',$randomVidoe->id)}}">--}}
                {{--<div class="chosen"--}}
                     {{--style="background-image: url({{asset('storage/imageVideo/' . $randomVidoe->image)}}); background-position: center;background-size:cover;">--}}
                    {{--<div>--}}
                        {{--<h2>{{$randomVidoe->name}}</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</a>--}}
            {{--@endforeach--}}
        {{--</div>--}}

    </div>

@endsection
