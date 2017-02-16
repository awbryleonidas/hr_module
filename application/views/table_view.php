
<?php $employee = $this->session->userdata('user_employee_id'); ?>
	<style type="text/css">
		.dataTables_filter{
			position: absolute;
			left: 100px;
			top: -38px;
			width: 400px;
		}
	</style>
	<script>
		if ( typeof $.fn.dataTable == "function" && typeof $.fn.dataTableExt.fnVersionCheck == "function" && $.fn.dataTableExt.fnVersionCheck('1.9.2')/*older versions should work too*/ )
		{
			$.fn.dataTableExt.oApi.clearSearch = function ( oSettings )
			{

				var table = this;
				var clearSearch = $('<div style="position:absolute; right: -5px; top: 3px; cursor: pointer;">x</div>');
				$(clearSearch).click( function ()
				{
					table.fnFilter('');
				});
				$(oSettings.nTableWrapper).find('div.dataTables_filter').append(clearSearch);
				$(oSettings.nTableWrapper).find('div.dataTables_filter label').css('margin-right', '-16px');//16px the image width
				$(oSettings.nTableWrapper).find('div.dataTables_filter input').css('padding-right', '16px');
			};

			$.fn.dataTable.models.oSettings['aoInitComplete'].push( {
				"fn": $.fn.dataTableExt.oApi.clearSearch,
				"sName": 'whatever'
			} );
		}
		$(document).ready(function() {

			$("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });
			var oTable = $('#datatables').dataTable( {
				"bProcessing"       : true,
				"bServerSide"       : true,
				"iDisplayLength"    : 15,
				"sAjaxSource"       : '<?php echo (isset($employee))? base_url('employee'): base_url('admin'); ?>/<?php echo $report_type?>_datatable',
				"bLengthChange"     : false,
				"sPaginationType"   : "full_numbers",
				"bAutoWidth"        : false,
				"aaSorting"         : [[ 0, "asc" ]],
				"aoColumnDefs": [

					{
						"aTargets": [0],
						"sClass": "col-md-1 text-center",
					},
					<?php if($report_type=='application'):?>
					{
						"aTargets": [3],
						"mRender": function (data, type, full) {
							if (full[3]=='approved') {
								html = '<span class="badge bg-light-blue">Approved</span>';
							}
							else if (full[3]=='denied') {
								html = '<span class="badge bg-red">Denied</span> ';
							}
							else {
								html = '<span class="badge bg-yellow">Pending</span> ';
							}
							return html;
						},
						"sClass": "col-md-1 text-center",
					},
					<?php endif;?>
					<?php if($report_type!='application' AND $report_type!='time_entry'):?>
					{
						"aTargets": [4],
						"bSortable": false,
						"mRender": function (data, type, full) {
								html = '<a href="<?php echo base_url(); ?><?php echo $report_type?>/edit/'+full[0]+'" data-toggle="modal" href="#form-content" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning">Edit</a>';
								return html;
						},
						"sClass": "col-md-1",
					},
					<?php endif;?>
					<?php if($report_type=='application'):?>
					{
						"aTargets": [5],
						"bSortable": false,
						"mRender": function (data, type, full) {
							html = '';
							if(full[3]=='pending' || full[3]=='' )
							{
								html += ' <a href="<?php echo base_url(); ?>applications/approve/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Approve" class="btn btn-xs btn-info">Approve</a>';
								html += ' <a href="<?php echo base_url(); ?>applications/deny/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Reject" class="btn btn-xs btn-danger">Deny</a>';
							}
							else
							{
								if(full[3]=='approved')
								{
									html += ' <a href="<?php echo base_url(); ?>applications/deny/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Reject" class="btn btn-xs btn-danger">Deny</a>';
								}
								else
								{
									html += ' <a href="<?php echo base_url(); ?>applications/approve/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Approve" class="btn btn-xs btn-info">Approve</a>';
								}
							}
							return html;
						},
						"sClass": "col-md-1"
					},
					<?php endif;?>
				],
				"oLanguage": {
					"sProcessing": "<img src='<?php echo base_url(); ?>assets/images/ajax-loader_dark.gif' style='position:fixed; top: 40%;'>"
				},
				"fnInitComplete": function() {
					//oTable.fnAdjustColumnSizing();
				},
				'fnServerData': function(sSource, aoData, fnCallback)
				{
					$.ajax
					({
						'dataType': 'json',
						'type'    : 'POST',
						'url'     : sSource,
						'data'    : aoData,
						'success' : fnCallback
					});
				}
			} );


		} );

	</script>

	<a class="btn btn-sm btn-default" href="<?php echo site_url('site'); ?>"><span class="fa fa-angle-left"></span> Back</a>
	<?php if ($report_type=='employee'):?><a class="btn btn-sm btn-success btn-add" href="<?php echo site_url('employee/add'); ?>"><span class="fa fa-plus"></span> Add New</a><?php endif;?>

	<?php if($employee AND $report_type =='application'):?>
		<a class="btn btn-sm btn-success btn-add" href="<?php echo site_url('applications/add'); ?>"><span class="fa fa-plus"></span> Add New</a>
	<?php endif;?>

	<?php echo $this->table->generate(); ?>