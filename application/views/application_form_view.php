<style>
	.form-group{
		margin-bottom: 30px;
	}
</style>
<div class="row">
	<?php
		$data = array(
			'method' => 'post',
		);
		$type =  isset($record)? '/edit/'. $record['record_id']: '';
		echo form_open('applications/submit'. $type, $data);
		echo isset($error)? $error: '';
	?>

		<div class="form-group">
			<label for="">Application Type</label>
			<select class="form-control" name="application_type">
				<option value=""></option>
				<option value="sick leave">Sick Leave</option>
				<option value="vacation leave">Vacation Leave</option>
				<option value="undertime">Undertime</option>
				<option value="overtime">Overtime</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Reason</label>
			<input class="form-control" id="application_reason"  name="application_reason" placeholder="Reason" value="<?php echo isset($record['id'])? $record['id']: ''; ?>">
			<div class="col-sm-12">
				<div class="error small"><?php echo form_error("employee_id"); ?></div>
			</div>
		</div>
		<div class="form-group">
			<label for="">Date</label>
			<input class="form-control" id="application_date"  name="application_date" placeholder="Reason" value="<?php echo isset($record['id'])? $record['id']: ''; ?>">
			<div class="col-sm-12">
				<div class="error small"><?php echo form_error("employee_id"); ?></div>
			</div>
		</div>

		<a class="btn btn-default" href="<?php echo site_url('employee/applications')?>">Cancel</a>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
</div>

<script>
	$('#application_date').datetimepicker({
		format: 'yyyy-mm-dd hh:ii:ss',
		autoclose: true,
		todayBtn: true,
		//pickerPosition: "bottom-right"
	});
</script>