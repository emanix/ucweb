<?php
class M_Admin extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addBanner($data){
        $this->db->insert('bannertb', $data);
        return $this->db->insert_id();
    }

	function update_banner($id, $image){
        $this->db->where('banner_id', $id);
        $this->db->update('bannertb', $image);
    }

    function getBannerId($id){
        $this->db->select('*');
        $this->db->from('bannertb');
        $this->db->where('banner_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function insertConnect($data){
        $this->db->update('ourconnecttb', $data);
    }

    function getConnect(){
        $this->db->select('*');
        $this->db->from('ourconnecttb');
        $query = $this->db->get();
        return $query->result();
    }
}