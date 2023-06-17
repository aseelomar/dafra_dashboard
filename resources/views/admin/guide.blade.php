@extends('layouts.admin')

@section('content')

<!--begin:: Widgets/Stats-->
<div class="m-portlet ">
    <div class="m-portlet__body  m-portlet__body--no-padding">

        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
                        <h3 class="m-portlet__head-text">
                            جدول البرامج
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form" action="{{ route('admin.guide') }}" method="post">
                @csrf
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>

                        @foreach($guides as $guide)
                            <div id="m_repeater_{{$guide->key}}">
                                <div class="form-group  m-form__group row" id="m_repeater_1">
                                    <label class="col-lg-2 col-form-label">{{ $guide->day_ar }}</label>
                                    <div data-repeater-list="{{$guide->key}}" class="col-lg-10">
                                        @if(count(json_decode($guide->properties)) == 0)
                                            <div data-repeater-item class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__label">
                                                            <label> الاسم</label>
                                                        </div>
                                                        <div class="m-form__control">
                                                            <select class="form-control m-bootstrap-select m_selectpicker" name="category" data-live-search="true">
                                                                @foreach($videos as $video)
                                                                    <option value="{{ $video }}" data-tokens="{{ $video }}">{{ $video->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__label">
                                                            <label class="m-label m-label--single">الساعة</label>
                                                        </div>
                                                        <div class="input-group timepicker">
                                                            <input class="form-control m-input" name="time" id="m_timepicker_1_validate" placeholder="Select time" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="m-radio-inline">
                                                        <label class="m-checkbox m-checkbox">
                                                            <input name="status"  value="1" type="checkbox"> العرض الأول
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div data-repeater-delete class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>حذف</span>
																</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach(json_decode($guide->properties) as $v)
                                            <div data-repeater-item class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__label">
                                                            <label> الاسم</label>
                                                        </div>
                                                        <div class="m-form__control">
                                                            <select class="form-control m-bootstrap-select m_selectpicker" name="category" data-live-search="true">
                                                                @foreach($videos as $video)
                                                                    <option {{ json_decode($v->category)->id == $video->id ? 'selected' : '' }} value="{{ $video }}" data-tokens="{{ $video }}">{{ $video->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__label">
                                                            <label class="m-label m-label--single">الساعة</label>
                                                        </div>
                                                        <div class="input-group timepicker">
                                                            <input class="form-control m-input" value="{{ $v->time }}"  name="time" id="m_timepicker_1_validate" placeholder="Select time" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="m-radio-inline">
                                                        <label class="m-checkbox m-checkbox">
                                                            <input name="status" @if(isset($v->status)) {{ $v->status[0]  == 1 ? 'checked' : '' }} @endif  value="1" type="checkbox"> العرض الأول
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div data-repeater-delete class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>حذف</span>
																</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="m-form__group form-group row">
                                    <label class="col-lg-2 col-form-label"></label>
                                    <div class="col-lg-4">
                                        <div id="add" data-repeater-create class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>اضافة</span>
														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-80"></div>

                        @endforeach

                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success">حفظ</button>
                                <button type="reset" class="btn btn-secondary">تراجع</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>


    </div>
</div>


@endsection

@push('scripts')

    <script src="/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>

@endpush
