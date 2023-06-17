@extends('layouts.admin')
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.users') }}</h3>
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
                        <a href="{{ route('admin.users.all') }}" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ trans('admin.users') }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <span class="m-nav__link-text"> {{ trans('admin.edit_user') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        {{ trans('admin.edit_user') }} : {{ $user->name  }}
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="post" action="{{ route('admin.users.update', $user->id) }}" id="update_user" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label>{{ trans('admin.user_name') }}:</label>
                        <input type="text" name="name" class="form-control m-input" placeholder="{{ trans('admin.user_name') }}" value="{{ $user->name }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="">{{ trans('admin.email') }}:</label>
                        <input type="email" name="email" class="form-control m-input" placeholder="{{ trans('admin.email') }}" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12">{{ trans('admin.status') }}</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input data-switch="true" value="1" type="checkbox" name="active" checked="checked" data-on-text="{{ trans('admin.enabled') }}" data-handle-width="70" data-off-text="{{ trans('admin.disabled') }}" data-on-color="brand">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label>{{ trans('admin.user_role') }}:</label>
                        <div class="m-radio-inline">
                            @foreach($roles as $role)
                                <label class="m-radio m-radio--solid">
                                    <input type="radio" {{ $user->roles->first()->id == $role->id ? 'checked' : '' }} name="role" value="{{ $role->id }}"> {{ $role->description }}
                                    <span></span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <div class="custom-file" style="margin-top: 15px;">
                            <input type="file" class="custom-file-input" name="image" id="customFile1">
                            <label class="custom-file-label gallery" for="customFile1" id="img"
                                   style="position: relative; width: 100%">
                                <span style="margin-left: 30px;" class="img">{{trans('admin.choose_image')}}</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img width="150" height="150" src="{{ asset('storage/users/' . $user->image) }}" alt="" class="img img-responsive rounded-circle">
                    </div>

                </div>

            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary save">{{ trans('admin.save') }}</button>
                            <button type="reset" class="btn btn-secondary">{{ trans('admin.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
@endsection

@push('scripts')

    <script src="/assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

    <script src="/assets/odai/users.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            User.init();
        });
    </script>


@endpush
