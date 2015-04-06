<a href="/flights/myflights/<?php echo $res['pid']; ?>" class="btn btn-lightred">All Flight</a> <a href="/flights/trainings/<?php echo $res['pid']; ?>" class="btn btn-grey">Logged Training Flights</a> <a href="/flights/pic/<?php echo $res['pid']; ?>" class="btn btn-lightgrey">Logged PIC Time</a> <a href="/flights/instructions/<?php echo $res['pid']; ?>" class="btn">Logged Instructed Flights</a> </br>
    <?php $item = $res['flights']; ?>
<div class="box box-color box-bordered">
    <div class="box-title">
	<h3>
            <i class="fa fa-table"></i>
		Logged Instructed Flights | Queried Total Time: <?php echo $item['calc']; ?>
	</h3>
    </div>
    <div class="box-content nopadding">
        <?php echo $item['table']; ?>
    </div>
</div>