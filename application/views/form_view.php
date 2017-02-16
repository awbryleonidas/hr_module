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
		echo form_open('employee/submit'. $type, $data);
		echo isset($error)? $error: '';
	?>
		<div class="form-group">
			<label for="">Employee ID</label>
			<input class="form-control" id="employee_id"  name="employee_id" placeholder="Employee ID" value="<?php echo isset($record['id'])? $record['id']: ''; ?>">
			<div class="col-sm-12">
				<div class="error small"><?php echo form_error("employee_id"); ?></div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Employee First Name</label>
			<input class="form-control" id="employee_firstname" name="employee_firstname" placeholder="First Name" value="<?php echo isset($record['firstname'])? $record['firstname']: ''; ?>">
			<div class="col-sm-12">
				<div class="error small"><?php echo form_error("employee_firstname"); ?></div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Employee Last Name</label>
			<input class="form-control" id="employee_lastname" name="employee_lastname" placeholder="Last Name" value="<?php echo isset($record['lastname'])? $record['lastname']: ''; ?>">
			<div class="col-sm-12">
				<div class="error small"><?php echo form_error("employee_lastname"); ?></div>
			</div>
		</div>

		<a class="btn btn-default" href="<?php echo site_url('admin/employee')?>">Cancel</a>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
</div>