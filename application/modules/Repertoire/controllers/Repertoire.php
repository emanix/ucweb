<?php
class Repertoire extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'SignUp', 'ContactUs']);
		$this->load->model(['M_Repertoire']);
	}

	function addRepertoireView(){
		$data['page_title'] = 'Add Songs to Repertoire';
		$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
		$data['content_view'] = 'Repertoire/add_repertoire_view';
		$this->templates->call_admin_template($data);
	}

	function addRepertoire(){
		$this->load->library(['upload']);
		if($this->input->post()){
			$data = array('song_title' => $this->input->post('song_title'),
				'genre' => $this->input->post('genre')
			);
			$id = $this->M_Repertoire->addRepertoire($data);
			$files = $_FILES;
	        if(!file_exists("./assets/dist_web/repertoire/")) {
	          mkdir("./assets/dist_web/repertoire/", 0777, true);
	        }
	        $config = $this->set_repertoire_upload_option($id);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('music')){
	            $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
	            
	            $music_file = array('file_path' => $file_path);

	            $this->M_Repertoire->updateRepertoire($id, $music_file);
	        }
	        $this->session->set_flashdata('success', 'Song uploaded successfully');
		}
		redirect(base_url().'Repertoire/addRepertoireView');
	}

	private function set_repertoire_upload_option($id){
        //upload image options
        if (!file_exists("./assets/dist_web/repertoire/")) {
            mkdir("./assets/dist_web/repertoire/", 0777, true);
        }
      $config = array();
      $config['upload_path'] = "./assets/dist_web/repertoire/";
      $config['file_name'] = $id;
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '0';
      $config['overwrite'] = TRUE;

        return $config;
    }

    function viewRepertoire(){
		$repertoire = $this->M_Repertoire->getRepertoire();

		$repertoire_table = "";

		if (count($repertoire)>0){
			$incrementer = 1;
			foreach ($repertoire as $key => $value) {
				$repertoire_table .="<tr>";
				$repertoire_table .="<td>{$incrementer}</td>";
                $repertoire_table .="<td>{$value->song_title}</td>";
				$repertoire_table .="<td>{$value->genre}</td>";
				$repertoire_table .="<td><a target='_blank' href='".base_url()."{$value->file_path}'><button type='button' class='btn bg-blue waves-effect'><i class='material-icons'>file_download</i>  Download</button></a></td>";
				$repertoire_table .="<td><a href='".base_url()."Repertoire/deleteSong/{$value->song_id}'><i>Drop song</i></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Available Songs';
        $data['repert_table'] = $repertoire_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Repertoire/view_repertoire_view';
        $this->templates->call_admin_template($data);

	}

	function viewUsersRepertoire(){
		$repertoire = $this->M_Repertoire->getRepertoire();

		$repertoire_table = "";

		if (count($repertoire)>0){
			$incrementer = 1;
			foreach ($repertoire as $key => $value) {
				$repertoire_table .="<tr>";
				$repertoire_table .="<td>{$incrementer}</td>";
                $repertoire_table .="<td>{$value->song_title}</td>";
				$repertoire_table .="<td>{$value->genre}</td>";
				$repertoire_table .="<td><a target='_blank' href='".base_url()."{$value->file_path}'><button type='button' class='btn bg-blue waves-effect'><i class='material-icons'>file_download</i>  Download</button></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Available Songs';
        $data['repert_table'] = $repertoire_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Repertoire/view_repertoire_view';
        $this->templates->call_users_template($data);

	}

	function deleteSong($id){
		$song = $this->M_Repertoire->getRepertoireId($id);
		$this->load->helper('file');
		
		foreach ($song as $key => $value) {
			$path = $value->file_path;
			
		}
		unlink($path);
		$this->M_Repertoire->deleteRepertoire($id);
		$this->session->set_flashdata('success', 'Song deleted successfully');
		redirect(base_url().'Repertoire/viewRepertoire');
	}
}