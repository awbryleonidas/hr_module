<?php

class Site extends CI_Controller
{

	function index(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$employee = $this->session->userdata('user_employee_id');
		if(!isset($is_logged_in)|| $is_logged_in != TRUE)
		{
			$this->load->view('login_form');
		}
		else{
			if(isset($employee))
			{
				redirect('employee');
			}
			redirect('admin');
		}
	}

	function validate_credentials()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('date_logged_in');

		date_default_timezone_set('Asia/Manila');

		$data = array(
			'username' => $this->input->post('username'),
			'is_logged_in' => TRUE,
			'date_logged_in' => date("Y-m-d H:i:s")
		);

		$this->session->set_userdata($data);

		if($this->input->post('username')=='hradmin' && $this->input->post('password')=='password') redirect('admin');
		if($this->input->post('username')=='testemployee'&&$this->input->post('password')=='password')
		{
			$this->load->model('employees_model');
			$employee_id = $this->employees_model->get_id($this->input->post('username'));
			$data = array(
				'user_employee_id' => $employee_id
			);
			$this->session->set_userdata($data);
			redirect('employee');
		}

		echo "<script>alert('You have entered incorrect information. Please try again.');
			window.open('".base_url()."', '_self');</script>";

	}

	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
}