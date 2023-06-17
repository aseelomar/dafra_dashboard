@extends('layouts.admin')

@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.info_general') }}</h3>
            </div>

        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')


    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <form class="m-portlet__body" action="{{route('admin.backend_settings.update',$setting->id)}}" id="update-setting"method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-12">
                    <div class="m-portlet__head-title">

                        <h4 class="m-portlet__head-text">
                            {{ trans('admin.update-setting') }}
                        </h4>
                    </div>

                    <!--begin::Portlet-->
                    <div class=" m-portlet--bordered m-portlet--unair">
                        <hr>
                        <div class="m-portlet__body ">
                            <div class="form-group m-form__group row col-md-10 offset-md-1">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.setting-name') }}</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="{{ trans('admin.setting-name') }}" type="text" value="{{$setting->key}}" name="key" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group m-form__group row col-md-10 offset-md-1">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ trans('admin.setting-value') }}</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="{{ trans('admin.setting-value') }}" type="text" value="{{$setting->value}}" name="value" id="example-text-input">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class=" order-j1 order-xl-2 m--align-right">
                <button type="submit" class="btn m-btn--pill btn-success save" >
                                 <span>
                                <i class="far fa-newspaper"></i>
                                <span>{{trans('admin.save')}}</span>
                                </span>
                </button>

                <a href="{{route('admin.backend_settings.all')}}"  class="btn m-btn--pill btn-success">
                                 <span>
                                <i class="far fa-newspaper"></i>
                                <span>{{trans('admin.cancel')}}</span>
                                </span>
                </a>
            </div>

        </form>
        <!--end::Portlet-->
    </div>
@endsection

@push('scripts')

    <script src="/assets/odai/setting.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Setting.init();
        });
    </script>


@endpush
