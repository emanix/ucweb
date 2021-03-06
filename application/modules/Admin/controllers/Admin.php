<?php

class Admin extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("M_Admin");
		$this->load->module(['Templates', 'ContactUs', 'SignUp']);
	}

	function index($data = NULL){

		$data['page_title'] = 'Dashboard';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Admin/dashboard_view';
        $this->templates->call_admin_template($data);
	}

	function manage_banner(){
		$data['page_title'] = 'Manage Page Banner';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Admin/manage_banner_view';
        $this->templates->call_admin_template($data);
	}

	function edit_banner(){
		$this->load->model('M_Home');
		$banner = $this->M_Home->getBanner();

		$banner_table = "";

		if (count($banner)>0){
			$incrementer = 1;
			foreach ($banner as $key => $value) {
				$banner_table .="<tr>";
				$banner_table .="<td>{$incrementer}</td>";
                $image_thumb = base_url().ltrim($value->image_thumb_path, '.');
                $banner_table .="<td>{$value->title}</td>";
				$banner_table .="<td><img src='{$image_thumb}' width='180' height='81'/></td>";
				$banner_table .="<td><a href='".base_url()."Admin/change_banner/{$value->banner_id}'><i>Edit Banner</i></a></td>";
                $banner_table .="<td><a href='".base_url()."Admin/delete_banner/{$value->banner_id}'><i>Drop Banner</i></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Available banners';
        $data['banner_table'] = $banner_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Admin/view_banner_view';
        $this->templates->call_admin_template($data);

	}

    function change_banner($id){
        $getbanner = $this->M_Admin->getBannerId($id);

        $data['bannerid'] = $id;
        foreach ($getbanner as $key => $value) {
            $data['bannerTitle'] = $value->title;
            $data['bannerDetails'] = $value->banner_info;
        }

        $data['page_title'] = 'Make changes to banner';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Admin/update_banner_view';
        $this->templates->call_admin_template($data);
    }

    function delete_banner($id){
        $images = $this->M_Admin->getBannerId($id);
        $this->load->helper('file');
        //$files = $_FILES;
        foreach ($images as $key => $value) {
            $path = $value->image_path;
            $thumb_path = $value->image_thumb_path;
        }
        //print_r($path); die;
        //chmod($path, 0777);
        unlink($path);
        unlink($thumb_path);
        $this->M_Admin->deleteBanner($id);
        $this->session->set_flashdata('success', 'Banner deleted successfully');
        redirect(base_url().'Admin/edit_banner');
    }

	function add_banner(){
		// load form validation library
        $this->load->library('form_validation');

        $this->load->library(['upload', 'image_lib']);

        //rules for registration
        $this->form_validation->set_rules('banner_title', 'Banner Title', 'trim|required');
        $this->form_validation->set_rules('banner_info', 'Banner Details', 'trim|required');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->manage_banner();

        }
        //if validation succeeds
        else{
                if($this->input->post()){

                    $data = array('title' => $this->input->post('banner_title'), 'banner_info' => $this->input->post('banner_info'));
                    //posts banner 
                    $id = $this->M_Admin->addBanner($data);
                    $files = $_FILES;
                    if (!file_exists("./assets/dist_web/images/")) {
                        mkdir("./assets/dist_web/images/", 0777, true);
                    }
                    $config = $this->set_banner_upload_option($id);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('banner')){
                        $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
                        $file_thumb_path = $config['upload_path'].$id.'_thumb'.$this->upload->data('file_ext');

                        $config_thumb = $this->set_banner_thumb_option($file_path);

                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config_thumb);

                        $this->image_lib->resize();
                        $image = array('image_path' => $file_path,
                            'image_thumb_path' => $file_thumb_path
                        );

                        $this->M_Admin->update_banner($id, $image);
                    }
                    else{
                        $this->M_Admin->update_banner_nopic($id);
                    }
                    $this->session->set_flashdata('success', 'Banner uploaded successfully');
                }


            //redirects to the users page to view the added user
            redirect(base_url().'Admin/manage_banner');
        }
	}

    function update_banner(){
        // load form validation library
        $this->load->library('form_validation');

        $this->load->library(['upload', 'image_lib']);

        //rules for registration
        $this->form_validation->set_rules('banner_title', 'Banner Title', 'trim|required');
        $this->form_validation->set_rules('banner_info', 'Banner Details', 'trim|required');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->edit_banner();

        }
        //if validation succeeds
        else{
                if($this->input->post()){

                    //posts banner 
                    $id = $this->input->post('banner_id');
                    $banner_title = $this->input->post('banner_title');
                    $banner_info = $this->input->post('banner_info');
                    
                    $files = $_FILES;
                    if (!file_exists("./assets/dist_web/images/")) {
                        mkdir("./assets/dist_web/images/", 0777, true);
                    }
                    $config = $this->set_banner_upload_option($id);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('banner')){
                        $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
                        $file_thumb_path = $config['upload_path'].$id.'_thumb'.$this->upload->data('file_ext');

                        $config_thumb = $this->set_banner_thumb_option($file_path);

                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config_thumb);

                        $this->image_lib->resize();
                        $image = array('title' => $banner_title, 
                            'banner_info' => $banner_info, 
                            'image_path' => $file_path,
                            'image_thumb_path' => $file_thumb_path
                        );

                        $this->M_Admin->update_banner($id, $image);
                    }
                    else{
                        $image = array('title' => $banner_title, 
                            'banner_info' => $banner_info
                        );

                        $this->M_Admin->update_banner($id, $image);
                    }
                    $this->session->set_flashdata('success', 'Banner updated successfully');
                }


            //redirects to the users page to view the added user
            redirect(base_url().'Admin/edit_banner');
        }
    }

	private function set_banner_thumb_option($file_path){
        //resize image options
        $config_thumb = array();
        $config_thumb['image_library'] = 'gd2';
        $config_thumb['source_image'] = $file_path;
        $config_thumb['create_thumb'] = TRUE;
        $config_thumb['maintain_ratio'] = TRUE;
        $config_thumb['width']         = 180;
        $config_thumb['height']       = 81;

        return $config_thumb;
    }

    private function set_banner_upload_option($id){
        //upload image options
        if (!file_exists("./assets/dist_web/images/banner/")) {
            mkdir("./assets/dist_web/images/banner/", 0777, true);
        }
	    $config = array();
	    $config['upload_path'] = "./assets/dist_web/images/banner/";
	    $config['file_name'] = $id;
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '0';
	    $config['overwrite'] = TRUE;

        return $config;
    }

    function addConnectsView(){
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
        $data['page_title'] = 'Add Connects';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Admin/manage_connect_view';
        $this->templates->call_admin_template($data);
    }

    function manageConnects(){
        if($this->input->post()){
            $data = array('phone1' => $this->input->post('phone1'),
                'phone2' => $this->input->post('phone2'),
                'email' => $this->input->post('email'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'googleplus' => $this->input->post('google'),
                'twitter' => $this->input->post('twitter')
            );

            $this->M_Admin->insertConnect($data);

            $this->session->set_flashdata('success', 'Contact updated successfully');
            redirect(base_url().'Admin/addConnectsView');
        }
    }

    function viewMembers(){
        $members = $this->M_Admin->getMembers();

        $member_table = "";

        if (count($members)>0){
            //$incrementer = 1;
            foreach ($members as $key => $value) {
                $member_table .="<tr>";
                $member_table .="<td>{$value->lname}</td>";
                $member_table .="<td>{$value->fname}</td>";
                $member_table .="<td>{$value->email}</td>";
                $member_table .="<td>{$value->phone}</td>";
                $member_table .="<td>{$value->gender}</td>";
                $member_table .="<td>{$value->music_quality}</td>";
                $member_table .="<td>{$value->part}</td>";
                $member_table .="<td>{$value->musical_skill}</td>";
                $member_table .="<td>{$value->denomination}</td>";
                //$incrementer++;
            }
        }
        $data['page_title'] = 'List of members';
        $data['members_table'] = $member_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Members/view_members_view';
        $this->templates->call_admin_template($data);
    }

    function viewMember(){
        $members = $this->M_Admin->getMembers();

        $member_table = "";

        if (count($members)>0){
            //$incrementer = 1;
            foreach ($members as $key => $value) {
                $member_table .="<tr>";
                $member_table .="<td>{$value->lname}</td>";
                $member_table .="<td>{$value->fname}</td>";
                $member_table .="<td><a href='".base_url()."Admin/passwordReset/{$value->user_id}'><i>Reset Password</i></a></td>";
                //$incrementer++;
            }
        }
        $data['page_title'] = 'List of members';
        $data['members_table'] = $member_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Members/view_members_view2';
        $this->templates->call_admin_template($data);
    }

    function passwordReset($id){
        $this->load->helper('string');
        $pass = random_string('alnum', 8);
        $password = sha1($pass);

        $data = array('password' => $password);
        $this->M_Admin->updateUserPassword($id, $data);
        $member = $this->M_Admin->getMembersById($id);

        foreach ($member as $key => $value) {
           $firstname = $value->fname;
           $email = $value->email; 
        }

        /*$message = "
          <html>
          <head>
          <title></title>
          </head>
          <body>
          <h3>Dear " .$firstname. "</h3>
          <p>Your request for password reset has been processed, and your log in password is: " .$pass. ".</p>
          </body>
          </html>
        ";

        $this->load->library('email');

        $this->email->from('info@unitychoraleng.org', 'Unity Chorale');
        $this->email->to($email);

        $this->email->subject('Password Reset');
        $this->email->message($message);
        $this->email->set_mailtype("html");

        $this->email->send();*/
        
        print_r($pass); die;
        $this->session->set_flashdata('successful', 'Password reset was successful');
        redirect(base_url().'Admin/viewMember');
    }

}