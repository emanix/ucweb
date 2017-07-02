<?php
class SignUp extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_SignUp');
		$this->load->module('Templates');
	}

	function addSignup(){
		if($this->input->post()){
			$data = array('fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'part' => $this->input->post('part'),
				'denomination' => $this->input->post('denomination')
			);
			
			$this->M_SignUp->insertSignup($data);
			$this->session->set_flashdata('success', 'Sign up successful, you will be notified via email when your application has been processed');
		}
		$this->signUpFeedback();
	}

	function signUpFeedback(){
		$data['header'] = 'Feedback';
		$data['success'] = $this->session->flashdata('success');
		$this->templates->call_single_template($data);
	}
}