
@extends('layouts.admin')

@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.news') }}</h3>
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
                            <span class="m-nav__link-text"> {{ trans('admin.news') }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ trans('admin.update_news') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">
                    <button type="submit" class="btn m-btn--pill btn-success save" id="update-news">
                            <span>
                                <i class="far fa-newspaper"></i>
                                <span>{{trans('admin.save')}}</span>
                            </span>
                    </button>
                    <button type="submit"  class="btn m-btn--pill btn-success" id="cancel
">
                            <a href="{{ URL::previous() }}"style="color: white;" >
                                <i class="far fa-newspaper"></i>
                                <span >{{trans('admin.cancel')}} </span>
                            </a>
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')


    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <form class="m-portlet__body" action="{{route('admin.news.update',$news->id)}}" id="update-data_news"method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-9">
                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--bordered m-portlet--unair">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ trans('admin.new_news') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.news_title') }}</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="{{ trans('admin.news_title') }}" type="text" value="{{$news->title}}" name="title" id="example-text-input">


                                </div>
                            </div>

                            <textarea name="description" style="height: 400px" class="summernote" id="m_summernote_1">{{$news->description}}</textarea>
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
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" {{ $news->category_id == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
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
                                <img width="100%" height="248" src="{{ asset('storage/news/' . $news->image) }}" alt="" class="img">
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

    <script src="/assets/odai/news.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            News.init();
        });
    </script>


@endpush
