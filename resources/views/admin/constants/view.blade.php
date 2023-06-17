@extends('layouts.admin')
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.logo_general') }}</h3>

            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">

                    <button type="submit" class="btn m-btn--pill btn-success save" id="add-constant">
                            <span>
                                <i class="far fa-newspaper"></i>
                                <span>{{trans('admin.save_constant')}}</span>
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
        <form class="m-portlet__body" action="{{route('admin.constants.store')}}" id="new-constant" method="POST" enctype="multipart/form-data">
            @csrf

                <input type="hidden" value="1" name="idDark">
                <input type="hidden" value="2" name="idDay">

            <div class="row">
                <div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded col-md-12">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ trans('admin.add_photo_logo') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="col-md-3 offset-2 center">Dark Mode</h4>
                        <h4 class="col-md-4 offset-3  center">Day Mode</h4>

                    </div>
                    <div class="row">
                    <div class="custom-file-upload" style="width: 20%;margin: 0 auto;margin-bottom: 22px">
                        <div class="icon text-center">
                            <img src="/cloud-img.png" alt="">
                            <img width="100%" height="248" src="{{ isset($constant[0]->image) ? asset('storage/constant/'. $constant[0]->image) : ''}}" alt="" class="img">
                        </div>
                        <input name="imageDark" accept="image/*" type="file" id="news-img">
                    </div>
                    <div class="custom-file-upload" style="width: 20%;margin: 0 auto;margin-bottom: 22px">
                        <div class="icon text-center">
                            <img src="/cloud-img.png" alt="">
                            <img width="100%" height="248" src="{{ isset($constant[1]->image) ? asset('storage/constant/'. $constant[1]->image) : ''}}" alt="" class="img2">
                        </div>
                        <input name="imageDay" accept="image/*" type="file" id="news-img2">
                    </div>
                    </div>

                </div>

            </div>


        </form>
        <!--end::Portlet-->
    </div>
@endsection

@push('scripts')

    <script src="/assets/odai/constant.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Constant.init();
        });
    </script>


@endpush
