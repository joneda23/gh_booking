<?php

class Patient extends CI_Controller {
	
    public function index() { 
        $this->load->view('a_header');
        $this->load->view('patient');
        $this->load->view('a_footer');
    }

    public function add_patient(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->create($this->input->post());        
        if ($rs['error'] == 0) {
            echo '{"error":0, "sin":' . $this->input->post('s') . '}';
        } else
            echo '{"error":1, "message":"'.$rs['message'].'"}';
    }
    
    public function find_patient(){
        $this->load->model('patient_model');
        $patient = $this->patient_model->find_one($this->input->post());
        if (count($patient) > 0) {
            echo '{"hay":1,"s":"' . $patient[0]['s'] . '","n":"' . $patient[0]['n'] . '","a":"' . $patient[0]['a'] . '","e":"' . $patient[0]['e'] . '","p":"' . $patient[0]['p'] . '"}';
        } else
            echo '{"hay":0}';
    }
    
    public function list_all(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->list_all($this->input->post());
        echo json_encode($rs);
    }

    public function list_bydate(){
        if (count($this->input->post())==0){
            $d = date('Y-m-d');
        }else 
            $d = $this->input->post()['d'];
        $this->load->model('patient_model');
        $rs = $this->patient_model->list_all_by_date($d);
        echo json_encode($rs);
    }
    
    public function getPatientAppo(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->list_appo_patient($this->input->post());
        echo json_encode($rs);
    }

    public function rm_appo(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->remove_appo_patient($this->input->post());
    }

    public function rm_patient(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->remove_patient($this->input->post());
    }

    public function up_patient(){
        $this->load->model('patient_model');
        $rs = $this->patient_model->update_patient($this->input->post());
        if ($rs['error'] == 0) {
            echo '{"error":0}';
        } else
            echo '{"error":1, "message":"'.$rs['message'].'"}';
    }
 } 
