<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="rtl" dir="rtl" style="direction: rtl">

<!-- begin::Head -->
<head>
  @include('admin.includes.head');

        <style>
            h1,h2,h3,h4,h5,h6,p,button,span {
                color: #463362 !important;
            }
        </style>

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(/assets/login.png);">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="/assets/logo.png">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">تسجيل الدخول للوحة التحكم</h3>
                    </div>

                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button data-dismiss="alert" type="button" class="close">
                                x
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form class="m-login__form m-form" action="{{ route('admin.login')  }}" method="post">

                        @csrf

                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="{{ trans('admin.email') }}" name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ trans('admin.password') }}" name="password">
                        </div>



                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--light">
                                    <input type="checkbox" name="remember"> تذكرني
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">دخول </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--begin::Page Scripts -->


<!--end::Page Scripts -->
</body>

@include('admin.includes.scripts')

<!-- end::Body -->
</html>
