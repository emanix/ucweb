<?php
class M_ContactUs extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addMessage($data){
        $this->db->insert('contactstb', $data);
    }
}