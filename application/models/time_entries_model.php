<?php
class Time_entries_model extends CI_Model{

	/*CREATE TABLE `time_entries` (
	`time_entry_id` int(11) NOT NULL AUTO_INCREMENT,
	`time_entry_in` datetime NOT NULL,
	`time_entry_out` datetime NOT NULL,
	`time_entry_employee_id` varchar(50) NOT NULL,
	PRIMARY KEY (`time_entry_id`, `time_entry_employee_id`)
	)*/
	
	function insert_time_entry(){
		
		$data = array(
			'time_entry_employee_id' => $this->input->post('employee_id'),
			'time_entry_in' => $this->input->post('time_entry_in'),
			'time_entry_out' => $this->input->post('time_entry_out')
		);
		
		if($this->db->insert('time_entry', $data)){
			return true;
		}
		else{
			return false;
		}
	}
}