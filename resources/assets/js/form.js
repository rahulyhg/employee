jQuery(document).ready(function ($) {
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
                    alert('Not valid!');
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