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
                            <span class="m-nav__link-text"> {{$categoryName}}</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{ route('admin.video_details.add')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="far fa-newspaper"></i>
													<span>{{ trans('admin.add-video') }}</span>
												</span>
                </a>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>

        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">

            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>{{ trans('admin.status') }}:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="status">
                                            <option value="">{{ trans('admin.all') }}</option>
                                            <option value="1">{{ trans('admin.published') }}</option>
                                            <option value="0">{{ trans('admin.unpublished') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label class="m-label m-label--single">{{ trans('admin.category') }}:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select"  id="category">
                                            <option selected value="" >{{ trans('admin.all') }}</option>
                                            @foreach($categories as $category)
                                                <option value={{ $category->id }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input name="title" type="search" class="form-control m-input" placeholder="{{ trans('admin.search') }}..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span><i class="la la-search"></i></span>
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <table class="table table-striped table-bordered table-hover table-checkable" id="video_details_table">
                <thead>
                <tr>
                    <th></th>
                    <th>{{ trans('admin.name') }}</th>
                    <th>{{ trans('admin.category') }}</th>
                    <th> {{ trans('admin.add_by') }} </th>
                    <th>{{ trans('admin.created_at') }}  </th>
                    <th>{{ trans('admin.status') }}</th>
                    <th>{{ trans('admin.actions') }}</th>
                </tr>
                </thead>
            </table>

        </div>

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
