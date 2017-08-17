<?php

class Users extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'ContactUs', 'SignUp']);
		$this->load->model(['M_Login', 'M_Repertoire']);
	}

	function index($data = NULL){

		$data['page_title'] = 'Dashboard';
        $data['content_view'] = 'Users/dashboard_view';
        $this->templates->call_users_template($data);
	}

	function display_change_password(){

        //$this->load->module("Templates");
        $data['student_records'] = 'Students Management';
        $data['optional_description'] = 'Please use a personal password you can remember';
        $data['page_title'] = 'Change Password';
        $data['content_view'] = 'Users/change_password_view';
        $this->templates->call_users_template($data);
    }

    function change_password(){
        // load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[new_pass]');

        if ($this->form_validation->run() == FALSE){
            //$this->load->module('Admintemplate');
            $this->display_change_password();

        }
        //if validation succeeds
        else{
            //$this->load->model('M_Login');
            $userdetails = $this->M_Login->confirm_members_password($this->session->userdata('user_id'), sha1($this->input->post('old_pass')));

            if (count($userdetails) == 1){
                $this->M_Login->update_user_password();
                $this->session->set_flashdata('success', 'Password Updated successfully.');
                $this->display_change_password();

            }
            else{
                $this->session->set_flashdata('failed', 'Incorrect Previous Password.');
                $this->display_change_password();
            }
        }

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

    function subscribeNews(){
        if($this->input->post()){
            $data['email'] = $this->input->post('Email');
            $this->M_SignUp->insertSubscribe($data);

            $this->session->set_flashdata('success', 'You have successfully subscribed for news letters');
            redirect(base_url().'SignUp/signUpFeedback');
        }
    }
}