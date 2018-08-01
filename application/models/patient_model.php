<?php

class Patient_Model extends CI_Model {
	
    function __construct() { 
       parent::__construct(); 
    } 

    /**
     * Create a patient
     * Parameters in
     * post array
     * Parameters out
     * result boolean
     */

    public function create($post){
        $error = '';
        if (!empty($post)){
            if (empty($post['s']) || !is_numeric($post['s'])){
                $error = 'SIN must be numeric';
            }
            if (empty($post['n']) || !is_string($post['n'])){
                $error = 'Name must be a string';
            }
            if (empty($post['a']) || !is_string($post['a'])){
                $error = 'Address must be a string';
            }
            if (empty($post['e']) || !is_string($post['s'])){
                $error = 'Email must be a string';
            }
            if (empty($post['p'])){
                $error = 'Phone must not be empty';
            }
        } else return array('error'=>1,'message'=>'No data to insert');

        if ($error == ''){
            $this->db->like('patient_sin', $post['s']);
            $this->db->from('patients');
            $exists =  $this->db->count_all_results();
            if ($exists==0){
                $this->db->insert("patients", array('patient_sin'=>$post['s'],'patient_name'=>$post['n'],'patient_address'=>$post['a'],'patient_phone'=>$post['p'],'patient_email'=>$post['e']));
                return array('error'=>0);
            }
        } else {
            return array('error'=>1,'message'=>$error);
        }
    }

    public function find_one($post){
        $arr = array();
        $query = $this->db->get_where('patients', array('patient_sin' => $post['s'],'patient_active'=>1));
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $arr[$i]['s'] = $row->patient_sin;
                $arr[$i]['n'] = $row->patient_name;
                $arr[$i]['a'] = $row->patient_address;
                $arr[$i]['e'] = $row->patient_email;
                $arr[$i++]['p'] = $row->patient_phone;
            }
        }
        return $arr;
    }

    public function list_all($post){
        $arr = array();
        $i = 0;
        $query = $this->db->query("CALL GETALLPATIENTS()");
        foreach ($query->result() as $row) {
            
            $arr[$i][] = $row->patient_sin;
            $arr[$i][] = $row->patient_name;
            $arr[$i][] = $row->patient_address;
            $arr[$i][] = $row->patient_email;
            $arr[$i][] = $row->patient_phone;
            $arr[$i++][] = $row->citas;
        }
        return $arr;
    }

    public function list_all_by_date($date){
        $arr = array();
        $i = 0;
        $query = $this->db->query("call getPatientsbyDate(?)",array($date));
        foreach ($query->result() as $row) {
            $arr[$i][] = $row->booking_date . ' '.$row->booking_hour.':00';
            $arr[$i][] = $row->patient_name;
            $arr[$i][] = $row->patient_address;
            $arr[$i][] = $row->patient_email;
            $arr[$i][] = $row->patient_phone;
            $arr[$i++][] = $row->booking_reason;
        }
        return $arr;
    }

    public function list_appo_patient($post){
        $arr = array();
        $i = 0;
        $query = $this->db->query("call getapppatient(?)",array($post['p']));
        foreach ($query->result() as $row) {
            $arr[$i][] = $row->booking_date;
            $arr[$i][] = $row->booking_hour;
            $arr[$i++][] = $row->eve;
        }
        return $arr;
    }

    public function remove_appo_patient($post){
        $this->db->where('patient_id', $post['s']);
        $this->db->where('booking_date', $post['d']);
        $this->db->where('booking_hour', $post['h']);
        if ($this->db->delete('booking')) 
            return true ;
    }

    public function remove_patient($post){
        $this->db->where('patient_sin', $post['s']);
        if ($this->db->update("patients", array('patient_active'=>0)))
            return true;
    }
 
    public function update_patient($post) {
        $error = '';
        if (!empty($post)){
            if (empty($post['s']) || !is_numeric($post['s'])){
                $error = 'SIN must be numeric';
            }
            if (empty($post['n']) || !is_string($post['n'])){
                $error = 'Name must be a string';
            }
            if (empty($post['a']) || !is_string($post['a'])){
                $error = 'Address must be a string';
            }
            if (empty($post['e']) || !is_string($post['s'])){
                $error = 'Email must be a string';
            }
            if (empty($post['p'])){
                $error = 'Phone must not be empty';
            }
        } else return array('error'=>1,'message'=>'No data to update');

        if ($error == ''){
            if ($post['os']!=$post['s']){
                $this->db->like('patient_sin', $post['s']);
                $this->db->from('patients');
                $exists =  $this->db->count_all_results();
                if ($exists==0){
                    $data['patient_sin']=$post['s'];
                    $data['patient_name']=$post['n'];
                    $data['patient_address']=$post['a'];
                    $data['patient_email']=$post['e'];
                    $data['patient_phone']=$post['p'];
            
                    $this->db->set($data); 
                    $this->db->where("patient_sin", $post['os']); 
                    $this->db->update("patients", $data);
                    return array('error'=>0);
                } else return array('error'=>1,'message'=>'A patient has already this SIN');
            }  
        } else 
            return array('error'=>1,'message'=>$error);
    } 
 } 