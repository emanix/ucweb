<?php 
class AboutUs extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'ContactUs', 'SignUp']);
		$this->load->model(['M_AboutUs']);
	}

	function index($data = NULL){
		$data['header'] = 'About Us';
		$data['about'] = $this->getAbout();
    $data['team'] = $this->teamMembers();
		$this->templates->call_about_template($data);
	}

	function editAbout(){
		
      $about = $this->M_AboutUs->getAbout();
      foreach ($about as $key => $value) {
        $data['aboutid'] = $value->about_id;
        $data['about_message'] = $value->about_message;
      }
      $data['page_title'] = 'Edit About Us Message';
      $data['unread'] = count($this->contactus->unreadMessages());
      $data['signups'] = count($this->signup->countSignups());
      $data['content_view'] = 'AboutUs/edit_aboutus_view';
      $this->templates->call_admin_template($data);
    }

    function updateAboutMessage(){
    	if($this->input->post()){
    		$id = $this->input->post('aboutid');
			$data['about_message'] = $this->input->post('about');
			$this->M_AboutUs->updateAbout($id, $data);

			$this->session->set_flashdata('success', 'About Us updated successfully');
		}
		redirect(base_url().'AboutUs/editAbout');
    }

    function getAbout(){
		
      $about = $this->M_AboutUs->getAbout();
      foreach ($about as $key => $value) {
        $about_message = $value->about_message;
      }
      return $about_message;
    }

    function edit_team($id){
      $getteam = $this->M_AboutUs->getTeamId($id);

        $data['teamid'] = $id;
        foreach ($getteam as $key => $value) {
            $office = $value->office;
            $data['name'] = $value->name;
            $data['google'] = $value->google;
            $data['facebook'] = $value->facebook;
            $data['twitter'] = $value->twitter;
        }
      $data['page_title'] = 'Edit '.$office.'\'s Details';
      $data['unread'] = count($this->contactus->unreadMessages());
      $data['signups'] = count($this->signup->countSignups());
      $data['content_view'] = 'AboutUs/edit_team_view';
      $this->templates->call_admin_template($data);
    }

    function editTeam(){
      $this->load->library(['upload']);
      if($this->input->post()){
        $id = $this->input->post('id');
        $name = $this->input->post('name'); 
        $google = $this->input->post('google');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        
                 
        $files = $_FILES;
        if(!file_exists("./assets/dist_web/images/")) {
          mkdir("./assets/dist_web/images/", 0777, true);
        }
        $config = $this->set_team_upload_option($id);
        $this->upload->initialize($config);
        if($this->upload->do_upload('team')){
            $file_path = $config['upload_path'].$id.$this->upload->data('file_ext');
            
            $image = array('name' => $name, 
              'google' => $google,
              'facebook' => $facebook,
              'twitter' => $twitter, 
              'image_path' => $file_path
            );

            $this->M_AboutUs->update_team($id, $image);
        }
        else{
          $image = array('name' => $name, 
              'google' => $google,
              'facebook' => $facebook,
              'twitter' => $twitter
            );

            $this->M_AboutUs->update_team($id, $image);
        }
        $this->session->set_flashdata('success', 'Team uploaded successfully');
      }
       redirect(base_url().'AboutUs/view_team');
    }

    private function set_team_upload_option($id){
        //upload image options
        if (!file_exists("./assets/dist_web/images/team/")) {
            mkdir("./assets/dist_web/images/team/", 0777, true);
        }
      $config = array();
      $config['upload_path'] = "./assets/dist_web/images/team/";
      $config['file_name'] = $id;
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0';
      $config['overwrite'] = TRUE;

        return $config;
    }

    function view_team(){
    $this->load->model('M_AboutUs');
    $team = $this->M_AboutUs->getTeam();

    $team_table = "";

    if (count($team)>0){
      $incrementer = 1;
      foreach ($team as $key => $value) {
        $team_table .="<tr>";
        $team_table .="<td>{$incrementer}</td>";
        $image = base_url().ltrim($value->image_path, '.');
        $team_table .="<td>{$value->office}</td>";
        $team_table .="<td>{$value->name}</td>";
        $team_table .="<td><img src='{$image}' width='53' height='81'/></td>";
        $team_table .="<td><a href='".base_url()."AboutUs/edit_team/{$value->teamid}'><i>Edit</i></a></td>";
        $incrementer++;
      }
    }
        $data['page_title'] = 'List of Team Members';
        $data['team_table'] = $team_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'AboutUs/view_team_view';
        $this->templates->call_admin_template($data);

  }

  function teamMembers(){
      $team = $this->M_AboutUs->getTeam();
      $teams = "";
      if(count($team) > 0){
        foreach ($team as $key => $value) {
          $teams .= "<div class='col-md-3 col-sm-6 team-grids'>";
          $image = base_url().ltrim($value->image_path, '.');
          $teams .= "<img src='{$image}' alt='{$value->office}'/>";
          $teams .= "<div class='img-caption w3-agileits'>";
          $teams .= "<div class='img-agileinfo-text'>";
          $teams .= "<h4>{$value->name}</h4>";
          $teams .= "<p>{$value->office}</p>";
          $teams .= "<div class='w3social-icons'>";
          $teams .= "<ul>";
          $teams .= "<li><a href='{$value->google}' target='__blank'><i class='fa fa-google-plus'></i></a></li>";
          $teams .= "<li><a href='{$value->facebook}' target='__blank'><i class='fa fa-facebook'></i> </a></li>";
          $teams .= "<li><a href='{$value->twitter}' target='__blank'><i class='fa fa-twitter'></i> </a></li>";
          $teams .= "</ul>";
          $teams .= "</div>";
          $teams .= "</div>";
          $teams .= "</div>";
          $teams .= "</div>";
        }
      }
      return $teams;
    }
}