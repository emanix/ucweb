<?php
class M_SignUp extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function insertSignup($data){
		$this->db->insert('signuptb', $data);
	}
}