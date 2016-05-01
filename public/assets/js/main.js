(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

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
        $('html, body').animate({ scrollTop: '0px' }, 800);
        return false;
    });

    $('.f_delete').on('click', function (e) {
        e.preventDefault();

        var r = confirm($(this).data('alert'));
        if (r == true) {
            location.href = $(this).attr('href');
        }
    });

    $('.go-to-main').on('click', function (e) {
        $.scrollTo('#main', 500);
    });
});

},{}]},{},[1]);

//# sourceMappingURL=main.js.map
