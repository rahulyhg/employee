jQuery(document).ready(function ($) {
    function redirect(href) {
        window.location.href = href;
    }

    $('.form-group input').on('focus', function (e) {
        e.preventDefault();

        $(this).parent().removeClass('has-errors');
    });

    $('#addEmployee').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);
        $('.form-group .loading').show();

        var $form = $('.form-employee');
        var data = $form.serializeArray();
        var url = $form.attr('action');
        var method = $form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'json',
            complete: function () {
                $this_button.attr('disabled', false);
                $('.form-group .loading').hide();
            },
            success: function (res) {
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
                            console.log(arr[j])
                        }
                    }
                } else {
                    $this_button.attr('disabled', true);
                    $('.form-group .notify-success').css('opacity', 1);
                    setTimeout(redirect, 2000, res.http_refer);
                }
            },
            error: function error(err) {
                alert('Some thing went wrong!');
            }
        });
    });

    $('#addDepartment').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);
        $('.form-group .loading').show();

        var $form = $('.form-department');
        var data = $form.serializeArray();
        var url = $form.attr('action');
        var method = $form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'json',
            complete: function () {
                $this_button.attr('disabled', false);
                $('.form-group .loading').hide();
            },
            success: function (res) {
                if (!res.return) {
                    $('.form-group .errors').html('');
                    $('.form-group').removeClass('has-errors');

                    var errors = res.errors;
                    var keys = Object.keys(errors);
                    for (var i = 0; i < keys.length; i++) {

                        var key = keys[i];
                        var $container = $('.form-department [data-input=' + key + ']');
                        $container.addClass('has-errors');

                        var $container_errors = $container.find('.errors');

                        var arr = errors[key];
                        for (var j = 0; j < arr.length; j++) {
                            $container_errors.append(arr[j]);
                            console.log(arr[j])
                        }
                    }
                } else {
                    $this_button.attr('disabled', true);
                    $('.form-group .notify-success').css('opacity', 1);
                    setTimeout(redirect, 2000, res.http_refer);
                }
            },
            error: function error(err) {
                alert('Some thing went wrong!');
            }
        });
    });

    $('#addUser').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);
        $('.form-group .loading').show();

        var $form = $('.form-user');
        var data = $form.serializeArray();
        var url = $form.attr('action');
        var method = $form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'json',
            complete: function () {
                $this_button.attr('disabled', false);
                $('.form-group .loading').hide();
            },
            success: function (res) {
                $('.form-group .errors').html('');
                $('.form-group').removeClass('has-errors');

                if (!res.return) {
                    var errors = res.errors;
                    var keys = Object.keys(errors);
                    for (var i = 0; i < keys.length; i++) {

                        var key = keys[i];
                        var $container = $('.form-user [data-input=' + key + ']');
                        $container.addClass('has-errors');

                        var $container_errors = $container.find('.errors');

                        var arr = errors[key];
                        for (var j = 0; j < arr.length; j++) {
                            $container_errors.append(arr[j]);
                            console.log(arr[j])
                        }
                    }
                } else {
                    $this_button.attr('disabled', true);
                    $('.form-group .notify-success').css('opacity', 1);
                    setTimeout(redirect, 2000, res.http_refer);
                }
            },
            error: function error(err) {
                alert('Some thing went wrong!');
            }
        });
    });
});