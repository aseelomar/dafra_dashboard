@extends('layouts.site')

@section('title', @$video->videoDetail->name)

@push('head')
    <style>

        .right-section {
            width: 60%;
        }
    </style>
@endpush

@section('content')

    <div class="container container-mobile">
        <div class="right-section right-section-mobile" >
            <div class="serial-video">
                <img src="{{asset('storage/imageVideo/' . $video->videoDetail->image)}}" alt="" class="overlay">
                <div><img src="{{asset('site/img/NoPath - Copy (-1.png')}}" alt="" id="play"></div>
            </div>
            <div class="video">

                <iframe width="100%" allowfullscreen height="450" src="{{ $video->link }}" frameborder="0">

                </iframe>

            </div>

            <div class="video-info" >
                <h2>{{$video->videoDetail->name}} - {{ trans('admin.episode') }} {{$video->episode}}
                    @if($video->part ==! null)
                       <small>- {{ trans('admin.part') }} {{$video->part}}</small>
                    @endif
                </h2>
            </div>
            <div class="newsbar" style="background-color: #2D2D2D;margin-top: 8px">
                <div class="sec1">
                    <div class="arrows">
                        <img src="http://127.0.0.1:8000/site/imgs/path36.png" alt="" id="arrow1">
                        <img src="http://127.0.0.1:8000/site/imgs/Path36.png" alt="" id="arrow2">
                    </div>
                    <a href="">
                        <h2> {{ trans('site.episodes') }} </h2>
                    </a>
                </div>
                <a href="#" class="sec2">
                    {{--<div> المزيد</div>--}}
                    <img src="http://127.0.0.1:8000/site/imgs/Path 36.png" width="13" alt="" class="rotated">
                </a>
            </div>

            <div class="episodes">
                @foreach(@$videoEpisodes as $videoEpisode)
                    <div class="episode-item episode-item-mobile"
                         style="background-image: url({{asset('storage/imageVideo/' . $videoEpisode->videoDetail->image)}}); background-position: center;background-size:cover;">
                        <a href="{{ $videoEpisode->slug }}">
                            <div>
                                <h2>{{ trans('site.episode') }} {{$videoEpisode->episode}}</h2>
                                <img src="{{asset('site/img/NoPath - Copy (-1.png')}}" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
{{--                {{$videoEpisodes->links()}}--}}
            </div>

        </div>
        <div class="left-section left-section-mobile">
            <div class="chosen-title">
                {{trans('site.choose-for-you')}}
            </div>
        @foreach(@$videoDetails as $videoDetail)
            <a href="{{route('site.detailsVideo',$videoDetail->id)}}">
                <div class="chosen"
                     style="background-image: url({{asset('storage/imageVideo/' . $videoDetail->image)}}); background-position: center;background-size:cover;">
                    <div>
                        <h2>{{$videoDetail->name}}</h2>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>

@endsection
@push('script')
    <script type="text/javascript">

        $(document).ready(function () {

            $(".video").hide();
            $("#play").click(function () {
                $(".serial-video").hide();
                $(".video").show();
                document.getElementById('video').play();

            });


            window.onclick = function (event) {
                if (!event.target.matches('.dropdown')) {
                    $(".dropdown-content").hide();

                }
                if (!event.target.matches('#menu') && !event.target.matches('.dropbtn2')) {
                    $(".dpdown").hide();
                    $(".dpdown2").hide();

                }
            }

        });
    </script>
@endpush
