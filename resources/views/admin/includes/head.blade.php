<meta charset="utf-8" />
<title> Al-Dafra | @yield('title') </title>
<meta name="description" content="Latest updates and statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
{{--<base href="{{ asset('/') }}">--}}




<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families":["Tajawal&display=swap"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<style>
    body,h1,h2,h3,h4,h5,h6,p,a,strong,select,option,optgroup,li,ul,input,button,a[data-original-title='*'],span:not([role="presentation"]):not(.la):not(.check-mark) {
        font-family: 'Tajawal', sans-serif !important;
    }
    h3,label {
        font-weight: 700 !important;
    }

    thead {
        font-size: 16px !important;
        font-weight: bold;
    }

    .note-editing-area {
        height: 400px;
    }

    .custom-file-upload {
        width: 100%;
        height: 250px;
        background: url(/img-bg.png);
        border: 1px solid #ddd;
        position: relative;
        z-index: 1;
    }

    .custom-file-upload .icon img:nth-child(1) {
        position: absolute;
        right: 45%;
        top: 50%;

    }
    .custom-file-upload input[type=file] {
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        cursor: pointer;
    }

    .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
        color: #FFF !important;
    }

    .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item>.m-menu__link .m-menu__link-text {
        color: #a2a6c5 !important;
        font-size: 0.9rem !important;
    }

</style>

<!--end::Web font -->

<!--begin::Global Theme Styles -->
<!--<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />-->

<link href="/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
<!--<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->

<link href="/assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

<!--end::Global Theme Styles -->

<!--begin::Page Vendors Styles -->
<!--<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />-->

<link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />

<link href="/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css"/>




<!--end::Page Vendors Styles -->
<link rel="shortcut icon" href="/site/imgs/logo.jpg" />
