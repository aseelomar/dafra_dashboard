@extends('layouts.admin')
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.videos') }}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">{{ trans('admin.home') }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ $videoDetails->category->name}}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ $videoDetails->name }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ trans('admin.add') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">
                    <button type="submit" class="btn m-btn--pill btn-success" id="add-video">
                            <span>
                                <i class="la la-plus"></i>
                                <span>{{trans('admin.add-video')}}</span>
                            </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <ul id="errors"></ul>


    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <form class="m-portlet__body" action="{{route('admin.videos.store')}}" id="add-new-video" method="POST" enctype="multipart/form-data">
            @csrf


            <input type="hidden" name="video_details_id" id="video-id" value="{{$videoDetails->id}}">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--bordered m-portlet--unair">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ $videoDetails->name }}-<span> {{ trans('admin.add-video') }}</span>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            @if(@$videoDetails->category->slug == 'movies')
                            @else
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.episode') }}</label>
                                    <div class="col-10">
                                        <input class="form-control m-input " placeholder="{{ trans('admin.episode') }}" type="text" value="{{ old('episode') }}" name="episode" id="example-text-input">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.part') }}</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="{{ trans('admin.part') }}" type="text" value="{{ old('part') }}" name="part" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  "></label>
                                <div class="col-10">
                                    <div class="m-radio-inline">
                                        <label class="m-checkbox m-checkbox">
                                            <input name="at_home"  value="1" type="checkbox">  عرض في الرئيسية
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                           <hr>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.push-video') }}</label>
                                    <div class="col-10">
                                        <input class="form-control m-input " placeholder="{{ trans('admin.push-video') }}" type="text" value="{{ old('link') }}" name="link" id="example-text-input">
                                    </div>
                                </div>
                            </div>



                    </div>
                </div>

            </div>


        </form>
        <!--end::Portlet-->
    </div>
@endsection

@push('scripts')

    <script src="/assets/odai/video.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Video.init();
        });
    </script>



@endpush
