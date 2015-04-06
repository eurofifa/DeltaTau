<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?php echo $res['places']['subtitle']; ?></h1>
            </div>
            <div class="pull-right"> 
                <!--
                <ul class="minitiles">
                    <!--
                    <li class='grey'>
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                    <li class='lightgrey'>
                        <a href="#">
                            <i class="fa fa-globe"></i>
                        </a>
                    </li>
                </ul> -->
              <ul class="stats">
                      <!-- <li class='satgreen'>
                           
                        <i class="fa fa-money"></i>
                        <div class="details">
                            <span class="big"></span>
                            <span>Balance</span>
                        </div>
                    </li> -->
                    <li class='lightred'>
                        <i class="fa fa-calendar"></i>
                        <div class="details">
                            <?php mCore::renderDate(); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <?php mCore::generateBreadcrumbs($res['places']['breadcrumb']); ?>
            </ul>
            <div class="close-bread">
                <a href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-title">
                        <h3>
                            <i class="fa fa-bars"></i>
                            <?php echo $res['places']['title']; ?>
                        </h3>
                    </div>
<div class="box-content">