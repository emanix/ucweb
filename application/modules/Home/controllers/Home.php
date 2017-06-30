<?php

class Home extends MY_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Templates', 'ContactUs']);
        $this->load->model(['M_Home', 'M_Events']);
        
    }

    function index($data = NULL){
      $data['bannerSlider'] = $this->bannerSlider();
      $data['events_table'] = $this->eventsTable();
      $data['welcome_message'] = $this->welcomeAddress();
      $data['services'] = $this->Services();
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
          $service_table .="<td><a href='".base_url()."Home/editService/{$value->service_id}'><i>Edit</i></a></td>";
          $incrementer++;
        }
      }
      $data['page_title'] = 'List of Services';
      $data['service_table'] = $service_table;
      $data['unread'] = count($this->contactus->unreadMessages());
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
      $data['content_view'] = 'Home/edit_services_view';
      $this->templates->call_admin_template($data);
    }

    function Services(){
      $service = $this->M_Home->getServices();
      $services = "";
      if(count($service) > 0){
        $incrementer = 1;
        foreach ($service as $key => $value) {
          $services .= "<div class='col-md-4 service-box'>";
          $services .= "<figure class='icon'>";
          $services .= "<span>$incrementer</span>";
          $services .= "</figure>";
          $services .= "<h5>{$value->service_head}</h5>";
          $services .= "<p>{$value->service}</p>";
          $services .= "</div>";
          $incrementer++;
        }
      }
      return $services;
    }
}
