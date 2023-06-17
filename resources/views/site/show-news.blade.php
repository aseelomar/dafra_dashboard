@extends('layouts.site')

@section('title', @$news->title )


@section('content')

<div class="container container-mobile">
    <div class="right-section right-section-mobile" style="color:var(--font-color);margin-top: 25px;">
        <h2 class="path"><a href="">{{trans('site.al-dhafra')}}</a> > <a href="">{{trans('site.news')}}</a></h2>
        <h2 class="news-header">{{$news->title}}</h2>
        <div class="serial-img news-img">
            <img src="{{asset('storage/news/' . $news->image)}}" alt="">
        </div>
        <div class="news-details"
             style="display:flex;align-items:center;margin-top:10px;margin-right:-0px !important;">
            <div class="duration">
                <img src="imgs/clock.png" alt="" id="clock">
                <p style="color:var(--font-color);">{{ $news->created_at->diffForHumans()}}</p>
            </div>
            <div class="views">
                <img src="imgs/view.png" alt="" id="view">
                <p style="color:var(--font-color);">{{$news->user_show}}</p>
            </div>
        </div>
        <div class="text " >
            <p>
               {!!  $news->description !!}
            </p>
        </div>
        <h2 class="episode">
            {{trans('site.read-also')}}
        </h2>
        <div class="news-con news-con-mobile">
            <div class="rright rright-mobile">

                <img src="{{asset('storage/news/' . $newsCategory[0]->image)}}" alt="">
                <a href="{{ $newsCategory[0]->url }}">
                    <h2 style="padding-bottom: 10px;">{{$newsCategory[0]->title}}</h2>
                </a>

            </div>
            <div class="part1 lleft lleft-mobile">
                @foreach(@$newsCategory->slice(1)->take(2) as $newsCategories)
                <div>
                    <img src="{{asset('storage/news/' . $newsCategories->image)}}" alt="">
                    <div class="bg"></div>
                    <a href="{{ $newsCategories->url }}">
                        <h2>{{$newsCategories->title}} </h2>
                    </a>
                    <div class="news-details">
                        <div class="duration">
                            <img src="imgs/clock.png" alt="">
                            <p>{{$newsCategories->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="views">
                            <img src="imgs/view.png" alt="">
                            <p>{{$newsCategories->user_show}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--<div class="left-section2">--}}
        {{--<h2 class="chosen-title">--}}
            {{--اخترنا لكم--}}
        {{--</h2>--}}
        {{--<div class="news-titles">--}}
            {{--@foreach( @$otherNews as $otherNew)--}}
            {{--<a href="{{ $otherNew->url }}">--}}
                {{--<div style="margin-bottom: 35px;">--}}
                    {{--<div class="chosen chosen2"--}}
                         {{--style="background-image: url({{asset('storage/news/' . $otherNew->image)}}); background-position: center;background-size:cover;">--}}
                    {{--</div>--}}
                    {{--<h2>{{$otherNew->title}}</h2>--}}

                {{--</div>--}}
            {{--</a>--}}

            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}



</div>
@endsection


