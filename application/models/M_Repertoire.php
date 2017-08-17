<?php
class M_Repertoire extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addRepertoire($data){
        $this->db->insert('repertoiretb', $data);
        return $this->db->insert_id();
    }

    function updateRepertoire($id, $data){
        $this->db->where('song_id', $id);
        $this->db->update('repertoiretb', $data);
    }

    function getRepertoire(){
        $this->db->select('*');
        $this->db->from('repertoiretb');
        $query = $this->db->get();
        return $query->result();
    }

    function getRepertoireId($data){
        $this->db->select('*');
        $this->db->from('repertoiretb');
        $this->db->where('song_id', $data);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteRepertoire($id){
        $this->db->where('song_id', $id);
        $this->db->delete('repertoiretb');
    }
}