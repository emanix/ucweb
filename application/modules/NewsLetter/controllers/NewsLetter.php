<?php
class NewsLetter extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(array('Templates', 'SignUp', 'ContactUs'));
		$this->load->model('M_Newsletter');
	}

	function addNewsletterView(){
		$data['page_title'] = 'Upload Newsletter';
		$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
		$data['content_view'] = 'NewsLetter/add_newsletter_view';
		$this->templates->call_admin_template($data);
	}

	function addNewsletter(){
		$this->load->library(['upload']);
		if($this->input->post()){
			$data = array('newsletter_title' => $this->input->post('newsletter_title'),
				'issue_date' => $this->input->post('date')
			);
			$id = $this->M_Newsletter->addNewsletter($data);
			$files = $_FILES;
	        if(!file_exists("./assets/dist_web/newsletter/")) {
	          mkdir("./assets/dist_web/newsletter/", 0777, true);
	        }
	        $config = $this->set_newsletter_upload_option($id);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('newsletter')){
	            $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
	            
	            $music_file = array('file_path' => $file_path);

	            $this->M_Newsletter->updateNewsletter($id, $music_file);
	        }
	        $this->session->set_flashdata('success', 'Newsletter uploaded successfully');
		}
		redirect(base_url().'Newsletter/addNewsletterView');
	}

	private function set_newsletter_upload_option($id){
        //upload image options
        if (!file_exists("./assets/dist_web/newsletter/")) {
            mkdir("./assets/dist_web/newsletter/", 0777, true);
        }
      $config = array();
      $config['upload_path'] = "./assets/dist_web/newsletter/";
      $config['file_name'] = $id;
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '0';
      $config['overwrite'] = TRUE;

        return $config;
    }

    function viewNewsletter(){
		$newsletter = $this->M_Newsletter->getNewsletter();

		$newsletter_table = "";

		if (count($newsletter)>0){
			$incrementer = 1;
			foreach ($newsletter as $key => $value) {
				$newsletter_table .="<tr>";
				$newsletter_table .="<td>{$incrementer}</td>";
                $newsletter_table .="<td>{$value->newsletter_title}</td>";
				$newsletter_table .="<td>{$value->issue_date}</td>";
				$newsletter_table .="<td><a href='".base_url()."Newsletter/sendNewsletter/{$value->newsletter_id}'><button type='button' class='btn bg-blue waves-effect'><i class='material-icons'>send</i>  Send</button></a></td>";
				$newsletter_table .="<td><a href='".base_url()."Newsletter/viewSubscriber/{$value->newsletter_id}'><button type='button' class='btn bg-blue waves-effect'><i class='material-icons'>send</i>  Select Subscribers</button></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Available Newsletters';
        $data['newsletter_table'] = $newsletter_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Newsletter/view_newsletter_view';
        $this->templates->call_admin_template($data);

	}

	function sendNewsletter($id){
		$news = $this->M_Newsletter->getNewsletterId($id);

		foreach ($news as $key => $value) {
			$path = $value->file_path;
			$newsTitle = $value->newsletter_title;
			$issue_date = $value->issue_date;
		}

		$this->load->model('M_SignUp');
		$subscribes = $this->M_SignUp->getSubscribe();

		$this->load->library('email');
		foreach ($subscribes as $key => $value) {
			$message = "
	      <html>
	      <head>
	      <title></title>
	      </head>
	      <body>
	      <h3>Newsletter</h3>
	      <p>Unity Chorale Nigeria has released the latest copy of their newsletter, find attached a copy of this new release.</p>
	      <p>Title; ".$newsTitle." <br> Issue Date: ".$issue_date."</p>
	      </body>
	      </html>
	    ";

		
		$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
		$this->email->to($value->email);

		$this->email->subject('Latest News release');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		$this->email->send();
		$this->email->clear(TRUE);
		}
		$this->session->set_flashdata('success', 'Newsletter sent successfully');
		redirect(base_url().'Newsletter/viewNewsletter');
	}

	function viewSubscriber($id){
		$news = $this->M_Newsletter->getNewsletterId($id);

		foreach ($news as $key => $value) {
			$this->session->set_userdata(array('path' => $value->file_path,
				'newsTitle' => $value->newsletter_title,
				'issue_date' => $value->issue_date
			));
		}

        $subscribers = $this->M_SignUp->getSubscribers();

        $subscriber_table = "";

        if (count($subscribers)>0){
            $incrementer = 1;
            
            foreach ($subscribers as $key => $value) {
                $subscriber_table .="<tr>";
                $subscriber_table .="<td><input type='checkbox' id='check{$value->subs_id}' class='filled-in' name='check{$value->subs_id}' value='accepted'><label for='check{$value->subs_id}'></label></td>";
                $subscriber_table .="<td>{$incrementer}</td>";
                $subscriber_table .="<td>{$value->email}</td>";
                $subscriber_table .="</tr>";
                $incrementer++;
            }
            
        }
        $data['page_title'] = 'List of Newsletter subscribers';
        $data['subscription_table'] = $subscriber_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Newsletter/view_subscribers_view';
        $this->templates->call_admin_template($data);
    }

    function sendNews($id){
    	$subscriber = $this->M_SignUp->getSubscriberById($id);

    	foreach ($subscriber as $key => $value) {
    		$this->session->set_userdata('email', $value->email);
    	}

    	$newsletter = $this->M_Newsletter->getNewsletter();

		$newsletter_table = "";

		if (count($newsletter)>0){
			$incrementer = 1;
			foreach ($newsletter as $key => $value) {
				$newsletter_table .="<tr>";
				$newsletter_table .="<td>{$incrementer}</td>";
                $newsletter_table .="<td>{$value->newsletter_title}</td>";
				$newsletter_table .="<td>{$value->issue_date}</td>";
				$newsletter_table .="<td><a href='".base_url()."Newsletter/sendNewsletters/{$value->newsletter_id}'><button type='button' class='btn bg-blue waves-effect'><i class='material-icons'>send</i>  Send</button></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Available Newsletters';
        $data['newsletter_table'] = $newsletter_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Newsletter/view_newsletter_view';
        $this->templates->call_admin_template($data);
    }

    function sendNewsletters($id){
    	$news = $this->M_Newsletter->getNewsletterId($id);

		foreach ($news as $key => $value) {
			$path = $value->file_path;
			$newsTitle = $value->newsletter_title;
			$issue_date = $value->issue_date;
		}

		$this->load->library('email');
			$message = "
	      <html>
	      <head>
	      <title></title>
	      </head>
	      <body>
	      <h3>Newsletter</h3>
	      <p>Unity Chorale Nigeria has released the latest copy of their newsletter, find attached a copy of this new release.</p>
	      <p>Title; ".$newsTitle." <br> Issue Date: ".$issue_date."</p>
	      </body>
	      </html>
	    ";

		
		$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
		$this->email->to($this->session->userdata('email'));

		$this->email->subject('Latest News release');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		$this->email->send();
		$this->session->set_flashdata('success', 'Newsletter sent successfully');
		redirect(base_url().'Newsletter/viewSubscriber');
    }

    function sendNewsToCheck(){
        $subscribers = $this->M_SignUp->getSubscribers();

        $this->load->library('email');

        if ($this->input->post()){
            foreach ($subscribers as $key => $value) {
            	if($this->input->post('check'.$value->subs_id, TRUE) == 'accepted'){
            		
					$message = "
				      <html>
				      <head>
				      <title></title>
				      </head>
				      <body>
				      <h3>Newsletter</h3>
				      <p>Unity Chorale Nigeria has released the latest copy of their newsletter, find attached a copy of this new release.</p>
				      <p>Title; ".$$this->session->userdata('newsTitle')." <br> Issue Date: ".$this->session->userdata('issue_date')."</p>
				      </body>
				      </html>
				    ";

					
					$this->email->from('info@unitychoraleng.org', 'Unity Chorale');
					$this->email->to($value->email);

					$this->email->subject('Latest News release');
					$this->email->message($message);
					$this->email->attach($this->session->userdata('path'), 'attachment', $title);
					$this->email->set_mailtype("html");

					$this->email->send();
					$this->email->clear(TRUE);
            	}
            }
        }
        $this->session->set_flashdata('success', 'Newsletter sent successfully');
		redirect(base_url().'Newsletter/viewNewsletter');
    }
}