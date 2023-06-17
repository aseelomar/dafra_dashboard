<!-- begin::Quick Nav -->

<!--begin::Global Theme Bundle -->
<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>


<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<script defer src="/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/widgets/dropzone.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/validation/form-controls.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>

<script src="/assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>


<!--end::Page Vendors -->

<!--begin::Page Scripts -->

<script src="/assets/odai/common.js" type="text/javascript"></script>
<script src="/assets/odai/datatable.js" type="text/javascript"></script>

<script>
    function readIconURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log(e.target.result);
                $('.img').attr('src', e.target.result);
                $('.img').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readIconURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log(e.target.result);
                $('.img2').attr('src', e.target.result);
                $('.img2').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#news-img").change(function () {
        readIconURL(this);
    });

    $("#news-img2").change(function () {
        readIconURL2(this);
    });

    $('#customFile1').change(function () {
        readIconURL(this);
    });

</script>
