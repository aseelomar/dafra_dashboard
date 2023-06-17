@extends('layouts.admin')

@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.info_general') }}</h3>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">

                    <a  href="{{route('admin.backend_settings.add')}}" class="btn m-btn--pill btn-primary">
                            <span>
                                <i class="far fa-newspaper"></i>
                                <span>{{trans('admin.add-new-setting')}}</span>
                            </span>
                    </a>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">

            <!--begin: Search Form -->


            <table class="table table-striped table-bordered table-hover table-checkable" id="setting_table">
                <thead>
                <tr>

                    <th></th>
                    <th>{{ trans('admin.setting-name') }}</th>
                    <th>{{ trans('admin.setting-value') }}</th>
                    <th>{{ trans('admin.actions') }}</th>
                </tr>
                </thead>
            </table>

        </div>

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
