@extends('layouts.admin')

@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.categories') }}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h4 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.all_category') }}</h4>
            <hr>
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input name="name" type="search" class="form-control m-input" placeholder="{{ trans('admin.search') }}..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span><i class="la la-search"></i></span>
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <button type="button" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#m_modal_1">
                            <span>
                            <i class="far fa-newspaper"></i>
                            <span>{{ trans('admin.add_category') }}</span>

                        </span>
                        </button>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>

                </div>
            </div>


            <table class="table table-striped table-bordered table-hover table-checkable" id="category_table">
                <thead>
                <tr>

                    <th></th>
                    <th>{{ trans('admin.category_name') }}</th>
                    <th>{{ trans('admin.par_category_acount') }}</th>
                    <th>{{ trans('admin.created_at') }}  </th>
                    <th>{{ trans('admin.updated_at') }}  </th>
                    <th> {{ trans('admin.model_by') }} </th>
                    <th>{{ trans('admin.status') }}</th>
                    <th>{{ trans('admin.actions') }}</th>
                </tr>
                </thead>
            </table>

        </div>

    </div>
@include('admin.categories.add');

@endsection

@push('scripts')

    <script src="/assets/odai/category.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Category.init();
        });
    </script>


@endpush
