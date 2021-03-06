<?php

class Login extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Templates', 'ContactUs', 'SignUp']);
        $this->load->model(['M_Login', 'M_Admin']);
    }

    function index($data = NULL){

        $this->session->sess_destroy();
        $connect = $this->M_Admin->getConnect();

        foreach ($connect as $key => $value) {
            $data['phone1'] = $value->phone1;
            $data['phone2'] = $value->phone2;
            $data['email'] = $value->email;
            $data['facebook'] = $value->facebook;
            //$data['instagram'] = $value->instagram;
            $data['googleplus'] = $value->googleplus;
            $data['twitter'] = $value->twitter;
        }
        $data['header_view'] = 'Templates/header_o';
        $data['footer_view'] = 'Templates/footer';
        $this->templates->call_login_template($data);
    }

     function sign_err($data = NULL){

        $data['header_view'] = 'Templates/header_o';
        $data['footer_view'] = 'Templates/footer';
        $this->templates->call_login_template($data);
    }

    //Admin login
    function sign_in(){
        //Verifies users details and signs user in
        $this->load->library('form_validation');

        //rules for registration

        $this->form_validation->set_rules('user', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->sign_err();

        }
        // if validation succeeds
        else{

            if ($this->input->post()){
                $username = $this->input->post('user');
                $user_password = sha1($this->input->post('password'));

                // Checks if username and password exists
                $userdetails = $this->M_Login->confirm_users_details($username, $user_password);
                // if exists
                if (count($userdetails) == 1){

                    foreach ($userdetails as $key => $value) {
                        // Redirect to Administrators page

                        if ($value->role == 'admin' || $value->role == 'pro') {
                            $this->session->set_userdata(array(
                            'user_id' => $value->login_id,
                            'user_role' => $value->role,
                            'username' => $value->username,
                            'name' => $value->name,
                            'loggedin' => 1
                            )); 
                            redirect(base_url() . 'Admin');
                        } // Redirect to Users page
                        elseif ($value->role == 'Assistant') {
                            $this->session->set_userdata(array(
                            'user_id' => $value->ID,
                            'user_role' => $value->role,
                            'name' => $value->name,
                            'loggedin' => 1
                            ));
                            redirect(base_url() . 'Users');
                        }
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', 'Incorrect username or password.');

                    redirect(base_url().'Login/sign_err');
                }
            }
        }
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
            if ($this->session->userdata('user_role') == 'admin')
                $userdetails = $this->M_Login->confirm_users_password($this->session->userdata('user_id'), sha1($this->input->post('old_pass')));
            else
                $userdetails = $this->M_Login->confirm_users_password($this->session->userdata('user_id'), sha1($this->input->post('old_pass')));

            if (count($userdetails) == 1){
                $this->M_Login->update_password();
                $this->session->set_flashdata('success', 'Password Updated successfully.');
                $this->display_change_password();

            }
            else{
                $this->session->set_flashdata('failed', 'Incorrect Previous Password.');
                $this->display_change_password();
            }
        }

    }

    function display_change_password(){

        $this->load->module("Templates");
        $data['student_records'] = 'Students Management';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['optional_description'] = 'Please use a personal password you can remember';
        $data['page_title'] = 'Change Password';
        $data['content_view'] = 'Login/change_password_view';
        $this->templates->call_admin_template($data);

    }

    function sign_out(){
        $this->session->sess_destroy();
        redirect(base_url().'Home');
    }

    //Users login

    function sign_inUser(){
        //Verifies users details and signs user in
        /*$this->load->library('form_validation');

        //rules for registration

        $this->form_validation->set_rules('user', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->sign_err();

        }
        // if validation succeeds
        else{*/

            if ($this->input->post()){
                $username = $this->input->post('username');
                $user_password = sha1($this->input->post('password'));

                // Checks if username and password exists
                $userdetails = $this->M_Login->confirm_members_details($username, $user_password);
                // if exists
                if (count($userdetails) == 1){

                    foreach ($userdetails as $key => $value) {
                        // Redirect to Administrators page
                        $name = $value->lname. " " .$value->fname. "";
                        if ($value->status == '1') {
                            $this->session->set_userdata(array(
                            'user_id' => $value->user_id,
                            'status' => $value->status,
                            'email' => $value->email,
                            'users_name' => $name,
                            'loggedin' => 1
                            ));
                            redirect(base_url() . 'Users');
                        } 
                    }
                }
                else
                {
                    $this->session->set_flashdata('failed', 'Sign in unsuccessful, incorrect username or password.');

                    redirect(base_url().'Home/Feedback');
                }
            }
        //}
    }

    function sign_outUser(){
        $this->session->sess_destroy();
        redirect(base_url().'Home');
    }
}
