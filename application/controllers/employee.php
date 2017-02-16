<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this::is_logged_in();
		$this->load->model('employees_model');
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
		$data['title'] = 'Employee - Home';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'employee_home_view';
		$this->load->view('template_view', $data);
	}
	public function time()
	{
		$data['title'] = 'Employee - Time Entries';
		$id = $this->input->post('employee_id');
		$data = array(
			'time_entry_id' => $id
		);		
		$this->session->set_userdata($data);
		$tmpl = array ( 'table_open'  => '<table id="datatables" border="1" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-hover dt-responsive">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('id','Date','Time In','Time Out');
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['report_type'] = 'time_entry';
		$data['view'] = 'table_view';
		$this->load->view('template_view', $data);
	}

	public function time_entry_datatable()
	{
		$employee_id = $this->session->userdata('user_employee_id');
		$this->datatables->select("time_entry_id, date(time_date) ,time_entry_in, time_entry_out")
			->from('time_entries')
			->where('time_entry_employee_id = "'. $employee_id . '"');

		echo $this->datatables->generate();
	}

	public function add()
	{
		$data['title'] = 'Add Employee';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'form_view';
		$this->load->view('template_view', $data);
	}
	public function submit($type='add', $id = null)
	{
		$this->form_validation->set_rules('employee_id', 'Employee ID', 'required|trim|xss_clean|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('employee_firstname', 'First name', 'required|trim|xss_clean|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('employee_lastname', 'Last name', 'required|trim|xss_clean|min_length[2]|max_length[255]');

		$this->form_validation->set_error_delimiters('', '');

		$record = array(
			'id'	=> $this->input->post('employee_id'),
			'firstname'	=> $this->input->post('employee_firstname'),
			'lastname'	=> $this->input->post('employee_lastname'),
		);

		if ($this->form_validation->run() == TRUE)
		{
			$result = ($type=='add')? $this->employees_model->insert_employee($record): $this->employees_model->update_employee($id, $record);
			if($result)//save record
			{
				redirect('admin/employee');
			}
			else
			{
				$data['error'] = 'Something went wrong. Please try again.'; 
			}
		}
		$data['title'] = 'Add Employee';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'form_view';
		$this->load->view('template_view', $data);
	}
	public function edit($id)
	{
		$data['record'] = $this->employees_model->get_details($id);
		$data['title'] = 'Add Employee';
		$data['type'] = 'edit';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'form_view';
		$this->load->view('template_view', $data);
	}


	public function applications()
	{
		$data['title'] = 'Employee - Application List';
		$tmpl = array ( 'table_open'  => '<table id="datatables" border="1" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-hover dt-responsive">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('id','Date','Status', 'Type', 'Action');
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['report_type'] = 'application';
		$data['view'] = 'table_view';
		$this->load->view('template_view', $data);
	}

	public function application_datatable()
	{
		$employee_id = $this->session->userdata('user_employee_id');
		$this->datatables->select("application_id, application_date, application_status, application_type")
			->from('applications')
			->where('application_employee_id =' . $employee_id)
			->add_column('Actions', get_buttons('$3'),'id');

		echo $this->datatables->generate();
	}


}
