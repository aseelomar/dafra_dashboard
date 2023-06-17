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
                            <span class="m-nav__link-text"> {{ trans('admin.videos') }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ trans('admin.update-video') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">
                    <button type="submit" class="btn m-btn--pill btn-success" id="update-video-details">
                            <span>
                                <i class="la la-plus"></i>
                                <span>{{trans('admin.save')}}</span>
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
        <form class="m-portlet__body" action="{{route('admin.video_details.update',$videoDetails->id)}}" id="update-data-video-details" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-9">
                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--bordered m-portlet--unair">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ trans('admin.add-video') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.name') }}</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="{{ trans('admin.name') }}" type="text" value="{{ $videoDetails->name }}" name="name" id="example-text-input">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    {{--<span class="m-form__help">We'll never share your title with anyone else.</span>--}}

                                </div>
                            </div>
                            <div class="form-group m-form__group row has-success">
                                <label class="col-form-label col-2 " style="color: #0f0f11">{{ trans('admin.time-show') }}</label>
                                <div class="col-lg-4 col-6">
                                    <div class="input-group timepicker">
                                        <input class="form-control m-input" name="time" value="{{ $videoDetails->time }}" id="m_timepicker_1_validate" readonly="" placeholder="Select time" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  "></label>
                                <div class="col-10">
                                    <div class="m-radio-inline">
                                        <label class="m-checkbox m-checkbox">
                                            <input name="at_home" {{ $videoDetails->at_home  == 1 ? 'checked' : '' }}  value="1" type="checkbox">  عرض في السلايدر الرئيسي
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.description') }}</label>
                                <div class="col-10">
                                    <textarea name="description" style="height: 400px" class="summernote" id="m_summernote_1">{{$videoDetails->description}}</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ trans('admin.category') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <select class="form-control m-select2" id="m_select2_5" name="category_id">
                                <option  selected> {{ trans('admin.Choose-category') }}</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" {{ $videoDetails->category_id == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ trans('admin.add_photo') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div class="custom-file-upload">
                            <div class="icon text-center">
                                <img src="/cloud-img.png" alt="">
                                <img width="100%" height="248" src="{{asset('storage/imageVideo/'.$videoDetails->image)}}" alt="" class="img">
                            </div>
                            <input name="image" accept="image/*" type="file" id="news-img">
                        </div>

                    </div>

                </div>
            </div>


        </form>
        <!--end::Portlet-->
    </div>
@endsection

@push('scripts')

    <script src="/assets/odai/video-details.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            VideoDetails.init();
        });
    </script>



@endpush
