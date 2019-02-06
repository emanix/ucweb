<?php
class M_ContactUs extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addMessage($data){
        $this->db->insert('contactstb', $data);
    }

    function getMessageByStatus(){
    	$this->db->select('*');
    	$this->db->from('contactstb');
    	$this->db->where('status', '1');
    	$query = $this->db->get();
    	return $query->result();
    }

    function getMessageById($id){
        $this->db->select('*');
        $this->db->from('contactstb');
        $this->db->where('contact_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getMessages(){
    	$this->db->select('*');
    	$this->db->from('contactstb');
        $this->db->order_by('date', 'DESC');
    	$query = $this->db->get();
    	return $query->result();
    }

    function updateMessage($id){
    	$this->db->set('status', '0');
    	$this->db->where('contact_id', $id);
    	$this->db->update('contactstb');
    }
}