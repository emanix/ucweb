<?php

class M_Events extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addEvents($data){
		$this->db->insert('eventstb', $data);
	}

	function updateEvents($id, $data){
		$this->db->where('eventid', $id);
		$this->db->update('eventstb', $data);
	}

	function getEvents(){
		$this->db->select('*');
		$this->db->from('eventstb');
		$this->db->order_by('event_date', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function getEventId($id){
        $this->db->select('*');
        $this->db->from('eventstb');
        $this->db->where('eventid', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteEvent($id){
		$this->db->where('eventid', $id);
		$this->db->delete('eventstb');
	}
}