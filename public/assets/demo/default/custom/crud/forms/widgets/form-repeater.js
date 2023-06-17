var FormRepeater={
    init:function(){
        $("#m_repeater_saturday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),
        $("#m_repeater_friday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),

        $("#m_repeater_thursday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),

        $("#m_repeater_wednesday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),

        $("#m_repeater_tuesday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),

        $("#m_repeater_monday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),

        $("#m_repeater_sunday").repeater({
            initEmpty: false,
            defaultValues:{"text-input":"foo"},
            show:function(){
                $(this).slideDown();

                var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
                var BootstrapTimepicker={init:function(){$("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),$("#m_timepicker_2, #m_timepicker_2_modal").timepicker({minuteStep:1,defaultTime:"",showSeconds:!0,showMeridian:!1,snapToStep:!0}),$("#m_timepicker_3, #m_timepicker_3_modal").timepicker({defaultTime:"11:45:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_4, #m_timepicker_4_modal").timepicker({defaultTime:"10:30:20 AM",minuteStep:1,showSeconds:!0,showMeridian:!0}),$("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker({minuteStep:15,showSeconds:false,showMeridian:!1,snapToStep:!0})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});}
            ,hide:function(e){

                $(this).slideUp(e)
            },
        }),
            $("#m_repeater_2").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown()},hide:function(e){confirm("Are you sure you want to delete this element?")&&$(this).slideUp(e)}}),$("#m_repeater_3").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown()},hide:function(e){confirm("Are you sure you want to delete this element?")&&$(this).slideUp(e)}}),$("#m_repeater_4").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown()},hide:function(e){$(this).slideUp(e)}}),$("#m_repeater_5").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown()},hide:function(e){$(this).slideUp(e)}}),$("#m_repeater_6").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown()},hide:function(e){$(this).slideUp(e)}})}};jQuery(document).ready(function(){FormRepeater.init()});
