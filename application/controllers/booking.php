<?php

class Booking extends CI_Controller {
    
    public function index(){
        $this->load->view('a_header');
        $this->load->view('booking');
        $this->load->view('a_footer');
        
    }
    
    public function availability(){
        $this->load->model('booking_model');
        $rs = $this->booking_model->getAvailability($this->input->post());
        echo json_encode($rs);
    }
    
    
    
    public function book_now(){
        $this->load->model('booking_model');
        $rs = $this->booking_model->book_now($this->input->post());
        if (count($rs) == 0) {
          echo '{"error":0}';
        } else
          echo '{"error":1}';
    }
}
