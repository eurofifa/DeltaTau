<div id="navigation">
    <div class="container-fluid">
        <a href="#" id="brand"><img src="images/logo_s.png" alt="cavok logo" height="35" class='retina-ready'></a>
        <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">
            <i class="fa fa-bars"></i>
        </a>
        <ul class='main-nav'>
            <li>
                <a href="index.html">
                    <span>My Flights</span>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <span>Personal Info</span>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>PPL(A) Theory</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="forms-basic.html">Basic forms</a>
                    </li>
                    <li>
                        <a href="forms-extended.html">Extended forms</a>
                    </li>
                    <li>
                        <a href="forms-validation.html">Validation</a>
                    </li>
                    <li>
                        <a href="forms-wizard.html">Wizard</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Layouts</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="layouts-sidebar-hidden.html">Default hidden sidebar</a>
                    </li>
                    <li>
                        <a href="layouts-sidebar-right.html">Sidebar right side</a>
                    </li>
                    <li>
                        <a href="layouts-color.html">Different default color</a>
                    </li>
                    <li>
                        <a href="layouts-fixed.html">Fixed layout</a>
                    </li>
                    <li>
                        <a href="layouts-fixed-topside.html">Fixed topbar and sidebar</a>
                    </li>
                    <li class='dropdown-submenu'>
                        <a href="#">Mobile sidebar</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="layouts-mobile-slide.html">Slide</a>
                            </li>
                            <li>
                                <a href="layouts-mobile-button.html">Button</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="layouts-footer.html">Footer</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="user">
            <div class="dropdown">
                <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo Session::get('uName'); ?>
                    <img src="img/demo/user-avatar.jpg" alt="">
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="more-userprofile.html">Edit profile</a>
                    </li>
                    <li>
                        <a href="#">Account settings</a>
                    </li>
                    <li>
                        <a href="<?php echo HTTP_PATH; ?>login/logout">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="content">
