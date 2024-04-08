$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: 'DELETE',
            url: url,
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    $('#commentDeletedModal').modal('show');
                } else {
                    console.error('Error: Success message not found');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
