<?php
class SignUp extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(['M_SignUp', 'M_Admin']);
		$this->load->module(['Templates', 'ContactUs']);
	}

	function addSignup(){
		if($this->input->post()){
			if(null !== $this->input->post('vocalist') && null !== $this->input->post('instrumentalist')){
				$music_quality = $this->input->post('vocalist').', '.$this->input->post('instrumentalist');
				$data = array('username' => $this->input->post('username'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'music_quality' => $music_quality,
					'part' => $this->input->post('part'),
					'musical_skill' => $this->input->post('musical_skill'),
					'denomination' => $this->input->post('denomination')
				);
			}else if(null !== $this->input->post('vocalist')){
				$music_quality = $this->input->post('vocalist');
				$data = array('username' => $this->input->post('username'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'music_quality' => $music_quality,
					'part' => $this->input->post('part'),
					'musical_skill' => $this->input->post('musical_skill'),
					'denomination' => $this->input->post('denomination')
				);
			}else if(null !== $this->input->post('instrumentalist')){
				$music_quality = $this->input->post('instrumentalist');
				$data = array('username' => $this->input->post('username'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'music_quality' => $music_quality,
					'part' => $this->input->post('part'),
					'musical_skill' => $this->input->post('musical_skill'),
					'denomination' => $this->input->post('denomination'),
				);
			}
			
			
			$this->M_SignUp->insertSignup($data);

			$message = "
	      <html>
	      <head>
	      <title></title>
	      </head>
	      <body>
	      <h3>New Signup</h3>
	      <p>You have a new signup on Unity Chorale website awaiting approval.</p>
	      </body>
	      </html>
	    ";

		
		$this->load->library('email');

		
		$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
		$this->email->to('emanixworld@gmail.com');

		$this->email->subject('New Signup');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		$this->email->send();

			$this->session->set_flashdata('success', 'Sign up successful, you will be notified via email when your application has been processed');
		}
		$this->signUpFeedback();
	}

	function signUpFeedback(){
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
		$data['header'] = 'Feedback';
		$data['success'] = $this->session->flashdata('success');
		$this->templates->call_single_template($data);
	}

	function viewSignups(){
		$this->load->model('M_SignUp');
		$signups = $this->M_SignUp->getSignups();

		$signup_table = "";

		if (count($signups)>0){
			//$incrementer = 1;
			foreach ($signups as $key => $value) {
				$signup_table .="<tr>";
                $signup_table .="<td>{$value->fname}</td>";
				$signup_table .="<td>{$value->lname}</td>";
				$signup_table .="<td>{$value->email}</td>";
				$signup_table .="<td>{$value->phone}</td>";
				$signup_table .="<td>{$value->gender}</td>";
				$signup_table .="<td>{$value->music_quality}</td>";
				$signup_table .="<td>{$value->part}</td>";
				$signup_table .="<td>{$value->musical_skill}</td>";
				$signup_table .="<td>{$value->denomination}</td>";
				//$incrementer++;
			}
		}
        $data['page_title'] = 'List of Signups';
        $data['signup_table'] = $signup_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->countSignups());
        $data['content_view'] = 'SignUp/view_signup_view';
        $this->templates->call_admin_template($data);
	}

	function processSignups(){
		$this->load->model('M_SignUp');
		$signups = $this->M_SignUp->getSignups();

		$signup_table = "";

		if (count($signups)>0){
			$incrementer = 1;
			foreach ($signups as $key => $value) {
				$signup_table .="<tr>";
				$signup_table .="<td>{$incrementer}</td>";
                $signup_table .="<td>{$value->fname}</td>";
				$signup_table .="<td>{$value->lname}</td>";
				$signup_table .="<td>{$value->email}</td>";
				$signup_table .="<td>{$value->gender}</td>";
				$signup_table .="<td><a href='".base_url()."SignUp/inviteSignup/{$value->signup_id}'><i class='material-icons'>share</i> <span class='icon-name'>Invite</span></a></td>";
				$signup_table .="<td><a href='".base_url()."SignUp/approveSignup/{$value->signup_id}'><i class='material-icons'>done</i> <span class='icon-name'>Approve</span></a></td>";
				$signup_table .="<td><a href='".base_url()."SignUp/declineSignup/{$value->signup_id}'><i class='material-icons'>clear</i> <span class='icon-name'>Decline</span></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Signups';
        $data['signup_table'] = $signup_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->countSignups());
        $data['content_view'] = 'SignUp/process_signup_view';
        $this->templates->call_admin_template($data);
	}	

	function countSignups(){
		$signups = $this->M_SignUp->getSignups();
		return $signups;
	}

	function inviteSignup($id){
		$this->session->set_flashdata('signid', $id);
		$signup = $this->M_SignUp->getSignupsById($id);

		foreach ($signup as $key => $value){
			$firstname = $value->fname;
		}
		

		$data['page_title'] = 'Invite ' .$firstname. ' for auditioning';
	    //$data['signup_table'] = $signup_table;
	    $data['unread'] = count($this->contactus->unreadMessages());
	    $data['signups'] = count($this->countSignups());
	    $data['content_view'] = 'SignUp/invite_signup_view';
	    $this->templates->call_admin_template($data);
	}

	function sendSignups(){

		$signup = $this->M_SignUp->getSignupsById($this->session->flashdata('signid'));

		foreach ($signup as $key => $value){
			$firstname = $value->fname;
			$email = $value->email;
		}

		if(isset($_GET["date"])){
			$date = $_GET["date"];
		}

		if(isset($_GET["time"])){
			$time = $_GET["time"];
		}

		if(isset($_GET["venue"])){
			$venue = $_GET["venue"];
		}

		$message = "
	      <html>
	      <head>
	      <title></title>
	      </head>
	      <body>
	      <h3>Dear Dear " .$firstname. "</h3>
	      <p>You are hereby invited for an auditioning with the music director of Unity Chorale Nigeria as followings: Venue: " .$venue. ", Date: " .$date. ", Time: " .$time. ".</p>
	      </body>
	      </html>
	    ";

		/*$message = "Dear " .$firstname. ", you are hereby invited for an auditioning with the music director of Unity Chorale Nigeria as followings: Venue: " .$venue. ", Date: " .$date. ", Time: " .$time. ".";*/
		$this->load->library('email');

		$this->email->mailtype('html');
		$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
		$this->email->to($email);

		$this->email->subject('Call for Auditioning');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		$this->email->send();

		$this->session->set_flashdata('successful', 'Invitation has been successfully sent');
		redirect(base_url().'SignUp/processSignups');
	}

	function approveSignup($id){
		$approve = $this->M_SignUp->getSignupsById($id);

		$this->load->helper('string');
		$pass = random_string('alnum', 8);
		$password = sha1($pass);
		foreach ($approve as $key => $value) {
			$firstname = $value->fname;
			$username = $value->username;
			$email = $value->email;
			$data = array('username' => $username,
				'password' => $password, 
				'fname' => $firstname,
				'lname' => $value->lname,
				'email' => $email,
				'phone' => $value->phone,
				'gender' => $value->gender,
				'music_quality' => $value->music_quality,
				'part' => $value->part,
				'musical_skill' => $value->musical_skill,
				'denomination' => $value->denomination,
				'status' => "1"
			);
		}
		//Add approved signup to users table
		$this->M_SignUp->insertUser($data);

		$message = "
	      <html>
	      <head>
	      <title></title>
	      </head>
	      <body>
	      <h3>Dear Dear " .$firstname. "</h3>
	      <p>Congratulation on the successful completion of your auditioning, your membership into Unity Chorale Nigeria is officially confirmed by this email. Your login details into the group page are as follows: username: " .$username. ", password: " .$pass. ".</p>
	      </body>
	      </html>
	    ";

		/*$message = "Dear " .$firstname. ", congratulation on the successful completion of your auditioning, your membership into Unity Chorale Nigeria is officially confirmed by this email. Your login details into the group page are as follows: username: " .$username. ", password: " .$pass. ".";*/
		$this->load->library('email');

		$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
		$this->email->to($email);

		$this->email->subject('Welcome to Unity Chorale');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		$this->email->send();
		$this->M_SignUp->deleteSignup($id);
		print_r($pass); die;
		$this->session->set_flashdata('successful', 'Signup has been successfully approved');
		redirect(base_url().'SignUp/processSignups');
	}

	function declineSignup($id){
		$this->M_SignUp->deleteSignup($id);

		$this->session->set_flashdata('successful', 'Signup has been successfully declined, and details deleted from data base');
		redirect(base_url().'SignUp/processSignups');
	}
}