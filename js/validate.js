$(document).ready(function () {

    // AJAX form submission
    $('#submit-btn').on('click', function (e) {
        // Prevent default POST
        e.preventDefault();

        var email = $('#email').val(),
            validate = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);

        // If email address is missing
        if (!email) {
            $('#message').text('Please enter your email address');
            return;
        }

        // Validate email against regex
        if (validate.test(email)) {
            // Post to server (current page)
            $.ajax({
                type : 'post',
                data : 'email='+ email,
                dataType : 'json',
                success : function (data) {
                    // Show success/error message
                    $('#message').text(data['message']);

                    // If you need to carry out further steps if the subscription
                    // was successful, you can evaluate data['success'] - for example:
                    if (data['success']) {
                        // Special success steps
                    }
                }
            });
        } else {
            // Email regex failed
            $('#message').text('Your email address seems to be invalid');
        }
    });

});