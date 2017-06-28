<?php 
class ContactUs extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(['Templates']);
		$this->load->model(['M_ContactUs']);
	}

	function index($data = NULL){
		$data['header'] = 'Contact Us';
		$data['response'] = $this->session->flashdata('success');
		$this->templates->call_contacts_template($data);
	}

	function addMessage(){
		if($this->input->post()){
			$data['name'] = $this->input->post('Name');
			$data['email'] = $this->input->post('Email');
			$data['subject'] = $this->input->post('Subject');
			$data['message'] = $this->input->post('Message');

			$this->M_ContactUs->addMessage($data);
			$this->session->set_flashdata('success', 'Your Message has been received and is being processed. You will contacted shortly...');
		}
		redirect(base_url().'ContactUs');
	}
}