<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>CAVOK | Pilot Monitoring and Online Journey Log</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo THEME_HTTP; ?>css/bootstrap.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo THEME_HTTP; ?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo THEME_HTTP; ?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo THEME_HTTP; ?>css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo THEME_HTTP; ?>js/jquery.min.js"></script>

	<!-- Nice Scroll -->
	<script src="<?php echo THEME_HTTP; ?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo THEME_HTTP; ?>js/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo THEME_HTTP; ?>js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo THEME_HTTP; ?>js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo THEME_HTTP; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo THEME_HTTP; ?>js/eakroko.js"></script>
        <script src="<?php echo THEME_HTTP; ?>dt-js/custom-dt.js"></script>
        <script>
            $(document).ready(function() {
                $('#modal-1').trigger('click');

            });
        </script>

	<!--[if lte IE 9]>
		<script src="<?php echo THEME_HTTP; ?>js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->


	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo THEME_HTTP; ?>img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo THEME_HTTP; ?>img/apple-touch-icon-precomposed.png" />

</head>
<body class='login theme-satgreen'>
	<div class="wrapper">
            <center>
		<h1>
                    <img src="images/logo_s.png" alt="" class='retina-ready'></br>
		</h1>
            </center>
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form action="login/run" method='post' class='form-validate' id="test">
				<div class="form-group">
					<div class="username controls">
                                            <input id="username" type="text" name='username' placeholder="User name" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="form-group">
					<div class="pw controls">
                                            <input id="password" type="password" name="passwd" placeholder="Password" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Login" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				<a href="mailto:operations@cavokaviation.com">
					<span>Forgot password?</span>
				</a>
			</div>
		</div>
	</div>
    <a style="display: none;" id="modal-1" href="#modal-1" role="button" class="btn notify" data-notify-time="1000" data-notify-title="Attention:" data-notify-message="The system is undergoing some maintenance. Please check back later!">AT</a>
</body>
</html>