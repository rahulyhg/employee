jQuery(document).ready(function ($) {

    //Back To top
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 400) {
            jQuery('.back-to-top').addClass('active');
        } else {
            jQuery('.back-to-top').removeClass('active');
        }
    });
    jQuery('.back-to-top').on('click', function () {
        jQuery('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });
});