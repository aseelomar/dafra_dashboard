@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <!--begin:: Widgets/Stats-->
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ trans('admin.news_count') }}
                            </h4><br>
                            <span class="m-widget24__stats m--font-brand">
													{{ $newsCount }}
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">
												 {{ trans('admin.news_count') }}
												</span>
                            {{--<span class="m-widget24__number">--}}
													{{--78%--}}
												{{--</span>--}}
                        </div>
                    </div>

                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ trans('admin.videos_count') }}
                            </h4><br>
                            <span class="m-widget24__stats m--font-info">
													{{ $videosCount }}
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">
													 {{ trans('admin.videos_count') }}
												</span>
                            {{--<span class="m-widget24__number">--}}
													{{--84%--}}
												{{--</span>--}}
                        </div>
                    </div>

                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ trans('admin.customers_count') }}
                            </h4><br>
                            {{--<span class="m-widget24__desc">--}}
													{{--Fresh Order Amount--}}
												{{--</span>--}}
                            <span class="m-widget24__stats m--font-danger">
													{{ $customersCount }}
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">
													 {{ trans('admin.customers_count') }}
												</span>
                            {{--<span class="m-widget24__number">--}}
													{{--69%--}}
												{{--</span>--}}
                        </div>
                    </div>

                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                 {{ trans('admin.categories_count') }}
                            </h4><br>
                            {{--<span class="m-widget24__desc">--}}
													{{--Joined New User--}}
												{{--</span>--}}
                            <span class="m-widget24__stats m--font-success">
													{{ $categoriesCount  }}
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">
													 {{ trans('admin.categories_count') }}
												</span>
                            {{--<span class="m-widget24__number">--}}
													{{--90%--}}
												{{--</span>--}}
                        </div>
                    </div>

                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">

            <!--begin:: Widgets/Sale Reports-->
            <div class="m-portlet m-portlet--full-height ">
                {{--<div class="m-portlet__head">--}}
                    {{--<div class="m-portlet__head-caption">--}}
                        {{--<div class="m-portlet__head-title">--}}
                            {{--<h3 class="m-portlet__head-text">--}}
                                {{--{{ trans('admin.activation_users') }}--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="m-portlet__head-tools">--}}
                        {{--<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">--}}
                            {{--<li class="nav-item m-tabs__item">--}}
                                {{--<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">--}}
                                    {{--{{ trans('admin.last_month') }}--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item m-tabs__item">--}}
                                {{--<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">--}}
                                    {{--{{ trans('admin.all_time') }}--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="m-portlet__body">--}}

                    {{--<!--Begin::Tab Content-->--}}
                    {{--<div class="tab-content">--}}

                        {{--<!--begin::tab 1 content-->--}}
                        {{--<div class="tab-pane active" id="m_widget11_tab1_content">--}}

                            {{--<!--begin::Widget 11-->--}}
                            {{--<div class="m-widget11">--}}
                                {{--<div class="table-responsive">--}}

                                    {{--<!--begin::Table-->--}}
                                    {{--<table class="table">--}}

                                        {{--<!--begin::Thead-->--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<td class="m-widget11__label">#</td>--}}
                                            {{--<td class="m-widget11__app">{{ trans('admin.user_name') }}</td>--}}
                                            {{--<td class="m-widget11__sales">{{ trans('admin.news_count') }}</td>--}}
                                            {{--<td class="m-widget11__price">{{ trans('admin.videos_count') }}</td>--}}
                                            {{--<td class="m-widget11__total m--align-right">{{ trans('admin.total') }}</td>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}

                                        {{--<!--end::Thead-->--}}

                                        {{--<!--begin::Tbody-->--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">--}}
                                                    {{--<input type="checkbox"><span></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Vertex 2.0</span>--}}
                                                {{--<span class="m-widget11__sub">Vertex To By Again</span>--}}
                                            {{--</td>--}}
                                            {{--<td>19,200</td>--}}
                                            {{--<td>$63</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$14,740</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Metronic</span>--}}
                                                {{--<span class="m-widget11__sub">Powerful Admin Theme</span>--}}
                                            {{--</td>--}}
                                            {{--<td>24,310</td>--}}
                                            {{--<td>$39</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$16,010</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Apex</span>--}}
                                                {{--<span class="m-widget11__sub">The Best Selling App</span>--}}
                                            {{--</td>--}}
                                            {{--<td>9,076</td>--}}
                                            {{--<td>$105</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$37,200</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Cascades</span>--}}
                                                {{--<span class="m-widget11__sub">Design Tool</span>--}}
                                            {{--</td>--}}
                                            {{--<td>11,094</td>--}}
                                            {{--<td>$16</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$8,520</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}

                                        {{--<!--end::Tbody-->--}}
                                    {{--</table>--}}

                                    {{--<!--end::Table-->--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<!--end::Widget 11-->--}}
                        {{--</div>--}}

                        {{--<!--end::tab 1 content-->--}}

                        {{--<!--begin::tab 2 content-->--}}
                        {{--<div class="tab-pane" id="m_widget11_tab2_content">--}}

                            {{--<!--begin::Widget 11-->--}}
                            {{--<div class="m-widget11">--}}
                                {{--<div class="table-responsive">--}}

                                    {{--<!--begin::Table-->--}}
                                    {{--<table class="table">--}}

                                        {{--<!--begin::Thead-->--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<td class="m-widget11__label">#</td>--}}
                                            {{--<td class="m-widget11__app">{{ trans('admin.user_name') }}</td>--}}
                                            {{--<td class="m-widget11__sales">{{ trans('admin.news_count') }}</td>--}}
                                            {{--<td class="m-widget11__price">{{ trans('admin.videos_count') }}</td>--}}
                                            {{--<td class="m-widget11__total m--align-right">{{ trans('admin.total') }}</td>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}

                                        {{--<!--end::Thead-->--}}

                                        {{--<!--begin::Tbody-->--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">--}}
                                                    {{--<input type="checkbox"><span></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Vertex 2.0</span>--}}
                                                {{--<span class="m-widget11__sub">Vertex To By Again</span>--}}
                                            {{--</td>--}}
                                            {{--<td>19,200</td>--}}
                                            {{--<td>$63</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$14,740</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Metronic</span>--}}
                                                {{--<span class="m-widget11__sub">Powerful Admin Theme</span>--}}
                                            {{--</td>--}}
                                            {{--<td>24,310</td>--}}
                                            {{--<td>$39</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$16,010</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Apex</span>--}}
                                                {{--<span class="m-widget11__sub">The Best Selling App</span>--}}
                                            {{--</td>--}}
                                            {{--<td>9,076</td>--}}
                                            {{--<td>$105</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$37,200</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span class="m-widget11__title">Cascades</span>--}}
                                                {{--<span class="m-widget11__sub">Design Tool</span>--}}
                                            {{--</td>--}}
                                            {{--<td>11,094</td>--}}
                                            {{--<td>$16</td>--}}
                                            {{--<td class="m--align-right m--font-brand">$8,6565520</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}

                                        {{--<!--end::Tbody-->--}}
                                    {{--</table>--}}

                                    {{--<!--end::Table-->--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<!--end::Widget 11-->--}}
                        {{--</div>--}}

                        {{--<!--end::tab 2 content-->--}}

                        {{--<!--begin::tab 3 content-->--}}
                        {{--<div class="tab-pane" id="m_widget11_tab3_content">--}}
                        {{--</div>--}}

                        {{--<!--end::tab 3 content-->--}}
                    {{--</div>--}}

                    {{--<!--End::Tab Content-->--}}
                {{--</div>--}}
            </div>

            <!--end:: Widgets/Sale Reports-->
        </div>

    </div>

@endsection

@push('scripts')


@endpush
