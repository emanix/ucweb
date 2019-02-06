<?php
class Gallery extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'ContactUs', 'SignUp']);
		$this->load->model(['M_Gallery', 'M_Admin']);
	}

	function index($data = NULL){
		$connect = $this->M_Admin->getConnect();

        foreach ($connect as $key => $value) {
            $data['phone1'] = $value->phone1;
            $data['phone2'] = $value->phone2;
            $data['email'] = $value->email;
            $data['facebook'] = $value->facebook;
            $data['instagram'] = $value->instagram;
            $data['googleplus'] = $value->googleplus;
            $data['twitter'] = $value->twitter;
        }
		$data['header'] = 'Gallery';
		$data['gallery'] = $this->getPhotos();
		$this->templates->call_gallery_template($data);
	}

	function addPhotoView(){
		$data['page_title'] = 'Add Photos to Gallery';
		$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
		$data['content_view'] = 'Gallery/add_gallery_view';
		$this->templates->call_admin_template($data);
	}

	function addPhoto(){
		$this->load->library(['upload']);
		if($this->input->post()){
			$data = array('image_description' => $this->input->post('image_description'));
			$id = $this->M_Gallery->addPhoto($data);
			$files = $_FILES;
	        if(!file_exists("./assets/dist_web/images/")) {
	          mkdir("./assets/dist_web/images/", 0777, true);
	        }
	        $config = $this->set_gallery_upload_option($id);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('gallery')){
	            $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
	            
	            $image = array('image_path' => $file_path);

	            $this->M_Gallery->updatePhoto($id, $image);
	        }
	        $this->session->set_flashdata('success', 'Photo uploaded successfully');
		}
		redirect(base_url().'Gallery/addPhotoView');
	}

	private function set_gallery_upload_option($id){
        //upload image options
        if (!file_exists("./assets/dist_web/images/gallery/")) {
            mkdir("./assets/dist_web/images/gallery/", 0777, true);
        }
      $config = array();
      $config['upload_path'] = "./assets/dist_web/images/gallery/";
      $config['file_name'] = $id;
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0';
      $config['overwrite'] = TRUE;

        return $config;
    }

    function viewGallery(){
	    $gallery = $this->M_Gallery->getPhoto();

	    $gallery_table = "";

	    if (count($gallery)>0){
	      $incrementer = 1;
	      foreach ($gallery as $key => $value) {
	        $gallery_table .="<tr>";
	        $gallery_table .="<td>{$incrementer}</td>";
	        $image = base_url().ltrim($value->image_path, '.');
	        $gallery_table .="<td>{$value->image_description}</td>";
	        $gallery_table .="<td><img src='{$image}' width='180' height='81'/></td>";
	        $gallery_table .="<td><a href='".base_url()."Gallery/editPhoto/{$value->gallery_id}'><i>Edit</i></a></td>";
	        $gallery_table .="<td><a href='".base_url()."Gallery/deletePhoto/{$value->gallery_id}'><i>Delete Photo</i></a></td>";
	        $incrementer++;
	      }
	    }
        $data['page_title'] = 'List of Gallery Images';
        $data['gallery_table'] = $gallery_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Gallery/view_gallery_view';
        $this->templates->call_admin_template($data);
	}

	function editPhoto($id){
		$images = $this->M_Gallery->getPhotoId($id);

		foreach ($images as $key => $value) {
			$data['gallery_id'] = $value->gallery_id;
			$data['image_description'] = $value->image_description;
		}

		$data['page_title'] = 'Edit Photo';
		$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
		$data['content_view'] = 'Gallery/edit_gallery_view';
		$this->templates->call_admin_template($data);
	}

	function updatePhoto(){
		$this->load->library(['upload']);
		if($this->input->post()){
			$image_description = $this->input->post('image_description');
			$id = $this->input->post('gallery_id');
			$files = $_FILES;
	        if(!file_exists("./assets/dist_web/images/")) {
	          mkdir("./assets/dist_web/images/", 0777, true);
	        }
	        $config = $this->set_gallery_upload_option($id);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('gallery')){
	            $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
	            
	            $image = array('image_description' => $image_description,
	            	'image_path' => $file_path
	            );

	            $this->M_Gallery->updatePhoto($id, $image);
	        }else{
	        	$image = array('image_description' => $image_description);

	            $this->M_Gallery->updatePhoto($id, $image);
	        }
	        $this->session->set_flashdata('success', 'Photo updated successfully');
		}
		redirect(base_url().'Gallery/viewGallery');
	}

	function getPhotos(){
		$photos = $this->M_Gallery->getPhoto();
		$photo_gallery = "";
		if(count($photos) > 0){
			foreach ($photos as $key => $value) {
				$photo_gallery .= "<div class='col-md-4 gallery-grid gallery1'>";
				$image = base_url().ltrim($value->image_path, '.');
				$photo_gallery .= "<a href='{$image}' class='swipebox'><img src='{$image}' class='img-responsive' alt='/'>";
				$photo_gallery .= "<div class='textbox'><br><br><br><br><p>{$value->image_description}</p></div>";
				$photo_gallery .= "</a>";
				$photo_gallery .= "</div>";
			}
		}
		return $photo_gallery;
	}

	function deletePhoto($id){
		$images = $this->M_Gallery->getPhotoId($id);
		$this->load->helper('file');
		//$files = $_FILES;
		foreach ($images as $key => $value) {
			$path = $value->image_path;
			
		}
		//print_r($path); die;
		//chmod($path, 0777);
		unlink($path);
		$this->M_Gallery->deletePhoto($id);
		$this->session->set_flashdata('success', 'Photo deleted successfully');
		redirect(base_url().'Gallery/viewGallery');
	}
}