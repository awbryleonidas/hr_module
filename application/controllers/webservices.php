<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservices extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('webservices_model');
	}

	//this is where API in uploading time entries can be modified
	public function index()
	{
		echo 'This cannot be accessed.';
	}

	public function sync_time_entries()
	{
		$this->load->model('time_entries_model');
		//security/checking credentials must be included

		$data = array(
			'time_entry_employee_id' => $this->input->post('employee_id'),
			'time_entry_in' => $this->input->post('time_entry_in'),
			'time_entry_out' => $this->input->post('time_entry_out')
		);
		if($this->time_entries_model->insert_time_entry($data))
		{
			$this->_success();
		}
		else
		{
			$this->_validation_error('Something went wrong. Please try again.');
		}

	}
	private function _success()
	{
		echo json_decode(array('success' => 'true'), 200); // 200 being the HTTP response code
	}

	private function _validation_error($error)
	{
		echo json_decode(
			array(
				'error' => 'validation_error',
				'error_description' => $error
			),
			400
		);
	}
}
