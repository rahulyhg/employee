jQuery(document).ready(function ($) {

    //Back To top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });
    $('.back-to-top').on('click', function () {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

    $('.f_delete').on('click', function (e) {
        e.preventDefault();

        var r = confirm("Are you sure!");
        if (r == true) {
            location.href = $(this).attr('href');
        }
    });
});