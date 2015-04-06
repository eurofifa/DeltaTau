<?php $item = $res['flights'];?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Notice: </strong> This flight has been removed from the <i>log</i>!
</div>
<div class="box box-color box-bordered">
    <div class="box-title">
	<h3>
            <i class="fa fa-table"></i>
		Deleted Flight # <?php echo $item['ID'] ?>
	</h3>
    </div>
    <div class="box-content nopadding">
        
        <table class="table table-bordered">
            <tr>
                <td class="td-head" colspan="2"><b>Date: </b></td><td colspan="2"> <?php echo $item['date'] ?></td>
                <td class="td-head" colspan="2"><b>Registration: </b></td><td colspan="2"> <?php echo $item['ac_callsign'] ?></td>
            </tr>
            <tr>
                <td class="td-head" colspan="2"><b>PIC: </b></td><td colspan="2"><a href="<?php echo HTTP_PATH; ?>pilot/<?php echo $item['pilot_id'] ?>"> <?php echo $item['pilot_name'] ?></a></td>
                <td class="td-head" colspan="2"><b>Student / Supervisor: </b></td><td colspan="2"><a href="<?php echo HTTP_PATH; ?>pilot/<?php echo $item['student_id'] ?>"> <?php echo $item['student_name'] ?></a></td>
            </tr>
            <tr>
                <td class="td-head" colspan="2"><b>Type of Operation: </b></td><td colspan="2"><?php echo $item['type_of_operation'] ?></td>
                <td class="td-head" colspan="4" style="text-align: left; margin-left: 20px; margin-right: 15px;">
                    <span class="dual-dt"><input name="dual" value="dual" type="checkbox" id="c13" class="icheck-me dual-dt" data-skin="square" data-color="green" disabled <?php if($item['dual']){ echo 'checked'; } ?> ></span>
                    <label class="inline hover" for="c13">Dual <i>(the flight took place with an instructor on duty)</i></label>
                </td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Flight Information</i></b></td>
            </tr>
            <tr>
                <td class="td-head"><b>Departure: </b></td><td style="min-width: 85px;"> <?php echo $item['departure'] ?></td>
                <td class="td-head"><b>Block Off: </b></td><td style="min-width: 85px;"> <?php echo $item['block_off'] ?></td>
                <td class="td-head"><b>Day / Night: </b></td><td style="min-width: 85px;"> <?php echo $item['day_night'] ?></td>
                <td class="td-head"><b>Rules: </b></td><td style="min-width: 85px;"> <?php echo $item['vfr_ifr'] ?></td>
            </tr>
            <tr>
                <td class="td-head"><b>Arrival: </b></td><td style="min-width: 85px;"> <?php echo $item['arrival'] ?></td>
                <td class="td-head"><b>Block On: </b></td><td style="min-width: 85px;"> <?php echo $item['block_on'] ?></td>
                <td class="td-head"><b>Take Off (UTC): </b></td><td style="min-width: 85px;"> <?php echo $item['take_off'] ?></td>
                <td class="td-head"><b>Landing (UTC): </b></td><td style="min-width: 85px;"> <?php echo $item['landing_time'] ?></td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Operational Information</i></b></td>
            </tr>
            <?php if(ACL::is_extended('flights')): ?>
            <tr>
                <td class="td-head"><b>Tacho On: </b></td><td style="min-width: 85px;"> <?php echo $item['engine_in'] ?></td>
                <td class="td-head"><b>Tacho Off: </b></td><td style="min-width: 85px;"> <?php echo $item['engine_out'] ?></td>
                <td class="td-head"><b>Engine Time: </b></td><td style="min-width: 85px;" colspan="3"> <?php echo $item['engine_time'] ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="td-head"><b>Hobbs In: </b></td><td style="min-width: 85px;"> <?php echo $item['hobbs_in'] ?></td>
                <td class="td-head"><b>Hobbs Out: </b></td><td style="min-width: 85px;"> <?php echo $item['hobbs_out'] ?></td>
                <td class="td-head"><b>Total Time: </b></td><td style="min-width: 85px;"> <?php echo $item['total_time'] ?></td>
                <td class="td-head"><b>Landings: </b></td><td style="min-width: 85px;"> <?php echo $item['landing'] ?></td>
                
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Remarks</i></b></td>
            </tr>
            <tr>
                <td colspan="8" style="line-height: 75px;"><?php if($item['remarks']){ echo $item['remarks']; }else{ echo 'NIL'; }; ?></td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: right; line-height: 50px;">
                    In order to edit this flight, it needs to be restored: 
                    <?php if(ACL::is_extended('flights')): ?>
                    <a href="#modal-1" role="button" class="btn" data-toggle="modal" style="background-color: #ffd922;">Restore Flight</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php if(ACL::is_extended('flights')) : ?>
<div id="modal-1" class="modal fade in" role="dialog" style="display: none;" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Warning!</h4>
				</div>
				<!-- /.modal-header -->
				<div class="modal-body">
					<p>
                                            Are you sure you would like to <b>restore</b> this flight?
					</p>
				</div>
				<!-- /.modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="/flights/untrash/<?php echo $item['ID']; ?>" class="btn" style="background-color: #ffd922;">Restore Flight</a>
				</div>
				<!-- /.modal-footer -->
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php endif; ?>