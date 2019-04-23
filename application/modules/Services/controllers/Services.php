<?php

class Services extends MY_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Templates', 'ContactUs', 'SignUp']);
        $this->load->model(['M_Home', 'M_Services', 'M_Admin']);
        
    }

    function service_description($id) {
    	
      $service_dets = $this->M_Services->getServiceId($id);
      foreach ($service_dets as $key => $value) {
      	if ($value->service_head == "Credential Evaluation Services"){
      		redirect(base_url().'Services/evaluation_services');
      	}elseif ($value->service_head == "Translation Services"){
      		redirect(base_url().'Services/translation_services');
      	}elseif ($value->service_head == "Translation Certification Training Services"){
      		redirect(base_url().'Services/training_services');
      	}
      }

    }

    //Generates admin insert service view
    function add_service_v(){
    	$data['page_title'] = 'Add New Services';
		$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
        $data['content_view'] = 'Services/add_services_view';
        $this->templates->call_admin_template($data);
    }

    //Add services database
    function add_service(){
		if($this->input->post()){
			$data['service_head'] = $this->input->post('service_head');
			$data['service'] = $this->input->post('service');

			$this->M_Services->addServices($data);
			$this->session->set_flashdata('success', 'Service added successfully');
		}else{
			$this->session->set_flashdata('failed', 'Service could not be added, ensure that all fields are properly filled. Then try again');
		}
		redirect(base_url().'Services/add_service_v');
    }

    //Gets services from db
    function get_services_select(){
    	$services = $this->M_Services->getServices();

    	$options = "";
    	if(count($services)>0){
    		foreach ($services as $key => $value) {
    			$options .= "<option value = '{$value->service_id}'>{$value->service_head}</option>";
    		}
    	}
    	return $options;
    }

    function add_servicetypes(){
    	$data['page_title'] = 'Add Service Types';
    	$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
        $data['services'] = $this->get_services_select();
        $data['content_view'] = 'Services/add_servicetype_view';
        $this->templates->call_admin_template($data);
    }

    function insert_servicetype(){
    	if($this->input->post()){
    		$data['service_id'] = $this->input->post('service_head');
    		$data['stname'] = $this->input->post('stname');
    		$data['category'] = $this->input->post('category');
    		$data['stdescription'] = $this->input->post('stdescription');

    		$this->M_Services->addServiceTypes($data);
    		$this->session->set_flashdata('success', 'Service successfully added');
    	}else{
    		$this->session->set_flashdata('failed', 'Error! Service could not be added, check to ensure that all parameters are filled correctly');
    	}
    	
    	redirect(base_url().'Services/add_servicetypes');
    }

    function set_service_price_p(){
    	$data['page_title'] = 'Set Service Prices';
    	$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
        $data['service_type'] = $this->get_service_type();
        $data['content_view'] = 'Services/price_view';
        $this->templates->call_admin_template($data);
    }

    function get_service_type(){
    	//$servicetype = $this->M_Services->getServicetypes();

    	$options = "";
    	//if(count($servicetype)>0){
    		//foreach ($servicetype as $key => $value) {
    			$options .= "<option value ='Course-by-Course Evaluation'>Course-by-Course Evaluation</option>";
    			$options .= "<option value ='Course-by-Course Rush Evaluation'>Course-by-Course Rush Evaluation</option>";
    			$options .= "<option value ='Document-by-Document Evaluation'>Document-by-Document Evaluation</option>";
    			$options .= "<option value ='Document-by-Document Rush Evaluation'>Document-by-Document Rush Evaluation</option>";
    			$options .= "<option value ='Document Translation'>Document Translation</option>";
    		//}
    	//}
    	return $options;
    }

    function get_stcategory(){
    	if (isset($_GET['stype'])) {
            $stcategory = $this->M_Services->getServicetype($_GET['stype']);
            foreach ($stcategory as $key => $caty) {
            	if($caty->category == "Standard"){
            		$this->show_rush($caty->category);
            		$this->session->set_userdata('duration', $caty->stid);
            	}else{
            		//$cat_id = $caty->stid;
		            echo "<p><b>{$caty->category} Service Duration</b></p>";
		            echo "<select class='form-control show-tick' name='duration' required>";
		            echo "<option>Please Select Duration</option>";
		            if (count($stcategory)) {
		                foreach ($stcategory as $key => $value) {

		                    echo "<option value='{$value->stid}'>{$value->stdescription}</option>";

		                }


		            }
		            echo "</select>";
		            break;
		        }
	        }
        }
    }

    function show_rush($data){
    	echo "<p><b>Service Category</b></p>";
    	echo "<p>{$data}</p>";
    }

    function deleteService($id){
    	if ($id) {
    		$this->M_Services->deleteServices($id);
    		$this->session->set_flashdata('success', 'Service successfully deleted');
    	}else{
			$this->session->set_flashdata('failed', 'Service could not be deleted');
		}

		redirect(base_url().'Home/getServices');
    }

    function insert_service_price(){
    	if($this->input->post()){
    		//print_r($this->input->post('duration')); die;
    		//confirm that the currency is naira
    		if($this->input->post('currency') == "Naira"){
    			if($this->input->post('duration')){
	    			//verify the service category
	    			$category = $this->M_Services->getServicetypeId($this->input->post('duration'));
	    			foreach ($category as $key => $value) {
	    				if($value->category=="Rush Hour"){
	    					//print_r($this->input->post('duration')); die;
	    					$data['stid'] = $this->input->post('duration');
	    					$data['naira_amount'] = $this->input->post('price');
	    					//print_r($data); die;
	    					$this->M_Services->add_prices($data);
	    					$this->session->set_flashdata('success', 'Price successfully setup');
	    				}
	    			}
	    		}else{
	    			$data['stid'] = $this->session->userdata('duration');
	    			$data['naira_amount'] = $this->input->post('price'); 
	    			$this->M_Services->add_prices($data);
	    			$this->session->set_flashdata('success', 'Price successfully setup');
	    		}
    		}elseif ($this->input->post('currency') == "Dollar") {
    			if($this->input->post('duration')){
	    			$category = $this->M_Services->getServicetypeId($this->input->post('duration'));
	    			foreach ($category as $key => $value) {
	    				if($value->category=="Rush Hour"){
	    					$data['stid'] = $this->input->post('duration');
	    					$data['dollar_amount'] = $this->input->post('price');
	    					$this->M_Services->add_prices($data);
	    					$this->session->set_flashdata('success', 'Price successfully setup');
	    				}
	    			}
	    		}else{
	    			$data['stid'] = $this->session->userdata('duration');
	    			$data['dollar_amount'] = $this->input->post('price'); 
	    			$this->M_Services->add_prices($data);
	    			$this->session->set_flashdata('success', 'Price successfully setup');
	    		}
    		}else{
    			if($this->input->post('duration')){
	    			$category = $this->M_Services->getServicetypeId($this->input->post('duration'));
	    			foreach ($category as $key => $value) {
	    				if($value->category=="Rush Hour"){
	    					$data['stid'] = $this->input->post('duration');
	    					$data['cfa_amount'] = $this->input->post('price');
	    					$this->M_Services->add_prices($data);
	    					$this->session->set_flashdata('success', 'Price successfully setup');
	    				}
	    			}
	    		}else{
	    			$data['stid'] = $this->session->userdata('duration');
	    			$data['cfa_amount'] = $this->input->post('price'); 
	    			$this->M_Services->add_prices($data);
	    			$this->session->set_flashdata('success', 'Price successfully setup');
	    		}
    		}
    	}else{
    		$this->session->set_flashdata('failed', 'Error! Price could not be setup, check to ensure that all parameters are filled correctly');
    	}
    	redirect(base_url().'Services/set_service_price_p');
    }

    function view_service_prices(){
    	//get services and their prices
    	//$priceList = $this->M_Services->getServiceprices();
    	//Get all service types
    	$service = $this->M_Services->getServicetypes();
    	$price_table = "";
    	$incrementer = 1; 
    	$incre = 1;
    	foreach ($service as $key => $value) {
    		$price_table .="<tr>";
          	$price_table .="<td>{$incrementer}</td>";
          	$price_table .="<td>{$value->stname}</td>";
          	$price_table .="<td>{$value->stdescription}</td>";
          	//Get prices of each service type
          	$prices = $this->M_Services->getServiceprice($value->stid);
          	//verifies record exists in price table
          	if(count($prices) > 0){
          		/*if(count($prices) == 1){
          			foreach ($prices as $key => $price) {
	          			if(isset($price->naira_amount)){
		          			$price_table .="<td>{$price->naira_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->naira_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}

		          		if(isset($price->cfa_amount)){
		          			$price_table .="<td>{$price->cfa_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->cfa_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}

		          		if(isset($price->dollar_amount)){
		          			$price_table .="<td>{$price->dollar_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->dollar_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}
		          	}
          		}elseif(count($prices) == 2){
          			foreach ($prices as $key => $price) {
	          			if(isset($price->naira_amount)){
		          			$price_table .="<td>{$price->naira_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->naira_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}

		          		if(isset($price->cfa_amount)){
		          			$price_table .="<td>{$price->cfa_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->cfa_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}

		          		if(isset($price->dollar_amount)){
		          			$price_table .="<td>{$price->dollar_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          		}elseif(empty($price->dollar_amount)){
		          			$price_table .="<td>Not Set</td>";
		          		}
		          	}
          		}elseif(count($prices) == 3){*/
		          	foreach ($prices as $key => $price) {
		          		//Check currency type and print if met
		          		if($incre == 1){
		          			if(isset($price->naira_amount)){
		          				$price_table .="<td>{$price->naira_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          			}elseif(empty($price->naira_amount)){
		          				$price_table .="<td>Not Set</td>";
		          			}
		          		}

		          		if($incre == 2){
		          			if(isset($price->cfa_amount)){
		          				$price_table .="<td>{$price->cfa_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          			}elseif(empty($price->cfa_amount)){
		          				$price_table .="<td>Not Set</td>";
		          			}
		          		}

		          		if($incre == 3){
		          			if(isset($price->dollar_amount)){
		          				$price_table .="<td>{$price->dollar_amount}<a href='".base_url()."Services/edit_service_price/{$price->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
		          			}elseif(empty($price->dollar_amount)){
		          				$price_table .="<td>Not Set</td>";
		          			}
		          		}
		          		$incre ++;
		          	}
		          	$incre = 1;
		        //}
	        }else{
	        	for ($i=0; $i < 3; $i++) { 
	        		$price_table .="<td>Not Set</td>";
	        	}
	        }
          	//$price_table .="<td>{$value->naira_amount}</td>";
          	//$price_table .="<td>{$value->cfa_amount}</td>";
          	//$price_table .="<td>{$value->dollar_amount}</td>";
          	//$price_table .="<td><a href='".base_url()."Services/edit_service_price/{$value->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>edit</i></div></a></td>";
          	//$price_table .="<td><a href='".base_url()."Services/delete_service_price/{$value->prid}'><div class='demo-google-material-icon'> <i class='material-icons'>delete</i></div></a></td>";
          	$incrementer ++;
    	}
    	$data['page_title'] = "Services Price List";
    	$data['unread'] = count($this->contactus->unreadMessages());
		$data['signups'] = count($this->signup->countSignups());
        $data['price_table'] = $price_table;
        $data['content_view'] = 'Services/price_list_view';
        $this->templates->call_admin_template($data);
    }

    function evaluation_services(){
    	$this->session->set_userdata('evaluation');
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
    	$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Credential Evaluation Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}
    	$data['page_title'] = 'Credential Evaluation';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	$data['category'] = $this->evaluation_category();
      	$data['categories'] = $this->view_stcategory();
      	$this->templates->call_eval_template($data);
    }

    function translation_services(){
    	$this->session->set_userdata('translation');
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
    	$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Translation Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}
    	$data['page_title'] = 'Translation Services';
    	$data['header_view'] = 'Templates/header_t';
      	$data['footer_view'] = 'Templates/footer';
      	$data['category'] = $this->evaluation_category();
      	$data['categories'] = $this->view_stcategory();
      	$this->templates->call_trans_template($data);
    }

    function training_services(){
    	$this->session->set_userdata('training');
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
    	$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Translation Certification Training Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}
    	$data['page_title'] = 'Translation Certification Training Services';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	$data['category'] = $this->evaluation_category();
      	$data['categories'] = $this->view_stcategory();
      	$this->templates->call_training_template($data);
    }

    function evaluation_category(){
    	$category = $this->M_Services->get_servicetypes();
    	$types = "";
    	foreach ($category as $key => $value) {
    		if($value->category == 'Standard'){
    			$types .= "<li class='mt-3'>";
    			$types .= "<i class='fas fa-check mr-2'></i>";
    			$types .= "<a href='' onClick='view_category()'>{$value->stname}</a></li>";
    			
    		}
    	}
    	$types .= "<li class='mt-3'>";
    	$types .= "<i class='fas fa-check mr-2'></i>";
    	$types .= "<a href='' onClick='view_category()'>Rush Services</a></li>";

    	return $types;
    }

    function view_stcategory(){
    	//if (isset($_GET['stcat'])) {
            $stcategory = $this->M_Services->getServicetypes();
            $catey = "";
            foreach ($stcategory as $key => $caty) {
            	if($caty->category == 'Standard'){
			        $catey .= "<div class='col-md-4 news-grid'>";
			        $catey .= "<div class='news-text'>";
			        $catey .= "<div class='detail-bottom'>";
			        $catey .= "<h4 class='my-3'>{$caty->stname}</h4>";
			        $catey .= "<p>{$caty->stdescription}</p>";
			        $catey .= "</div>";
			        $catey .= "</div>";
			        $catey .= "</div>";
			    }
	        }
	        $catey .= "<div class='col-md-4 news-grid'>";
			$catey .= "<div class='news-text'>";
			$catey .= "<div class='detail-bottom'>";
			$catey .= "<h4 class='my-3'>Rush Services</h4>";
			$catey .= "<p>Our rush hour services are in three different categories, ranging from 3 days rush, 2 days rush and 1 day rush depending on the service need of a client, and are applicable to both our Course-by-Course and Document-by-Document evaluations.</p>";
			$catey .= "</div>";
			$catey .= "</div>";
			$catey .= "</div>";

			$catey .= "<div class='col-md-4 news-grid'>";
			$catey .= "<div class='news-text'>";
			$catey .= "<div class='detail-bottom'>";
			$catey .= "<h4 class='my-3'>Additional Service</h4>";
			$catey .= "<p>We provide the soft (Electronic) copy of every certified document free of charge for all our clients.</p>";
			$catey .= "</div>";
			$catey .= "</div>";
			$catey .= "</div>";
        //}
	        return $catey;
    }

    function display_prices(){
    	/*$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Credential Evaluation Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}*/
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
    	$data['page_title'] = 'Credential Evaluation Pricing';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	$data['course_price_table'] = $this->retrieve_course_evaluation_price();
      	$data['rush_course_price_table'] = $this->rush_course_evaluation_price();
      	$data['rush_document_price_table'] = $this->rush_document_evaluation_price();
      	$data['document_price_table'] = $this->retrieve_document_evaluation_prices();
      	//$data['categories'] = $this->view_stcategory();
      	$this->templates->call_eval_prices($data);
    }

    function retrieve_course_evaluation_price(){
    	$course_price = $this->M_Services->getServiceprices();

    	$price_table = "";
    	$dollar = "$";
    	foreach ($course_price as $key => $value) {
    		if ($value->stname == "Course-by-Course Evaluation"){
    			$price_table .= "<tr>";
    			$price_table .= "<td colspan='2'>{$value->stdescription}</td>";
    			$price = $this->M_Services->getServiceprice($value->stid);
    			foreach ($price as $key => $cost) {
    				if($cost->naira_amount){
    					$price_table .= "<td colspan='2'><p style='color: green'>N{$cost->naira_amount}</p></td>";
	    			}elseif ($cost->cfa_amount) {
	    				$price_table .= "<td colspan='2'><p style='color: green'>{$cost->cfa_amount}CFA</p></td>";
	    			}else{
	    				$price_table .= "<td colspan='2'><p style='color: green'>$dollar{$cost->dollar_amount}</p></td>";
	    			}   			
    			}
    			
    			$price_table .= "</tr>";
    		}
    		break;
    	}
    	return $price_table;
    }

    function rush_course_evaluation_price(){
    	$course_price = $this->M_Services->getServicetype("Course-by-Course Rush Evaluation");
    	$count = 0;
    	$price_table = "";
    	$dollar = "$"; //print_r($course_price); die;
    	foreach ($course_price as $key => $value) {
    		if ($value->stname == "Course-by-Course Rush Evaluation"){
    			$price_table .= "<tr>";
    			$price_table .= "<td colspan='2'>{$value->stdescription}</td>";
    			$price = $this->M_Services->getServiceprice($value->stid);
    			foreach ($price as $key => $cost) {
    				if($cost->naira_amount){
    					$price_table .= "<td colspan='2'><p style='color: green'>N{$cost->naira_amount}</p></td>";
	    			}elseif ($cost->cfa_amount) {
	    				$price_table .= "<td colspan='2'><p style='color: green'>{$cost->cfa_amount}CFA</p></td>";
	    			}else{
	    				$price_table .= "<td colspan='2'><p style='color: green'>$dollar{$cost->dollar_amount}</p></td>";
	    			} 

	    						
    			}
    			
    			$price_table .= "</tr>";
    		}
    		
    	}
    	return $price_table;
    }

    function retrieve_document_evaluation_prices(){
    	$course_price = $this->M_Services->getServicetype("Document-by-Document Evaluation");

    	$price_table = "";
    	$dollar = "$";
    	foreach ($course_price as $key => $value) {
    		if ($value->stname == "Document-by-Document Evaluation"){
    			$price_table .= "<tr>";
    			$price_table .= "<td colspan='2'>{$value->stdescription}</td>";
    			$price = $this->M_Services->getServiceprice($value->stid);
    			//print_r($price); die;
    			foreach ($price as $key => $cost) {
    				if($cost->naira_amount){
    					$price_table .= "<td colspan='2'><p style='color: green'>N{$cost->naira_amount}</p></td>";
	    			}elseif ($cost->cfa_amount) {
	    				$price_table .= "<td colspan='2'><p style='color: green'>{$cost->cfa_amount}CFA</p></td>";
	    			}else{
	    				$price_table .= "<td colspan='2'><p style='color: green'>$dollar{$cost->dollar_amount}</p></td>";
	    			}   			
    			}
    			
    			$price_table .= "</tr>";
    		}
    		//break;
    	}
    	return $price_table;
    }

    function rush_document_evaluation_price(){
    	$course_price = $this->M_Services->getServicetype("Document-by-Document Rush Evaluation");
    	$count = 0;
    	$price_table = "";
    	$dollar = "$"; //print_r($course_price); die;
    	foreach ($course_price as $key => $value) {
    		if ($value->stname == "Document-by-Document Rush Evaluation"){
    			$price_table .= "<tr>";
    			$price_table .= "<td colspan='2'>{$value->stdescription}</td>";
    			$price = $this->M_Services->getServiceprice($value->stid);
    			foreach ($price as $key => $cost) {
    				if($cost->naira_amount){
    					$price_table .= "<td colspan='2'><p style='color: green'>N{$cost->naira_amount}</p></td>";
	    			}elseif ($cost->cfa_amount) {
	    				$price_table .= "<td colspan='2'><p style='color: green'>{$cost->cfa_amount}CFA</p></td>";
	    			}else{
	    				$price_table .= "<td colspan='2'><p style='color: green'>$dollar{$cost->dollar_amount}</p></td>";
	    			} 

	    						
    			}
    			
    			$price_table .= "</tr>";
    		}
    		
    	}
    	return $price_table;
    }

    function doc_translation_prices(){
    	/*$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Credential Evaluation Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}*/
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
    	$data['page_title'] = 'Document Translation Pricing';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	$data['course_price_table'] = $this->retrieve_doc_translation_price();
      	//$data['categories'] = $this->view_stcategory();
      	$this->templates->call_translation_prices($data);
    }

    function retrieve_doc_translation_price(){
    	$doc_price = $this->M_Services->getServicetype("Document Translation");

    	$price_table = "";
    	$dollar = "$"; 
    	foreach ($doc_price as $key => $value) {
    		if ($value->stname == "Document Translation"){
    			$price_table .= "<tr>";
    			$price_table .= "<td colspan='2'>{$value->stdescription}</td>";
    			$trans_price = $this->M_Services->getServiceprice($value->stid);
    			
    			foreach ($trans_price as $key => $cost) {
    				if($cost->naira_amount){
    					$price_table .= "<td colspan='2'><p style='color: green'>N{$cost->naira_amount}</p></td>";
	    			}elseif ($cost->cfa_amount) {
	    				$price_table .= "<td colspan='2'><p style='color: green'>{$cost->cfa_amount}CFA</p></td>";
	    			}else{
	    				$price_table .= "<td colspan='2'><p style='color: green'>$dollar{$cost->dollar_amount}</p></td>";
	    			}   			
    			}
    			
    			$price_table .= "</tr>";
    		}
    		break;
    	}
    	return $price_table;
    }

    function edit_service_price($id){
    	$price = $this->M_Services->get_serviceprices($id);
    	
    	foreach ($price as $key => $value) {
    		if($value->naira_amount > 0){
    			$this->session->set_userdata('currency', 'naira');
    			$data['naira'] = 'Naira =N=';
    			$data['stname'] = $value->stname;
    			$data['amount'] = $value->naira_amount;
    			$data['prid'] = $value->prid;
    		}elseif($value->cfa_amount > 0){
    			$this->session->set_userdata('currency', 'cfa');
    			$data['naira'] = 'CFA';
    			$data['stname'] = $value->stname;
    			$data['amount'] = $value->cfa_amount;
    			$data['prid'] = $value->prid;
    		}elseif($value->dollar_amount > 0){
    			$this->session->set_userdata('currency', 'dollar');
    			$data['naira'] = 'Dollar $';
    			$data['stname'] = $value->stname;
    			$data['amount'] = $value->dollar_amount;
    			$data['prid'] = $value->prid;
    		}
    	}

    	$data['page_title'] = 'Update Service Price';
    	$data['content_view'] = 'Services/update_price_view';
        $this->templates->call_admin_template($data);

    }

    function updateServicesPrice(){
    	if($this->input->post()){
        $id = $this->input->post('prid');
        if($this->session->userdata('currency') == 'naira'){
        	$data['naira_amount'] = $this->input->post('amount');
        }elseif($this->session->userdata('currency') == 'cfa'){
        	$data['cfa_amount'] = $this->input->post('amount');
        }elseif($this->session->userdata('currency') == 'dollar'){
        	$data['dollar_amount'] = $this->input->post('amount');
        }
                

        $this->M_Services->updatePrice($id, $data);
      }
      $this->session->set_flashdata('success', 'Price updated successfully');
      redirect(base_url().'Services/view_service_prices');
    }

    function place_order(){
    	/*$eval_service = $this->M_Services->getServices();
    	foreach ($eval_service as $key => $value) {
    		if($value->service_head == 'Credential Evaluation Services'){
    			$data['service_detail'] = $value->service;
    		}
    	}*/
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
    	$data['page_title'] = 'Document Translation Pricing';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	//$data['categories'] = $this->view_stcategory();
      	$this->templates->call_order_template($data);
	}
	
	function get_started(){
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
    	//$data['page_title'] = 'Document Translation Pricing';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	//$data['categories'] = $this->view_stcategory();
      	$this->templates->get_started($data);
	}

	function confirm_email(){
        if($this->input->post()){
            //$data['email'] = $this->input->post('Email');
            $email = base64_encode($this->input->post('email'));
            //$id = $this->M_SignUp->insertSubscribe($data);

            //$link = "http://www.unitychoraleng.org/Users/unsubscribeNews/".$id;
			$link = "http://www.iitas.test/Services/complete_order/".$email;
			
			$config = Array(
			'protocol' => 'smtp',
			  'smtp_host' => 'smtp.mailtrap.io',
			  'smtp_port' => 2525,
			  'smtp_user' => 'c69db7c8bb49ba',
			  'smtp_pass' => '60779f5cfa94e3',
			  'crlf' => "\r\n",
			  'newline' => "\r\n"
		);
		$this->load->library('email');
		$this->email->initialize($config);
            
            $message = "
          <html>
          <head>
          <title></title>
          </head>
          <body>
          <h3>Confirm Email</h3>
          <p>To complete your order with IITAS,</p>
          <p>Kindly click <a target='__blank' href='{$link}'>here</a> to confirm your email address <br> and continue with your order.</p>
          </body>
          </html>
        ";
		

        //$this->email->mailtype('html');
        $this->email->from('info@iitas.org', 'IITAS');
        $this->email->to($email);

        $this->email->subject('Email Confirmation');
        $this->email->message($message);
        $this->email->set_mailtype("html");

        $this->email->send();

        $this->session->set_flashdata('success', 'Your order is in progress, check you mail for confirmation');
		//redirect(base_url().'SignUp/signUpFeedback');
		print_r($this->session->flashdata('success')); die;
        }
	}
	
	function complete_order($dat){

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

		$data['mail'] = base64_decode($dat);
		
    	//$data['page_title'] = 'Document Translation Pricing';
    	$data['header_view'] = 'Templates/header_p';
      	$data['footer_view'] = 'Templates/footer';
      	//$data['categories'] = $this->view_stcategory();
      	$this->templates->complete_orders($data);
	}
}