@extends('layouts.site')

@section('title', 'جميع الأخبار' )

@push('head')



    <style>
        .news-con .lleft {
            width: 99% !important;
             flex-direction: unset;
            flex-wrap: wrap;
        }

        .news-con .test {
            width: 24%;
            align-items: flex-end;
            justify-content: flex-end;
        }

        .part1 {
            background-color: unset;
        }

        @media only screen and (max-width: 800px) and (min-width: 300px) {

            .news-con .lleft {
                width: 92% !important;
            }

            .news-con .test {
                width: 49%;
            }

        }
    </style>
    @endpush


@section('content')

    <div class="container container-mobile">
        <div class="right-section right-section-mobile" style="color:var(--font-color);margin-top: 25px;">
            <div class="news-con news-con-mobile">
                <div class="part1 lleft lleft-mobile">
                    @foreach(@$newsCategory as $newsCategories)
                        <div class="test">
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

    </div>
@endsection


