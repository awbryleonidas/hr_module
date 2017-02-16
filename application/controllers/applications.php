<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this::is_logged_in();
		$this->load->model('applications_model');
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
		//do not remove this
	}

	public function approve($id)
	{
		//this for now, we can include validation
		$this->applications_model->approve($id);
		redirect('admin/application', 'refresh');
	}

	public function deny($id)
	{
		//this for now, we can include validation
		$this->applications_model->deny($id);
		redirect('admin/application', 'refresh');
	}

	public function add()
	{
		$data['title'] = 'File Leave';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'application_form_view';
		$this->load->view('template_view', $data);
	}

	public function submit($type='add', $id = null)
	{
		$employee_id = $this->session->userdata('user_employee_id');
		$this->form_validation->set_rules('application_type', 'Type', 'required|trim|xss_clean');
		$this->form_validation->set_rules('application_date', 'Date', 'required|trim|xss_clean');
		$this->form_validation->set_rules('application_reason', 'Reason', 'required|trim|xss_clean|min_length[5]|max_length[300]');

		$this->form_validation->set_error_delimiters('', '');

		$record = array(
			'application_employee_id'	=> $employee_id,
			'application_type'	=> $this->input->post('application_type'),
			'application_date'	=> $this->input->post('application_date'),
			'application_reason'	=> $this->input->post('application_reason'),
		);

		if ($this->form_validation->run() == TRUE)
		{
			$result = ($type=='add')? $this->appliations_model->insert_application($record): $this->appliations_model->update_application($id, $record);
			if($result)//save record
			{
				redirect('employee/application');
			}
			else
			{
				$data['error'] = 'Something went wrong. Please try again.';
			}
		}
		$data['title'] = 'Add Application';
		$data['username'] = $this->session->userdata('username');
		$data['date_logged'] = date("Y-m-d H:i:s");
		$data['view'] = 'application_form_view';
		$this->load->view('template_view', $data);
	}
}
