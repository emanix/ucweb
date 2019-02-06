<?php

class Home extends MY_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Templates', 'ContactUs', 'SignUp']);
        $this->load->model(['M_Home', 'M_Admin']);
        
    }

    function index($data = NULL){
      $this->session->set_userdata('Home');
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

      /*$events = $this->M_Events->getEvents();
      foreach ($events as $key => $value) {
        if($value->event_date < date("Y-m-d")){
          $this->M_Events->deleteEvent($value->eventid);
        }
      }*/

      //$data['bannerSlider'] = $this->bannerSlider();
      //$data['events_table'] = $this->eventsTable();
      $data['welcome_message'] = $this->welcomeAddress();
      $data['services_head'] = $this->Service_head();
      $data['services'] = $this->Services();
      $data['header_view'] = 'Templates/header_o';
      $data['footer_view'] = 'Templates/footer';
      $this->templates->call_home_template($data);
    }

    function bannerSlider(){
    	$banner = $this->M_Home->getBanner();
      $bannerslides = "";
      if(count($banner) > 0){
        foreach ($banner as $key => $value) {
          $bannerslides .= "<li>";
          $image = base_url().ltrim($value->image_path, '.');
          $bannerslides .= "<div class='w3layouts-banner-top' style='background-image: url({$image});'>";
          $bannerslides .= "<div class='container'>";
          $bannerslides .= "<div class='agileits-banner-info'>";
          $bannerslides .= "<h3>{$value->title}</h3>";
          $bannerslides .= "<h4><b>{$value->banner_info}</b></h4>";
          $bannerslides .= "</div>";
          $bannerslides .= "</div>";
          $bannerslides .= "</div>";
          $bannerslides .= "</li>";
        }
      }
      return $bannerslides;
    }

    function eventsTable(){
      $events = $this->M_Events->getEvents();

      $table = "";
      if(count($events) > 0){
        foreach ($events as $key => $value) {
          $table .= "<tr>";
          $date = date_format(date_create($value->event_date), 'F jS, Y');
          $table .= "<td><h4>{$date}</h4></td>";
          $table .= "<td><h4><a href='#'>{$value->event_info}</a></h4></td>";
          $table .= "</tr>";
        }
      }else{
        $table .= "<tr>";
        $table .= "<td><h2>Events coming soon</h2></td>";
        $table .= "</tr>";
      }
      return $table;
    }

    function editWelcome(){
      $home = $this->M_Home->getWelcome();
      foreach ($home as $key => $value) {
        $data['homeid'] = $value->homeid;
        $data['home_message'] = $value->home_message;
      }
      $data['page_title'] = 'Edit Welcome Message';
      $data['unread'] = count($this->contactus->unreadMessages());
      $data['signups'] = count($this->signup->countSignups());
      $data['content_view'] = 'Home/edit_welcomemessage_view';
      $this->templates->call_admin_template($data);
    }

    function updatewelcomeMessage(){
      if($this->input->post()){
        $id = $this->input->post('homeid');
        $data = array('home_message' => $this->input->post('welcome'));
        $this->M_Home->updateWelcome($id, $data);

        $this->session->set_flashdata('success', 'Message updated successfully');
      }
      redirect(base_url().'Home/editWelcome');
    }

    function welcomeAddress(){
      $wel_address = $this->M_Home->getWelcome();

      foreach ($wel_address as $key => $value) {
        $data = $value->home_message;
      }

      return $data;
    }

    function getServices(){
      $services = $this->M_Home->getServices();
      $service_table = "";
      if (count($services)>0){
        $incrementer = 1;
        foreach ($services as $key => $value) {
          $service_table .="<tr>";
          $service_table .="<td>{$incrementer}</td>";
          $service_table .="<td>{$value->service_head}</td>";
          $service_table .="<td>{$value->service}</td>";
          $service_table .="<td><a href='".base_url()."Home/editService/{$value->service_id}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
          $service_table .="<td><a href='".base_url()."Services/deleteService/{$value->service_id}'><div class='demo-google-material-icon'> <i class='material-icons'>delete</i></div></a></td>";
          $incrementer++;
        }
      }
      $data['page_title'] = 'List of Services';
      $data['service_table'] = $service_table;
      $data['unread'] = count($this->contactus->unreadMessages());
      $data['signups'] = count($this->signup->countSignups());
      $data['content_view'] = 'Home/view_services_view';
      $this->templates->call_admin_template($data);
    }

    function updateServices(){
      if($this->input->post()){
        $id = $this->input->post('serviceid');
        $data['service_head'] = $this->input->post('servicehead');
        $data['service'] = $this->input->post('service');
        

        $this->M_Home->updateService($id, $data);
      }
      $this->session->set_flashdata('success', 'Services updated successfully');
      redirect(base_url().'Home/getServices');
    }

    function editService($id){
      $services = $this->M_Home->getServiceId($id);

        $data['serviceid'] = $id;
        foreach ($services as $key => $value) {
            $data['servicehead'] = $value->service_head;
            $data['service'] = $value->service;
        }
      $data['page_title'] = 'Edit Service Details';
      $data['unread'] = count($this->contactus->unreadMessages());
      $data['signups'] = count($this->signup->countSignups());
      $data['content_view'] = 'Home/edit_services_view';
      $this->templates->call_admin_template($data);
    }

    function trim_text($input, $length, $ellipses = true, $strip_html = true) {
      //strip tags, if desired
      if ($strip_html) {
          $input = strip_tags($input);
      }
    
      //no need to trim, already shorter than trim length
      if (strlen($input) <= $length) {
          return $input;
      }
    
      //find last space within length
      $last_space = strrpos(substr($input, 0, $length), ' ');
      $trimmed_text = substr($input, 0, $last_space);
    
      //add ellipses (...)
      if ($ellipses) {
          $trimmed_text .= '...';
      }
    
      return $trimmed_text;
    }

    function Services(){
      $service = $this->M_Home->getServices();
      $services = "";
      
      if(count($service) > 0){
        $incrementer = 2;
        foreach ($service as $key => $value) {
          $description = $this->trim_text($value->service,110);
          $services .= "<div class='col-lg-4 services-agile-1 my-lg-0 my-5'>";
          $services .= "<div class='row wthree_agile_us'>";
          $services .= "<div class='col-lg-3 col-md-2 col-3  agile-why-text'>";
          if ($value->service_id == 2){
            $services .= "<div class='wthree_features_grid text-center p-3 border rounded'>";
            $services .= "<i class='fas fa-book'></i></div></div>";
            $services .= "<div class='col-9 agile-why-text-2 about_right'>";
            $services .= "<h4 class='text-capitalize text-white font-weight-bold mb-3'>{$value->service_head}</h4>";
            $services .= "<p>{$description}</p>";
            $services .= "<a class='btn mt-3 service-button p-0' href='".base_url()."Services/service_description/{$value->service_id}' role='button'>Read More<i class='fas fa-long-arrow-alt-right ml-1'></i>";
            $services .= "</a></div></div></div>";
          }elseif ($value->service_id == 3){
            $services .= "<div class='wthree_features_grid text-center p-3 border rounded'>";
            $services .= "<i class='fas fa-graduation-cap'></i></div></div>";
            $services .= "<div class='col-9 agile-why-text-2 about_right'>";
            $services .= "<h4 class='text-capitalize text-white font-weight-bold mb-3'>{$value->service_head}</h4>";
            $services .= "<p>{$description}</p>";
            $services .= "<a class='btn mt-3 service-button p-0' href='".base_url()."Services/service_description/{$value->service_id}' role='button'>Read More<i class='fas fa-long-arrow-alt-right ml-1'></i>";
            $services .= "</a></div></div></div>";
          }elseif($value->service_id == 4){
            $services .= "<div class='wthree_features_grid text-center p-3 border rounded'>";
            $services .= "<i class='fas fa-users'></i></div></div>";
            $services .= "<div class='col-9 agile-why-text-2 about_right'>";
            $services .= "<h4 class='text-capitalize text-white font-weight-bold mb-3'>{$value->service_head}</h4>";
            $services .= "<p>{$description}</p>";
            $services .= "<a class='btn mt-3 service-button p-0' href='".base_url()."Services/service_description/{$value->service_id}' role='button'>Read More<i class='fas fa-long-arrow-alt-right ml-1'></i>";
            $services .= "</a></div></div></div>";
          }
          
          $incrementer++;
        }
      }
      return $services;
    }

    function Service_head(){
      $service = $this->M_Home->getServices();
      $services = "";
      if(count($service) > 0){
        //$incrementer = 1;
        foreach ($service as $key => $value) {
          $services .= "<li class='mb-2'><i class='fas fa-check mr-3'></i><strong>{$value->service_head}</strong></li>";
          
          //$incrementer++;
        }
      }
      return $services;
    }

  function Feedback(){
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
    $data['success'] = $this->session->flashdata('failed');
    $this->templates->call_single_template($data);
  }
}
