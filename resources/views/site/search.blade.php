@extends('layouts.site')

@section('title')
@endsection
@section('content')

    <div class="container">
        <div class="right-section" style="width: 60%">
            @if($videoDetails == null)
                <p>{{trans('site.results-found')}}</p>
            @endif
            @foreach(@$videoDetails as $videoDetail)
                    <a href="{{route('site.detailsVideo',$videoDetail->id)}}">
                        <div style="width: 49%;">
                            <h2 style="color: var(--font-color);"> {{$videoDetail->name}}</h2>
                            <img width="100%" height="300px" src="{{ asset('storage/imageVideo/'. $videoDetail->image) }}" alt="">
                        </div>
                    </a>
                @endforeach
        </div>
        <div class="left-section">
            <h2 class="chosen-title">
                {{trans('site.choose-for-you')}}
            </h2>
            @foreach(@$randomVidoes as $randomVidoe)
                <a href="{{route('site.detailsVideo',$randomVidoe->id)}}">
                    <div class="chosen"
                         style="background-image: url({{asset('storage/imageVideo/' . $randomVidoe->image)}}); background-position: center;background-size:cover;">
                        <div>
                            <h2>{{$randomVidoe->name}}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
