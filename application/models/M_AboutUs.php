<?php
class M_AboutUs extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getTeam(){
        $this->db->select('*');
        $this->db->from('teamstb');
        $this->db->order_by('teamid', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function updateAbout($id, $data){
        $this->db->where('about_id', $id);
        $this->db->update('abouttb', $data);
    }

    function getAbout(){
        $this->db->select('*');
        $this->db->from('abouttb');
        $query = $this->db->get();
        return $query->result();
    }

    function getTeamId($data){
        $this->db->select('*');
        $this->db->from('teamstb');
        $this->db->where('teamid', $data);
        $query = $this->db->get();
        return $query->result();
    }

    function update_team($id, $image){
        $this->db->where('teamid', $id);
        $this->db->update('teamstb', $image);
    }
}