<?php
class M_SignUp extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function insertSignup($data){
		$this->db->insert('signuptb', $data);
	}

	function getSignups(){
		$this->db->select('*');
		$this->db->from('signuptb');
		$query = $this->db->get();
		return $query->result();
	}

	function getSignupsById($id){
		$this->db->select('*');
		$this->db->from('signuptb');
		$this->db->where('signup_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function deleteSignup($id){
		$this->db->where('signup_id', $id);
		$this->db->delete('signuptb');
	}

	function insertUser($data){
		$this->db->insert('userstb', $data);
	}

	function insertSubscribe($data){
		$this->db->insert('subscribetb', $data);
		return $this->db->insert_id();
	}

	function deleteSubscribe($id){
		$this->db->where('subs_id', $id);
		$this->db->delete('subscribetb');
	}
}