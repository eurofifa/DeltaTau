<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>CAVOK Online Journey Log - Sign In</title>
<link rel="stylesheet" href="<?php echo CSS_LIB; ?>style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_LIB; ?>style.green.css" type="text/css" />
<link rel="stylesheet" href="<?php echo PUB_PATH; ?>preffify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo JS_LIB; ?>jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>jquery.alerts.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>custom.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>elements.js"></script>
<script type="text/javascript" src="<?php echo JS_LIB; ?>iae.js"></script>
</head>
<body class="loginpage">
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo_s.png" alt="" /></div>
        <form id="login" action="login/run" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">All fields are required!</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Enter your username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="passwd" id="password" placeholder="Enter your password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button type="submit" formmethod="post" name="submit">Sign In</button>
            </div>
        </form>
    </div>
</div>
<div class="loginfooter">
    <p>&copy; 2014. Gabor B Magyari. All Rights Reserved.</p>
</div>
</body>
</html>