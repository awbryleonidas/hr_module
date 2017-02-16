<?php
class Applications_model extends CI_Model{

	/*CREATE TABLE `applications` (
	`application_id` int(11) NOT NULL AUTO_INCREMENT,
	`application_application_id` varchar(50) NOT NULL,
	`application_date` datetime NOT NULL,
	`application_created` datetime NOT NULL,
	`application_status` set('denied','approved') DEFAULT NULL,
	`application_type` set('undertime','overtime','sick leave','vacation leave') DEFAULT NULL,
	PRIMARY KEY (`application_id`,`application_application_id`)
	) PRIMARY KEY (`application_id`,`application_application_id`)
	*/

	function approve($id)
	{
		$arr = array(
			'application_status' => 'approved'
		);

		if($this->db->update('applications', $arr, array('application_id' => $id))){
			return true;
		}
		else{
			return false;
		}
	}
	function deny($id)
	{
		$arr = array(
			'application_status' => 'denied'
		);

		if($this->db->update('applications', $arr, array('application_id' => $id))){
			return true;
		}
		else{
			return false;
		}
	}
	function insert_application($post){
		
		$arr = array(
			'application_employee_id' => (array_key_exists('application_employee_id', $post))? urldecode($post['application_employee_id']): null,
			'application_type' => (array_key_exists('application_type', $post))? urldecode($post['application_type']): null,
			'application_date' => (array_key_exists('application_date', $post))? urldecode($post['application_date']): null,
			'application_reason' => (array_key_exists('application_reason', $post))? urldecode($post['application_reason']): null,
		);
		
		if($this->db->insert('applications', $arr)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function update_application($id, $post){
		$arr = array(
			'application_employee_id' => (array_key_exists('application_employee_id', $post))? urldecode($post['application_employee_id']): null,
			'application_type' => (array_key_exists('application_type', $post))? urldecode($post['application_type']): null,
			'application_date' => (array_key_exists('application_date', $post))? urldecode($post['application_date']): null,
			'application_reason' => (array_key_exists('application_reason', $post))? urldecode($post['application_reason']): null,
		);
		
		if($this->db->update('applications', $arr, array('id' => $id))){
			return true;
		}
		else{
			return false;
		}
	}
}