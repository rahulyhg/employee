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