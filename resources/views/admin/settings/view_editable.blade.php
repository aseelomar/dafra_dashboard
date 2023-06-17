@extends('layouts.admin')

@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.info_general') }}</h3>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">

                    <button class="btn m-btn--pill btn-primary" id="save_settings">
                            <span>
                                <i class="fa fa-plus"></i>
                                <span>حفظ البيانات</span>
                            </span>
                    </button>

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


            <form method="post" action="{{ route('admin.settings.updateByKey') }}" id="settings_by_key" class="m-form m-form--label-align-left- m-form--state-">
                @csrf
                <!--begin: Form Body -->
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">بيانات تطبيق الظفرة</h3>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">نسخة الأندرويد</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="GOOGLE_PLAY" class="form-control m-input" placeholder="ادخل رابط تطبيق الأندرويد" value="{{ settings('GOOGLE_PLAY') }}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">نسخة الأيفون</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="APPLE_STORE" class="form-control m-input" value="{{ settings('APPLE_STORE') }}" placeholder="ادخل رابط تطبيق الأيفون">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> وصف التطبيقات </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="FOOTER_APPS" class="form-control m-input" value="{{ settings('FOOTER_APPS') }}" placeholder="وصف التطبيقات">
                                    </div>
                                </div>

                            </div>
                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        </div>

                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">بيانات  تردد القناة</h3>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">تردد القناة </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="FREQUENCY" class="form-control m-input" value="{{ settings('FREQUENCY') }}" placeholder="قم بادخال تردد القناة">
                                    </div>
                                </div>
                            </div>
                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        </div>

                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">بيانات   التواصل</h3>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> رقم الهاتف </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="SUPPORT_NUMBER" class="form-control m-input" value="{{ settings('SUPPORT_NUMBER') }}" placeholder="قم بادخال رقم الهاتف">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> البريد الالكتروني  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="SUPPORT_EMAIL" class="form-control m-input" value="{{ settings('SUPPORT_EMAIL') }}" placeholder="قم بادخال  البريد الالكتروني">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">العنوان  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="ADDRESS" class="form-control m-input" value="{{ settings('ADDRESS') }}" placeholder="قم بادخال العنوان">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> الفيس بوك  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="FACEBOOK_ACCOUNT" class="form-control m-input" value="{{ settings('FACEBOOK_ACCOUNT') }}" placeholder="قم بادخال حساب الفيس بوك">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> تويتر  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="TWITTER_ACCOUNT" class="form-control m-input" value="{{ settings('TWITTER_ACCOUNT') }}" placeholder="قم بادخال  حساب تويتر">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">انستاجرام  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="INSTAGRAM_ACCOUNT" class="form-control m-input" value="{{ settings('INSTAGRAM_ACCOUNT') }}" placeholder="قم بادخال  حساب انستاجرام">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">يوتيوب  </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="YOUTUBE_ACCOUNT" class="form-control m-input" value="{{ settings('YOUTUBE_ACCOUNT') }}" placeholder="قم بادخال  حساب يوتيوب">
                                    </div>
                                </div>

                            </div>
                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        </div>

                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">بيانات عامة</h3>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">حقوق الملكية </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="RIGHT_RESERVED" class="form-control m-input" value="{{ settings('RIGHT_RESERVED') }}" placeholder="حقوق الملكية">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> وصف الفوتر </label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea rows="3" style="resize: none" name="FOOTER_DESCRIPTION" class="form-control m-input" placeholder="وصف الفوتر">{{ settings('FOOTER_DESCRIPTION') }}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        </div>


                    </div>
                </div>
            </form>

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
