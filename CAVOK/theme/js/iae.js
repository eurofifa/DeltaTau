jQuery(document).ready(function() {
    jQuery('#login').submit(function() {
        event.preventDefault();
        var u = jQuery('#username').val();
        var p = jQuery('#password').val();
        if (u == '' && p == '') {
            jQuery('.login-alert').fadeIn();
            return false;
        }
        var $form = jQuery(this),
                url = 'login/login';
        var posting = jQuery.post(url, {passwd: p, username: u});
        posting.done(function(data) {
            var content = data;
            if (content === "GRANTED") {
                location.reload();
            } else {
                jQuery('.alert-error').html('Access Denied!');
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });


    });

    jQuery.alerts.dialogClass = 'alert-danger';
    jAlert('The system is down due to framework upgrade. We will get back soon.', 'System Down', function() {
        jQuery.alerts.dialogClass = null; // reset to default
    });

});

