<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this::is_logged_in();
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)|| $is_logged_in != TRUE)
		{
			echo "Your session is already expired. Please Logout and re-Login to continue.";
			die();
		}
	}
	public function index()
	{
		$data['title'] = 'Admin - Home';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'admin_home_view';
		$this->load->view('template_view', $data);
		//echo 'admin';
		//echo '<a href="'. site_url('site/logout') .'" style="text-decoration: none; font-family: arial; position: absolute;color: blue; font-size: 15px;" onclick="return logout_btn();">Logout</a>';
	}
	public function employee()
	{
		$data['title'] = 'Admin - Employee List';
		$tmpl = array ( 'table_open'  => '<table id="datatables" border="1" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-hover dt-responsive">' );
		$this->table->set_template($tmpl);
		
		$this->table->set_heading('id','Employee ID','First Name','Last Name', 'Actions');
		
		
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['report_type'] = 'employee';
		$data['view'] = 'table_view';
		$this->load->view('template_view', $data);
	}
	//function to handle callbacks
	function employee_datatable()
	{
		$this->datatables->select('id, employee_id ,employee_firstname, employee_lastname')
			->from('employees')
			->add_column('Actions', get_buttons('$3'),'id');
		
		echo $this->datatables->generate();
	}
	public function time()
	{
		$data['title'] = 'Admin - Time Entries';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'default_view';
		$this->load->view('template_view', $data);
	}
	public function time_table()
	{
		$data['title'] = 'Admin - Time Entries';

		$id = $this->input->post('employee_id');
		$data = array(
			'time_entry_id' => $id
		);

		$this->session->set_userdata($data);
		$tmpl = array ( 'table_open'  => '<table id="datatables" border="1" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-hover dt-responsive">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('id','Employee ID','Time In','Time Out');
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['report_type'] = 'time_entry';
		$data['view'] = 'table_view';
		$this->load->view('template_view', $data);
	}
	
	public function time_entry_datatable()
	{
		$employee_id = $this->session->userdata('time_entry_id');
		$this->datatables->select("time_entry_id, time_entry_employee_id ,time_entry_in, time_entry_out")
			->from('time_entries')
			->where('time_entry_employee_id = "'. $employee_id . '"');
		
		echo $this->datatables->generate();
	}
	
	public function applications()
	{
		$data['title'] = 'Admin - Application List';
		$tmpl = array ( 'table_open'  => '<table id="datatables" border="1" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-hover dt-responsive">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('id','Employee ID','Date','Status', 'Type', 'Action');
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['report_type'] = 'application';
		$data['view'] = 'table_view';
		$this->load->view('template_view', $data);
	}

	public function application_datatable()
	{
		$this->datatables->select("application_id, application_employee_id ,application_date, application_status, application_type")
			->from('applications')
			->add_column('Actions', get_buttons('$3'),'id');

		echo $this->datatables->generate();
	}


}
