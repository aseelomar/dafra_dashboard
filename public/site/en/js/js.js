$(document).ready(function () {
    $(".dropdown-content").hide();
    $(".dropdown").click(function () {
        $(".dropdown-content").toggle();
    });
    $(".dropbtn").click(function () {
        $(".dropdown-content").toggle();
    });
    $(".dpdown").hide();
    $("#menu").click(function () {
        $(".dpdown").toggle();
    });
    $(".dpdown2").hide();
    $(".dropbtn2").click(function () {
        $(".dpdown2").toggle();
    });

    window.onclick = function (event) {
        if (!event.target.matches('.dropdown') && !event.target.matches('.dropbtn')) {
            $(".dropdown-content").hide();

        }
        if (!event.target.matches('#menu') && !event.target.matches('.dropbtn2')) {
            $(".dpdown").hide();
            $(".dpdown2").hide();
        }
    }
    $("#bottom-arrow").hide();
    $(".accordion").click(function () {
        $("#top-arrow").hide();
        $(".panel").show();
        $("#bottom-arrow").show();

    });



    $("#bottom-arrow").click(function () {
        $("#bottom-arrow").hide();
        $(".panel").hide();
        $("#top-arrow").show();
    });
    //////////////////////////////////////////////////////////////////
    setMode();
    function setMode() {
        const currentTheme = localStorage.getItem('theme');


        if (currentTheme) {
            if (currentTheme == 'light') {
                $("#dark").attr('src', 'imgs/dark.png');
                $("#light").attr('src', 'imgs/light.png');
                $("#gov").attr('src', 'imgs/lightgov.png');
                $("#view").attr('src', 'imgs/view-10.png');
                $("#clock").attr('src', 'imgs/clock-10.png');
                $("#newlogo").attr('src', 'imgs/logo.png');
                $("#newlogo").css('width', '110');
                $("#newlogo").css('height', '130');



            } else {

                $("#dark").attr('src', 'imgs/darkicon.png');
                $("#light").attr('src', 'imgs/lighticon.png');
                $("#gov").attr('src', 'imgs/dark-gov.png');
                $("#view").attr('src', 'imgs/view.png');
                $("#clock").attr('src', 'imgs/clock.png');
                $("#newlogo").attr('src', 'imgs/newlogo.png');




            }
            document.documentElement.setAttribute('data-theme', currentTheme);


        }
    }


    $('#dark').click(function () {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        setMode();
    });
    $('#light').click(function () {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        setMode();
    });

});