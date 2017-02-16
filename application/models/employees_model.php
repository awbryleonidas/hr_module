<?php
class Employees_model extends CI_Model{
	
	/*CREATE TABLE `employees` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `employee_id` varchar(50) NOT NULL,
	  `employee_firstname` varchar(255) NOT NULL,
	  `employee_lastname` varchar(255) NOT NULL,
	  `employee_username` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`,`employee_id`,`employee_firstname`,`employee_lastname`)
	) */
	
	function insert_employee($post){

		$arr = array(
			'employee_id' => (array_key_exists('id', $post))? urldecode($post['id']): null,
			'employee_firstname' => (array_key_exists('firstname', $post))? urldecode($post['firstname']): null,
			'employee_lastname' => (array_key_exists('lastname', $post))? urldecode($post['lastname']): null,
		);

		if($this->db->insert('employees', $arr)){
			return true;
		}
		else{
			return false;
		}
	}

	function update_employee($id, $post){
		$arr = array(
			'employee_id' => (array_key_exists('id', $post))? urldecode($post['id']): null,
			'employee_firstname' => (array_key_exists('firstname', $post))? urldecode($post['firstname']): null,
			'employee_lastname' => (array_key_exists('lastname', $post))? urldecode($post['lastname']): null,
		);

		if($this->db->update('employees', $arr, array('id' => $id))){
			return true;
		}
		else{
			return false;
		}
	}

	function get_details($id){
		$query = $this->db->get_where('employees', array('id' => $id));
		$data = array();
		
		foreach($query->result() as $row){
			$data = array(
				'record_id' => $row->id,
				'id' => $row->employee_id,
				'firstname' => $row->employee_firstname,
				'lastname' =>$row->employee_lastname,
			);
		}
		return $data;

	}

	function get_id($username){
		$query = $this->db->get_where('employees', array('employee_username' => $username));
		$id = '';
		foreach($query->result() as $row){
			$id = $row->employee_id;
		}
		return $id;
	}
}