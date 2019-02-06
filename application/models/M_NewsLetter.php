<?php
class M_NewsLetter extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addNewsletter($data){
        $this->db->insert('newslettertb', $data);
        return $this->db->insert_id();
    }

    function updateNewsletter($id, $data){
        $this->db->where('newsletter_id', $id);
        $this->db->update('newslettertb', $data);
    }

    function getNewsletter(){
        $this->db->select('*');
        $this->db->from('newslettertb');
        $query = $this->db->get();
        return $query->result();
    }

    function getNewsletterId($data){
        $this->db->select('*');
        $this->db->from('newslettertb');
        $this->db->where('newsletter_id', $data);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteNewsletter($id){
        $this->db->where('newsletter_id', $id);
        $this->db->delete('newslettertb');
    }
}