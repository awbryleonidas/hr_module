<?php

class Site extends CI_Controller
{

	function index(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_type = $this->session->userdata('user_type');
		if(!isset($is_logged_in)|| $is_logged_in != TRUE)
		{
			$this->load->view('login_form');
		}
		else{
			if($user_type == 'employee')
			{
				redirect('employee');
			}
			else
			{
				redirect('admin');
			}
		}
	}

	function validate_credentials()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('date_logged_in');

		date_default_timezone_set('Asia/Manila');


		if($this->input->post('username')=='hradmin' && $this->input->post('password')=='password')
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'date_logged_in' => date("Y-m-d H:i:s"),
				'user_type' => 'admin'
			);

			$this->session->set_userdata($data);
			redirect('admin');
		}
		else if($this->input->post('username')=='testemployee'&&$this->input->post('password')=='password')
		{
			$this->load->model('employees_model');
			$employee_id = $this->employees_model->get_id($this->input->post('username'));
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'date_logged_in' => date("Y-m-d H:i:s"),
				'user_employee_id' => $employee_id,
				'user_type' => 'employee'
			);
			$this->session->set_userdata($data);
			redirect('employee');
		}
		else
		{
			echo "<script>alert('You have entered incorrect information. Please try again.');
			window.open('".base_url()."', '_self');</script>";
		}
		//redirect('site');

	}

	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
}