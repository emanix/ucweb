<?php

class M_Services extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addServices($data){
		$this->db->insert('servicestb', $data);
	}

	function addServiceTypes($data){
		$this->db->insert('servicetypetb', $data);
	}

	function add_prices($data){
		$this->db->insert('pricetb', $data);
	}

	function updateEvents($id, $data){
		$this->db->where('eventid', $id);
		$this->db->update('eventstb', $data);
	}

	function getServices(){
		$this->db->select('*');
		$this->db->from('servicestb');
		$query = $this->db->get();
		return $query->result();
	}

	function getServicetypes(){
		$this->db->distinct('*');
		$this->db->from('servicetypetb');
		$query = $this->db->get();
		return $query->result();
	}

	function get_servicetypes(){
		$this->db->select('*');
		$this->db->from('servicetypetb');
		$query = $this->db->get();
		return $query->result();
	}

	function getServicetype($stname){
        $this->db->select('*');
        $this->db->from('servicetypetb');
        $this->db->where('stname', $stname);
        $query = $this->db->get();
        return $query->result();
    }

    function getServicetypeId($stid){
        $this->db->select('*');
        $this->db->from('servicetypetb');
        $this->db->where('stid', $stid);
        $query = $this->db->get();
        return $query->result();
    }

    function getServiceId($id){
        $this->db->select('*');
        $this->db->from('servicestb');
        $this->db->where('service_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteServices($id){
		$this->db->where('service_id', $id);
		$this->db->delete('servicestb');
	}

	function getServiceprices(){
		$this->db->select('*');
		$this->db->from('servicetypetb');
		$this->db->join('pricetb', 'pricetb.stid = servicetypetb.stid');
		$query = $this->db->get();
		return $query->result();
	}

	function get_serviceprices($id){
		$this->db->select('*');
		$this->db->from('pricetb');
		$this->db->where('prid', $id);
		$this->db->join('servicetypetb', 'pricetb.stid = servicetypetb.stid');
		$query = $this->db->get();
		return $query->result();
	}

	function getServiceprice($id){
		$this->db->select('*');
		$this->db->from('pricetb');
		$this->db->where('stid', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function updatePrice($id, $data){
        $this->db->where('prid', $id);
        $this->db->update('pricetb', $data);
    }
}