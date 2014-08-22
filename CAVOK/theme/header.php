 <div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="/"><img src="<?php echo HTTP_PATH; ?>images/logo_s.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                 <li class="odd">
                    <a href="<?php echo HTTP_PATH; ?>log">
                    <span class="count"></span>
                    <span class="head-icon iconfa-pencil" style="font-size: 40px;"></span>
                    <span class="headmenu-label">Log-A-Flight</span>
                    </a>
                </li>
                <li class="odd">
                    <a href="<?php echo HTTP_PATH; ?>pilot/logs">
                    <span class="count"></span>
                    <span class="head-icon iconfa-plane" style="font-size: 40px;"></span>
                    <span class="headmenu-label">My Flights</span>
                    </a>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="/images/profile.jpg" alt="" />
                        <div class="userinfo">
                            <h5><?php echo Session::get('uName'); ?> <small>- <?php echo Session::get('uMail'); ?></small></h5>
                            <ul>
                                <li><a href="<?php echo HTTP_PATH; ?>pilot">Pilot Profile</a></li>
                                <li><a href="<?php echo HTTP_PATH; ?>pilot/edit">Update Profile</a></li>
                                <li><a href="<?php echo HTTP_PATH; ?>login/logout">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Services</li>
                <li><a href="<?php echo HTTP_PATH; ?>log"><span class="iconfa-pencil"></span> Log-A-Flight</a></li>
                <li><a href="<?php echo HTTP_PATH; ?>pilot"><span class="iconfa-user"></span> Personal Data</a></li>
                <?php if(Session::get('eNG') == false): ?>
                <li><a href="<?php echo HTTP_PATH; ?>pilot/logs"><span class="iconfa-plane"></span> My Flights</a></li>
                <?php endif; ?>
                <li><a href="<?php echo HTTP_PATH; ?>log/issue"><span class="iconfa-wrench"></span> Maintenance Issue</a></li>
                <li><a href="<?php echo HTTP_PATH; ?>booking"><span class="iconfa-calendar"></span> Bookings</a></li>  
                 <?php if(Session::get('HUN') || Session::get('ENG')): ?>
                <li class="nav-header">Online Theoretical Tests</li>
                <?php if(Session::get('HUN')): ?>
                <li class="dropdown"><a href=""><span class="icon-pencil"></span>Theory (HUN)</a>
                    <ul>
                        <li><a href="<?php echo HTTP_PATH; ?>docs/theory_manual_hun.pdf">Read Me</a></li>
                    	<li><a href="<?php echo HTTP_PATH; ?>theory/airlaw/hun">Air Law</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/agk/hun">Aircraft General Knowledge</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/perf/hun">Flight Perf. and Planning</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/human/hun">Human Performance</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/meteor/hun">Meteorology</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/nav/hun">Navigation</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/ops/hun">Operational Procedures</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/prince/hun">Principles of Flight</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/com/hun">Communication</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/caa/hun">CAA Mock Exam</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Session::get('ENG')): ?>
                <li class="dropdown"><a href=""><span class="icon-pencil"></span>Theory (EN)</a>
                    <ul>
                        <li><a href="<?php echo HTTP_PATH; ?>docs/theory_manual_eng.pdf">Read Me</a></li>
                    	<li><a href="<?php echo HTTP_PATH; ?>theory/airlaw/en">Air Law</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/agk/en">Aircraft General Knowledge</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/perf/en">Flight Perf. and Planning</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/human/en">Human Performance</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/meteor/en">Meteorology</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/nav/en">Navigation</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/ops/en">Operational Procedures</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/prince/en">Principles of Flight</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/com/en">Communication</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>theory/caa/en">CAA Mock Exam</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(Session::get('aID') == true || Session::get('oPS') == true || Session::get('aM') == true || Session::get('eNG') == true): ?>
                <li class="nav-header">Extended Services</li>
                <?php if(Session::get('aID') == true || Session::get('oPS') == true || Session::get('aM') == true): ?>
                <li><a href="<?php echo HTTP_PATH; ?>pilots"><span class="iconfa-group"></span> Pilot Database</a></li>
                <?php endif; ?>
                 <li class="dropdown"><a href=""><span class="iconfa-plane"></span> Flight Logs</a>
                    <ul>
                    	<li><a href="<?php echo HTTP_PATH; ?>logs/havok">HA-VOK</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>logs/hajda">HA-JDA</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>logs/havoa">HA-VOA</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>logs">All Aircraft</a></li>
                    </ul>
                </li> 
                <li><a href="<?php echo HTTP_PATH; ?>blacklist"><span class="iconfa-lock"></span> Blacklist</a></li>
                <!-- <li><a href="<?php echo HTTP_PATH; ?>reports"><span class="iconfa-edit"></span> Reports</a></li> -->
                <li class="dropdown"><a href=""><span class="iconfa-book"></span> Maintenance</a>
                    <ul>
                    	<li><a href="<?php echo HTTP_PATH; ?>ticket">Tickets</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>ticket/resolved">Resolved</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>aircrafts">Aircrafts</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>trash">Deleted Flights</a></li>
                    </ul>
                </li>
                <?php if(Session::get('aID') == true || Session::get('aM') == true): ?>
                <li class="dropdown"><a href=""><span class="iconfa-cogs"></span> System</a>
                    <ul>
                    	<li><a href="<?php echo HTTP_PATH; ?>info/users">Manage Users</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>info">Change Log</a></li>
                      <!--  <li><a href="<?php echo HTTP_PATH; ?>info/history">History</a></li> -->
                       <!-- <li><a href="<?php echo HTTP_PATH; ?>info/reports">Usage Reports</a></li>-->
                    </ul>
                </li>
               
                <li class="dropdown"><a href=""><span class=" iconfa-tags"></span> Manage Balance</a>
                    <ul>
                    	<li><a href="<?php echo HTTP_PATH; ?>balance">Balances</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>balance/history">History</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>trainings">Trainings/Rates</a></li> 
                    </ul>
                </li> 
                
             <!--   <li><a href="<?php echo HTTP_PATH; ?>reports"><span class="iconfa-signal"></span> Reports</a></li> -->
                <li><a href="<?php echo HTTP_PATH; ?>bookings"><span class="iconfa-calendar"></span> Manage Bookings</a></li>
               <!-- <li><a href="<?php echo HTTP_PATH; ?>pilots/mail"><span class="iconfa-envelope"></span> Mass Mail</a></li>-->
                <?php endif; ?>
                <li class="nav-header">Online Home Examination</li>
                <?php if(Session::get('EXAMS')): ?>
                <li><a href="<?php echo HTTP_PATH; ?>exams"><span class="icon-eye-open"></span>Exam Admin</a></li>
                <?php endif; ?>
                <?php if(Session::get('EXAMS_HU') || Session::get('EXAMS') ): ?>
                 <li class="dropdown"><a href=""><span class="icon-pencil"></span> Theory Exams (HUN)</a>
                    <ul>
                        <li><a href="<?php echo HTTP_PATH; ?>docs/theory_manual_hun.pdf">Read Me</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/airlaw/hun">Air Law</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/agk/hun">Aircraft General Knowledge</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/perf/hun">Flight Perf. and Planning</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/human/hun">Human Performance</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/meteor/hun">Meteorology</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/nav/hun">Navigation</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/ops/hun">Operational Procedures</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/prince/hun">Principles of Flight</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/com/hun">Communication</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Session::get('EXAMS_EN') || Session::get('EXAMS')): ?>
                 <li class="dropdown"><a href=""><span class="icon-pencil"></span> Theory Exams (EN)</a>
                    <ul>
                        <li><a href="<?php echo HTTP_PATH; ?>docs/theory_manual_eng.pdf">Read Me</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/airlaw/en">Air Law</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/agk/en">Aircraft General Knowledge</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/perf/en">Flight Perf. and Planning</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/human/en">Human Performance</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/meteor/en">Meteorology</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/nav/en">Navigation</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/ops/en">Operational Procedures</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/prince/en">Principles of Flight</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/com/en">Communication</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                 <?php if(Session::get('EXAMS_EN') || Session::get('EXAMS') || Session::get('EXAMS_HU')): ?>
                 <li class="dropdown"><a href=""><span class="icon-pencil"></span>Additional Exams</a>
                    <ul>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/c172/en">C172</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/c152/en">C152</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/at3/en">AT3</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/p2006t/en">P2006T</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/c172/hun">C172 (HU)</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/c152/hun">C152 (HU)</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/at3/hun">AT3 (HU)</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/airport/en">LHGD Proc. (EN)</a></li>
                        <li><a href="<?php echo HTTP_PATH; ?>exams/airport/hun">LHGD Proc. (HU)</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                
                
                <?php endif; ?>
                <li class="nav-header">User</li>
                <li><a href="<?php echo HTTP_PATH; ?>login/logout"><span class="iconfa-minus-sign"></span> Log Out</a></li>           
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
     <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><?php echo $res['places']['breadcrumb']; ?></li>
            
            <li class="right">
                <a href="/" class="dropdown-toggle"><i class="iconfa-calendar"></i> <?php echo SYS_DATE; ?></a>
            </li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="<?php echo $res['places']['logo']; ?>"></span></div>
            <div class="pagetitle">
                <h5><?php echo $res['places']['subtitle']; ?></h5>
                <h1><?php echo $res['places']['title']; ?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
         