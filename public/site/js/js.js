$(document).ready(function () {
    $(".dropdown-content").hide(200);
    $(".dropdown").click(function () {
        $(".dropdown-content").toggle();
    });
    $(".dropbtn").click(function () {
        $(".dropdown-content").toggle();
    });
    $(".dpdown").hide(200);
    $("#menu").click(function () {
        $(".dpdown").toggle();
    });
    $(".dpdown2").hide(200);
    $(".dropbtn2").click(function () {
        $(".dpdown2").toggle();
    });

    window.onclick = function (event) {
        if (!event.target.matches('.dropdown') && !event.target.matches('.dropbtn')) {
            $(".dropdown-content").hide(200);

        }
        if (!event.target.matches('#menu') && !event.target.matches('.dropbtn2')) {
            $(".dpdown").hide(200);
            $(".dpdown2").hide(200);
        }
    }
    $("#bottom-arrow").hide(200);
    $(".accordion").click(function () {
        $("#top-arrow").hide(400);
        $(".panel").show(400);
        $("#bottom-arrow").show(400);

    });



    $("#bottom-arrow").click(function () {
        $("#bottom-arrow").hide(400);
        $(".panel").hide(400);
        $("#top-arrow").show(400);
    });
    //////////////////////////////////////////////////////////////////
    setMode();
    function setMode() {
        const currentTheme = localStorage.getItem('theme');


        if (currentTheme) {
            if (currentTheme == 'light') {
                $("#dark").attr('src', '/site/imgs/dark.png');
                $("#light").attr('src', '/site/imgs/light.png');
                $("#gov").attr('src', '/site/imgs/lightgov.png');
                $("#view").attr('src', '/site/imgs/view-10.png');
                $("#clock").attr('src', '/site/imgs/clock-10.png');
                $("#newlogo").attr('src', '/site/imgs/logo.png');
                $("#newlogo").css('width', '110');
                $("#newlogo").css('height', '130');



            } else {

                $("#dark").attr('src', '/site/imgs/darkicon.png');
                $("#light").attr('src', '/site/imgs/lighticon.png');
                $("#gov").attr('src', '/site/imgs/dark-gov.png');
                $("#view").attr('src', '/site/imgs/view.png');
                $("#clock").attr('src', '/site/imgs/clock.png');

                $("#newlogo").attr('src', '/site/imgs/newlogo.png');




            }
            document.documentElement.setAttribute('data-theme', currentTheme);


        }
    }


    $('#dark').click(function () {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        $('.general').removeClass('filter');
        setMode();

        $.get('/setDarkMode', function () {
            window.location.reload();
        })
    });
    $('#light').click(function () {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        $('.general').addClass('filter');
        setMode();

        $.get('/setDayMode', function () {
            window.location.reload();
        })
    });

});
