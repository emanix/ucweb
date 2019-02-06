<?php

class Templates extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        
    }

    function load_login_template(){
    	//Calls the login page
    	
    	$this->load->view('login_v.php');
    }

    function call_login_template($data = NULL){
        //call admin template

        $this->load->view('login_view', $data);
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

    function call_eval_template($data = NULL){
        //call about view template

        $this->load->view('eval_service_view', $data);
    }

    function call_trans_template($data = NULL){
        //call about view template

        $this->load->view('trans_service_view', $data);
    }

    function call_training_template($data = NULL){
        //call about view template

        $this->load->view('training_service_view', $data);
    }

    function call_order_template($data = NULL){
        //call about view template

        $this->load->view('order_steps_view', $data);
    }

    function call_priceupdate_template($data = NULL){
        //call about view template

        $this->load->view('update_price_view', $data);
    }

    function call_eval_prices($data = NULL){
        //call about view template

        $this->load->view('eval_price_view', $data);
    }

    function call_translation_prices($data = NULL){
        //call about view template

        $this->load->view('translation_price_view', $data);
    }

    function call_contacts_template($data = NULL){
        //call about view template

        $this->load->view('contacts_view', $data);
    }

    function call_users_template($data = NULL){
        //call users template

        $this->load->view('users_view', $data);
    }
 }