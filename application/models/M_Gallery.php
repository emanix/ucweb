<?php
class M_Gallery extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addPhoto($data){
        $this->db->insert('gallerytb', $data);
        return $this->db->insert_id();
    }

    function updatePhoto($id, $data){
        $this->db->where('gallery_id', $id);
        $this->db->update('gallerytb', $data);
    }

    function getPhoto(){
        $this->db->select('*');
        $this->db->from('gallerytb');
        $query = $this->db->get();
        return $query->result();
    }

    function getPhotoId($data){
        $this->db->select('*');
        $this->db->from('gallerytb');
        $this->db->where('gallery_id', $data);
        $query = $this->db->get();
        return $query->result();
    }

    function deletePhoto($id){
        $this->db->where('gallery_id', $id);
        $this->db->delete('gallerytb');
    }
}