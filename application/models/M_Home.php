<?php
class M_Home extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getBanner(){
        $this->db->select('*');
        $this->db->from('bannertb');
        $this->db->order_by('banner_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function updateWelcome($id, $data){
        $this->db->where('homeid', $id);
        $this->db->update('hometb', $data);
    }

    function getWelcome(){
        $this->db->select('*');
        $this->db->from('hometb');
        $query = $this->db->get();
        return $query->result();
    }

    function updateService($id, $data){
        $this->db->where('service_id', $id);
        $this->db->update('servicestb', $data);
    }

    function getServices(){
        $this->db->select('*');
        $this->db->from('servicestb');
        $query = $this->db->get();
        return $query->result();
    }

    function getServiceId($data){
        $this->db->select('*');
        $this->db->from('servicestb');
        $this->db->where('service_id', $data);
        $query = $this->db->get();
        return $query->result();
    }
}