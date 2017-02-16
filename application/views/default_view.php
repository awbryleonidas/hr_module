<div class="row">
	<form action="<?php echo site_url();?>admin/time_table" method="post">

		<div class="form-group">
			<label>Please select Employee ID</label>
			<select class="form-control" name="employee_id">
				<option value="2017-001">2017-001, (User, Test)</option>
			</select>
		</div>

		<div class="col-md-12 form-group">
			<a class="btn btn-sm btn-default" href="<?php echo site_url('site'); ?>"><span class="fa fa-angle-left"></span> Back</a>
			<button type="submit" class="btn btn-sm btn-info"><span class="fa fa-eye"></span> View</button>
			<a class="btn btn-sm btn-primary" href=""><span class="fa fa-download"></span> Download</a>
		</div>

	</form>
</div>