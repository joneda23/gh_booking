<?php

class Today extends CI_Controller {
	
    public function index() { 
        $this->load->view('a_header');
        $this->load->view('today');
        $this->load->view('a_footer');
    }

    
 } 
