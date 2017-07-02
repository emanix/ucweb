<?php 
class ContactUs extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'ContactUs']);
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
			$data['status'] = "1";

			$this->M_ContactUs->addMessage($data);
			$this->session->set_flashdata('success', 'Your Message has been received and is being processed. You will contacted shortly...');
		}
		redirect(base_url().'ContactUs');
	}

	function unreadMessages(){
		$messages = $this->M_ContactUs->getMessageByStatus();
		return $messages;
	}

	function viewMessages(){
		$messages = $this->M_ContactUs->getMessages();
		$message_table = "";

		$incrementer = 1;
		foreach ($messages as $key => $value) {
			$message_table .="<tr>";
			$message_table .="<td>{$incrementer}</td>";
            
			if(($value->status) == "1"){
				$message_table .="<td><strong>{$value->date}</strong></td>";
				$message_table .="<td><strong>{$value->name}</strong></td>";
				$message_table .="<td><strong>{$value->subject}</strong></td>";
			}else{
				$message_table .="<td>{$value->date}</td>";
				$message_table .="<td>{$value->name}</td>";
				$message_table .="<td>{$value->subject}</td>";
			}

			$message_table .="<td><a href='".base_url()."ContactUs/readMessage/{$value->contact_id}'><i>Read</i></a></td>";
			$incrementer++;
		}
		$data['page_title'] = 'Messages';
        $data['message_table'] = $message_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'ContactUs/view_message_view';
        $this->templates->call_admin_template($data);
	}

	function readMessage($id){
		$this->M_ContactUs->updateMessage($id);
		$message = $this->M_ContactUs->getMessageById($id);

		foreach($message as $key => $value){
			$data['name'] = $value->name;
			$data['email'] = $value->email;
			$data['subject'] = $value->subject;
			$data['message'] = $value->message;
			$data['date'] = date_format(date_create($value->date), 'F jS, Y');
			$this->session->set_userdata(array('senders_name' => $value->name,
				'email' => $value->email,
				'message' => $value->message,
				'subject' => $value->subject
			));
		}

		$data['page_title'] = 'Read Message';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'ContactUs/read_message_view';
        $this->templates->call_admin_template($data);
	}

	function createMessage(){
		$data['page_title'] = 'Create Message';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'ContactUs/send_message_view';
        $this->templates->call_admin_template($data);
	}

	function sendMessage(){
		if($this->input->post()){
			$this->load->library('email');
			$config = Array(
			  'mailtype' => 'html'
			);

			$this->email->initialize($config);
			
	        $this->email->from('noreply@unitychoraleng.org', 'Unity Chorale');
			$this->email->to($this->session->userdata('email'));
	        $this->email->subject('Re: '.$this->session->userdata('subject').'');
	        $this->email->message('Dear '.$this->session->userdata('senders_name').', ' .$this->input->post('message'));
	        $this->email->send();
		}
		$this->session->set_flashdata('success', 'Your Message has been sent');
		redirect(base_url().'ContactUs/viewMessages');
	}
}