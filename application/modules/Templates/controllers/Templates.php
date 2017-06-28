<?php

class Templates extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        
    }

    function load_login_template(){
    	//Calls the login page
    	
    	$this->load->view('login_view.php');
    }

    function call_admin_template($data = NULL){
        //call admin template

        $this->load->view('admin_view', $data);
    }

    function call_home_template($data = NULL){
        //call home page template

        $this->load->view('home_view', $data);
    }

    function call_single_template($data = NULL){
        //call single view template

        $this->load->view('single_view', $data);
    }

    function call_about_template($data = NULL){
        //call about view template

        $this->load->view('about_view', $data);
    }

    function call_gallery_template($data = NULL){
        //call about view template

        $this->load->view('gallery_view', $data);
    }
 }