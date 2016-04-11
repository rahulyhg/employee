(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

jQuery(document).ready(function ($) {
    $('.form-group input').on('click', function (e) {
        e.preventDefault();

        $(this).parent().removeClass('has-errors');
    });

    $('#addEmployee').on('click', function (e) {
        e.preventDefault();

        var $form = $('.form-employee');
        var data = $form.serializeArray();
        var url = $form.attr('action');
        var method = $form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'json',
            success: function success(res) {
                if (!res.return) {
                    $('.form-group .errors').html('');
                    $('.form-group').removeClass('has-errors');

                    var errors = res.errors;
                    var keys = Object.keys(errors);
                    for (var i = 0; i < keys.length; i++) {

                        var key = keys[i];
                        var $container = $('.form-employee [data-input=' + key + ']');
                        $container.addClass('has-errors');

                        var $container_errors = $container.find('.errors');

                        var arr = errors[key];
                        for (var j = 0; j < arr.length; j++) {
                            $container_errors.append(arr[j]);
                            console.log(arr[j]);
                        }
                    }
                } else {
                    window.location.href = res.http_refer;
                }
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });
});

},{}]},{},[1]);

//# sourceMappingURL=form.js.map
