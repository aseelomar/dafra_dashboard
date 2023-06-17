@extends('layouts.site')

@section('title', trans('site.home_title') )


@section('content')
    <div>
        <div id="jssor_1"
             style="background-color:black;position:relative;margin:0 auto;top:0px;left:0px;width:950px;height:400px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin"
                 style="background-color:black;position:absolute;top:0px;left:0px;width:100%;height:100%;margin:0px 20px;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:50px;height:38px;" src="{{ asset('site/img/spin.svg') }}" />
            </div>
            <div data-u="slides"
                 style="cursor:default;position:relative;top:0px;left:0px;width:950px;height:400px;overflow:hidden;margin:0px 20px;">
                @foreach(@$videoDetails as $videoDetail)
                    <a href="{{route('site.detailsVideo',@$videoDetail->id)}}">
                    <div>
                        <img data-u="image" src="{{asset('storage/imageVideo/' . $videoDetail->image)}}" style="margin:0px 5px;" width="90%" height="100%" />
                        <div class="slide-div"
                             style="width:100%;position: relative;top:20px;right:20px;color:white;font-family:cairo;font-size:40px;">

                            <p style="font-size: 80px;position: relative;top:20px;text-shadow: 0px 1px 3px black;">{{$videoDetail->time}}</p>
                            <p class="slide-p"
                               style="position: relative;top:-100px;font-size:20px;text-shadow: 1px 1px 2px black;">{{trans('site.UAE-time')}}</p>
                            <div class="slide-div2"
                                 style="height:50px;border-left:25px solid #940A01;position: relative;top:-100px;background-color:#940A01;text-align: center;display: inline-block;font-size:35px;align-items: center;padding-right:10px;margin-right:20px;background-image: linear-gradient(to right,rgb(80, 10, 5) , rgb(185, 17, 17));">
                                <p style="position: relative;right:0px;top: -43px;text-shadow: 1px 1px 2px black;">{{$videoDetail->name}}</p>
                            </div>

                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;"
                 data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:20px;height:20px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>

            <!-- Arrow Navigator -->
            <div id="data-u1" data-u="arrowleft" class="jssora051" style="position: absolute;left: 0;margin-top:5px;"
                 data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <img id="arrowleft" src="{{ asset('site/imgs/left-arrow.png') }}" alt="" width="40" height="50">
            </div>
            <div id="data-u2" data-u="arrowright" class="jssora051" data-autocenter="2" data-scale="0.75"
                 data-scale-right="0.75">
                <img id="arrowright" src="{{ asset('site/imgs/right-arrow.png') }}" alt="" width="40" height="50">
            </div>

        </div>
    </div>
    <div class="schedule">
        <div class="title">
            <h2>{{trans('site.watching-today')}}</h2>
            <small>{{trans('site.schedule-of-programs')}}</small>
        </div>
        <ul>
            @foreach(@$today as $guideVideo)
                <li>

                    @if (explode(":", $guideVideo->time, 2)[0] == $time)
                        <p class="now activenow">{{trans('site.now-displays')}}</p>
                    @endif

                    <a style="color: #940a01" href="{{route('site.detailsVideo',json_decode($guideVideo->category)->id)}}">
                        <h2 class="name">{{json_decode($guideVideo->category)->name}}</h2>
                    </a>
                    <p class="time"> {{ date_create($guideVideo->time)->format('H:i') }} UAE </p>

                </li>

            @endforeach

        </ul>
    </div>

    <div class="news">
        <div class="newsbar" style="background-color: #2D2D2D;">
            <div class="sec1">
                <div class="arrows">
                    <img src="{{ asset('site/imgs/path36.png') }}" alt="" id="arrow1">
                    <img src="{{ asset('site/imgs/Path36.png') }}" alt="" id="arrow2">
                </div>
                <a href="">
                    <h2>{{trans('site.latest-news')}} </h2>
                </a>
            </div>
            <a href="{{ route('site.allnews') }}" class="sec2">
                <div> {{trans('site.more')}}</div>
                <img src="{{ asset('site/imgs/Path 36.png') }}" width="13" alt="" class="rotated">
            </a>
        </div>
        <div class="news-container">
            <div class="main">
                <a href="{{ @$news[0]->url }}"><img src="{{asset('storage/news/' . @$news[0]->image)}}" alt=""> </a>
                <a href="{{ @$news[0]->url }}">
                    <h2 style="padding-bottom: 10px;">{{@$news[0]->title}}
                       </h2>
                </a>
                <div class="news-details en-details">
                    <div class="duration">
                        <img src="{{ asset('site/imgs/clock.png') }}" alt="">
                        <p>{{ @$news[0]->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="views">
                        <img src="{{ asset('site/imgs/view.png') }}" alt="">
                        <p>{{@$news[0]->user_show}}</p>
                    </div>
                </div>
            </div>
            <div class="parts">
                <div class="part1">
                    @foreach(@$news->slice(1)->take(2) as $new)

                    <div>
                        <img src="{{asset('storage/news/' . $new->image)}}" alt="">
                        <div class="bg"></div>
                        <a href="{{ $new->url}}">
                            <h2>{{$new->title}}</h2>
                        </a>
                        <div class="news-details">
                            <div class="duration">
                                <img src="{{ asset('site/imgs/clock.png') }}" alt="">
                                <p>{{ $new->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="views">
                                <img src="{{ asset('site/imgs/view.png') }}" alt="">
                                <p>{{$news[0]->user_show}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="part1">
                    @foreach(@$news->slice(3)->take(2) as $new)
                        <div>
                            <img src="{{asset('storage/news/' . $new->image)}}" alt="">
                            <div class="bg"></div>
                            <a href="{{ $new->url }}">
                                <h2>{{$new->title}}</h2>
                            </a>
                            <div class="news-details">
                                <div class="duration">
                                    <img src="{{ asset('site/imgs/clock.png') }}" alt="">
                                    <p>{{ $new->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="views">
                                    <img src="{{ asset('site/imgs/view.png') }}" alt="">
                                    <p>{{$news[0]->user_show}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="subscribe">
        <p>{{trans('site.subscribe-detials')}}</p>

        <form style="position: relative" action="{{ route('site.addEmail') }}" method="POST" class="sub-email">
            @csrf
            @if(Session::has('message'))
                <span  class="alert alert-info">{{ Session::get('message') }}</span>
            @endif
            <input type="email" name="email" placeholder="{{trans('site.email')}}">
            <button type="submit">{{trans('site.subscribe')}}</button>
        </form>
    </div>

    <div class="newsbar" style="background-color: #2D2D2D">
        <div class="sec1">
            <div class="arrows" style="background-color:rgb(179, 15, 3)">
                <img src="{{ asset('site/imgs/path36.png') }}" alt="" id="arrow1">
                <img src="{{ asset('site/imgs/path36.png') }}" alt="" id="arrow2">
            </div>
            <a href="">
                <h2>{{trans('site.videos')}}</h2>
            </a>
        </div>
        <a href="{{ route('site.videos') }}" class="sec2">
            <div> {{trans('site.more')}}</div>
            <img src="site/imgs/Path 36.png" width="13" alt="" class="rotated">
        </a>
    </div>
    <div class="videos">

        @foreach(@$videos as $video)
        <a href="{{ $video->slug }}" class="video-img-a">

            <div class="video-img"
                 style="background-image: url({{asset('storage/imageVideo/' . $video->videoDetail->image)}}); background-position: center;background-size:cover;">

                <div>
                    <div class="bg"></div>
                    <h2>{{$video->videoDetail->name}}</h2>
                    <img src="{{ asset('site/imgs/hh.png') }}" alt="" width="50" height="50">
                </div>
            </div>
        </a>
       @endforeach
    </div>

    @include('site.includes.goals')

@endsection

@push('script')

    <script>
        $(document).ready(function(){
            $(".video-img-a").hover(function(){
                $(this).css({
                    "width": "60%",
                    "transition": "all 1s"
                });
                $(this).next().css({
                    "background": "100% 100%",
                    "transition": "all 1s"
                });
            }, function(){
                $(this).css({
                    "width": "25%",
                    "transition":"all 1s"
                });
            });

        });
    </script>



@endpush
