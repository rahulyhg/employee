jQuery(document).ready(function ($) {
    $('.form-group input').on('focus', function (e) {
        e.preventDefault();

        $(this).parent().removeClass('has-errors');
    });

    $('#addEmployee').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);

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
                    window.location.href = res.http_refer;
                }
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });

    $('#addDepartment').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);

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
                    window.location.href = res.http_refer;
                }
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });

    $('#addUser').on('click', function (e) {
        e.preventDefault();
        var $this_button = $(this);
        $this_button.attr('disabled', true);

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
            },
            success: function (res) {
                if (!res.return) {
                    $('.form-group .errors').html('');
                    $('.form-group').removeClass('has-errors');

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
                    window.location.href = res.http_refer;
                }
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });
});