<?php $item = $res['flights'];?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Hint: </strong>To remove 'tacho' or 'hobbs' <i>masks</i>, click on the appropriate field and press <b>SHIFT + Q</b> !
</div>
<div class="box box-color box-bordered">
    <div class="box-title">
	<h3>
            <i class="fa fa-table"></i>
		Flight # <?php echo $item['ID'] ?>
	</h3>
    </div>
    <div class="box-content nopadding">
         <form action="<?php echo HTTP_PATH; ?>/flights/edit/<?php echo $item['ID']; ?>" method="post" class="form-horizontal">
        <table class="table table-bordered">
            <tr>
                <td class="td-head" colspan="2"><b>Date: </b></td><td colspan="2"> <input type="text" name="date" id="textfield" class="form-control datepick" data-date-format="yyyy-mm-dd" value="<?php echo $item['date'] ?>"></td>
                <td class="td-head" colspan="2"><b>Registration: </b></td><td colspan="2"><select name="ac_callsign" id="select" class="chosen-select form-control"><?php echo $res['pilot_options'][2]; ?></select></td>
            </tr>
            <tr>
                <td class="td-head" colspan="2"><b>PIC: </b></td><td colspan="2"><select name="pilot_id" id="select" class="chosen-select form-control col-xs-4"><?php echo $res['pilot_options'][0]; ?></select> </td>
                <td class="td-head" colspan="2"><b>Student / Supervisor: </b></td><td colspan="2"><select name="student_id" id="select" class="chosen-select form-control"><?php echo $res['pilot_options'][1]; ?></select></td>
            </tr>
            <tr>
                <td class="td-head" colspan="2"><b>Type of Operation: </b></td><td colspan="2"><select name="type_of_operation" id="select" class="chosen-select form-control"><?php echo $res['pilot_options'][3]; ?></select></td>
                <td class="td-head" colspan="4" style="text-align: left; margin-left: 20px; margin-right: 15px;">
                    <span class="dual-dt"><input name="dual" value="dual" type="checkbox" id="c13" class="icheck-me dual-dt" data-skin="square" data-color="green" <?php if($item['dual']){ echo 'checked'; } ?> ></span>
                    <label class="inline hover" for="c13">Dual <i>(the flight took place with an instructor on duty)</i></label>
                </td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Flight Information</i></b></td>
            </tr>
            <tr>
                <td class="td-head"><b>Departure: </b></td><td style="min-width: 85px;"><input class="form-control icao-mask" type="text" name="departure" value="<?php echo $item['departure'] ?>" /></td>
                <td class="td-head"><b>Block Off: </b></td><td style="min-width: 85px;"><input class="form-control time-mask" type="text" name="block_off" value="<?php echo $item['block_off'] ?>" /></td>
                <td class="td-head"><b>Day / Night: </b></td><td style="min-width: 85px;"><select class="form-control" name="day_night" id="select"><?php echo mCore::renderDropDownOptions(array(array('OP' => 'DAY'), array('OP' => 'NIGHT')), array('value' => $item['day_night'], 'value_key' => 'OP', 'name_key' => 'OP')); ?> </select></td>
                <td class="td-head"><b>Rules: </b></td><td style="min-width: 85px;"><select class="form-control" name="vfr_ifr" id="select"><?php echo mCore::renderDropDownOptions(array(array('OP' => 'VFR'), array('OP' => 'IFR')), array('value' => $item['vfr_ifr'], 'value_key' => 'OP', 'name_key' => 'OP')); ?> </select></td>
            </tr>
            <tr>
                <td class="td-head"><b>Arrival: </b></td><td style="min-width: 85px;"><input class="form-control icao-mask" type="text" name="arrival" value="<?php echo $item['arrival'] ?>" /></td>
                <td class="td-head"><b>Block On: </b></td><td style="min-width: 85px;"><input class="form-control time-mask" type="text" name="block_on" value="<?php echo $item['block_on'] ?>" /></td>
                <td class="td-head"><b>Take Off (UTC): </b></td><td style="min-width: 85px;"><input class="form-control time-mask" type="text" name="take_off" value="<?php echo $item['take_off'] ?>" /></td>
                <td class="td-head"><b>Landing (UTC): </b></td><td style="min-width: 85px;"><input class="form-control time-mask" type="text" name="landing_time" value="<?php echo $item['landing_time'] ?>" /></td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Operational Information</i></b></td>
            </tr>
            <?php if(ACL::is_extended('flights')): ?>
            <tr>
                <td class="td-head"><b>Tacho On: </b></td><td style="min-width: 85px;"><input id="engine_in" class="form-control ac-mask1" type="text" name="engine_in" value="<?php echo $item['engine_in'] ?>" /></td>
                <td class="td-head"><b>Tacho Off: </b></td><td style="min-width: 85px;"><input id="engine_out" class="form-control ac-mask1" type="text" name="engine_out" value="<?php echo $item['engine_out'] ?>" /></td>
                <td class="td-head"><b>Engine Time: </b></td><td style="min-width: 85px;" colspan="1"><input id="engine_time" class="form-control" type="text" name="engine_time" value="<?php echo $item['engine_time'] ?>" disabled /></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="td-head"><b>Hobbs In: </b></td><td style="min-width: 85px;"><input name="hobbs_in" id="hobbs_in" class="form-control ac-mask1" type="text" value="<?php echo $item['hobbs_in'] ?>" /></td>
                <td class="td-head"><b>Hobbs Out: </b></td><td style="min-width: 85px;"><input name="hobbs_out" id="hobbs_out" class="form-control ac-mask1" type="text" value="<?php echo $item['hobbs_out'] ?>" /></td>
                <td class="td-head"><b>Total Time: </b></td><td style="min-width: 85px;"> <input id="total_time" class="form-control" type="text" value="<?php echo $item['total_time'] ?>" disabled /></td>
                <td class="td-head"><b>Landings: </b></td><td style="min-width: 85px;"><input name="landing" class="form-control" type="number" value="<?php echo $item['landing'] ?>" /></td></td>
                
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: center;"><b><i>Remarks</i></b></td>
            </tr>
            <tr>
                <td colspan="8">
                    <textarea name="remarks" class="span12" rows="3" style="width: 100%;"><?php if($item['remarks']){ echo $item['remarks']; } ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="td-head" colspan="8" style="text-align: right; line-height: 50px;">
                    By sending this form, I here by certify the legibility of the information that I have provided above: 
                    <input type="submit" class="btn btn-lightred" value="Save Flight">
                    <?php if(ACL::is_extended('flights')): ?>
                    |
                    <a href="#modal-1" role="button" class="btn" data-toggle="modal" style="background-color: #ffd922;">Remove Flight</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        </form>    
    </div>
</div>
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
						Are you sure you would like to move this flight to the 'Trash'?
					</p>
				</div>
				<!-- /.modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="/flights/trash/<?php echo $item['ID']; ?>" class="btn" style="background-color: #ffd922;">Remove Flight</a>
				</div>
				<!-- /.modal-footer -->
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>