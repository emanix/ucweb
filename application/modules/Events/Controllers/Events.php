<?php

class Events extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module(['Templates', 'ContactUs']);
		$this->load->model("M_Events");
	}

	function addEvents(){
		$data['page_title'] = 'Event Management';
		$data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'Events/add_events_view';
        $this->templates->call_admin_template($data);
	}

	function insertEvent(){
		if($this->input->post()){
			$data['event_date'] = $this->input->post('events_date');
			$data['event_info'] = $this->input->post('events_info');

			$this->M_Events->addEvents($data);
			$this->session->set_flashdata('success', 'Event added successfully');
		}else{
			$this->session->set_flashdata('failed', 'Event could not be added, ensure that all fields are properly filled. Then try again');
		}
		redirect(base_url().'Events/addEvents');
	}

	function viewEvents(){
		$this->load->model('M_Events');
		$events = $this->M_Events->getEvents();

		$event_table = "";

		if (count($events)>0){
			$incrementer = 1;
			foreach ($events as $key => $value) {
				$event_table .="<tr>";
				$event_table .="<td>{$incrementer}</td>";
				$date = date_format(date_create($value->event_date), 'F jS, Y');
                $event_table .="<td>{$date}</td>";
				$event_table .="<td>{$value->event_info}</td>";
				$event_table .="<td><a href='".base_url()."Events/editEvent/{$value->eventid}'><i>Edit Event</i></a></td>";
				$event_table .="<td><a href='".base_url()."Events/deleteEvent/{$value->eventid}'><i>Delete Event</i></a></td>";
				$incrementer++;
			}
		}
        $data['page_title'] = 'List of Events';
        $data['event_table'] = $event_table;
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'Events/view_event_view';
        $this->templates->call_admin_template($data);

	}

	function editEvent($id){
        $getevent = $this->M_Events->getEventId($id);

        $data['eventid'] = $id;
        foreach ($getevent as $key => $value) {
            $data['eventDate'] = $value->event_date;
            $data['eventDetails'] = $value->event_info;
        }

        $data['page_title'] = 'Make changes to Event';
        $data['unread'] = count($this->contactus->unreadMessages());
        $data['content_view'] = 'Events/edit_event_view';
        $this->templates->call_admin_template($data);
    }

    function updateEvent(){
		if($this->input->post()){
			$data['event_date'] = $this->input->post('events_date');
			$data['event_info'] = $this->input->post('events_info');

			$this->M_Events->updateEvents($this->input->post('eventid'), $data);
			$this->session->set_flashdata('success', 'Event updated successfully');
		}else{
			$this->session->set_flashdata('failed', 'Event could not update');
		}
		redirect(base_url().'Events/viewEvents');
	}

	function deleteEvent($id){
        $this->M_Events->deleteEvent($id);
        $this->session->set_flashdata('success', 'Event successfully deleted');

        redirect(base_url().'Events/viewEvents');
    }
}