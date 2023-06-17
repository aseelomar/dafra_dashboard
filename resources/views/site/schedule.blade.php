@extends('layouts.site')

@section('title', trans('site.schedule'))

@section('content')

    <div class="newcontainer">
        @foreach($guides as $guide)
        <div class="multi-bar">
            <div class="head">
                <h2>{{$guide->day}}</h2>
                <small>{{$guide->day_ar}}</small>
            </div>
            <span id="next-{{$guide->key}}" class="sliders-arrow"><</span>
            <div class="mslider">
                <div class="thumbnailgallery">
                    <div class="showrooms showrooms-{{$guide->key}} clearfix">
                        @foreach(json_decode($guide->properties) as $property)
                        <a href="{{route('site.detailsVideo',json_decode($property->category)->id)}}" class="logo logo-{{$guide->key}}">
                            <img width="300" src="{{asset('storage/imageVideo/' . json_decode($property->category)->image)}}">
                            <div class="caption">
                                <p>{{json_decode($property->category)->name}}</p>
                                <p>{{  date_create($property->time)->format('H:i') }}</p>
                            </div>
                        </a>
                         @endforeach
                    </div>

                </div>
            </div>

            <span id="prev-{{$guide->key}}" class="sliders-arrow">></span>
        </div>
        @endforeach
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {

            $('#prev-saturday').on('click', function () {
                var width = $('.logo-saturday').width();
                var last = $('.logo-saturday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-saturday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-saturday').on('click', function () {
                var width = $('.logo-saturday').width();
                var first = $('.logo-saturday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-saturday').css({ opacity: '1', width: width });
                });
            });

            $('#prev-sunday').on('click', function () {
                var width = $('.logo-sunday').width();
                var last = $('.logo-sunday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-sunday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-sunday').on('click', function () {
                var width = $('.logo-sunday').width();
                var first = $('.logo-sunday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-sunday').css({ opacity: '1', width: width });
                });
            });

            $('#prev-monday').on('click', function () {
                var width = $('.logo-monday').width();
                var last = $('.logo-monday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-monday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-monday').on('click', function () {
                var width = $('.logo-monday').width();
                var first = $('.logo-monday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-monday').css({ opacity: '1', width: width });
                });
            });

            $('#prev-tuesday').on('click', function () {
                var width = $('.logo-tuesday').width();
                var last = $('.logo-tuesday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-tuesday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-tuesday').on('click', function () {
                var width = $('.logo-tuesday').width();
                var first = $('.logo-tuesday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-tuesday').css({ opacity: '1', width: width });
                });
            });

            $('#prev-wednesday').on('click', function () {
                var width = $('.logo-wednesday').width();
                var last = $('.logo-wednesday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-wednesday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-wednesday').on('click', function () {
                var width = $('.logo-wednesday').width();
                var first = $('.logo-wednesday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-wednesday').css({ opacity: '1', width: width });
                });
            });

            $('#prev-thursday').on('click', function () {
                var width = $('.logo-thursday').width();
                var last = $('.logo-thursday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-thursday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-thursday').on('click', function () {
                var width = $('.logo-thursday').width();
                var first = $('.logo-thursday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-thursday').css({ opacity: '1', width: width });
                });
            });


            $('#prev-friday').on('click', function () {
                var width = $('.logo-friday').width();
                var last = $('.logo-friday').last().css({ opacity: '0', width: '0px' });
                last.prependTo('.showrooms-friday');
                last.animate({ opacity: '1', width: width });
            });
            $('#next-friday').on('click', function () {
                var width = $('.logo-friday').width();
                var first = $('.logo-friday').first();
                first.animate({ opacity: '0', width: '0px' }, function () {
                    first.appendTo('.showrooms-friday').css({ opacity: '1', width: width });
                });
            });


        });
    </script>
@endpush
