<?php

class Booking_Model extends CI_Model {
	
    function __construct() { 
       parent::__construct(); 
    } 

    public function getAvailability($post){
        $data = array();
        $arr = array();
        $query = $this->db->query("select booking_hour from booking where booking_date = ?", array($post['d']));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $arr[] = $row->booking_hour;
            }
        }
        for ($i=8;$i<17;$i++){
            if (!in_array($i,$arr))
                $data[]=$i;
        }
        return $data;
    }

    public function book_now($post){
        $data = array();
        $error = array();

        $query = $this->db->get_where('booking', array('booking_date' => $post['d'], 'booking_hour' => $post['h'] ));
        if ($query->num_rows() == 0) {
            if ($this->db->insert("booking", array('booking_date' => $post['d'], 'booking_hour' => $post['h'], 'patient_id'=> $post['p'], 'booking_reason'=> $post['r']))) { 
                return true; 
             } 
        }else {
            
        }
    }
 
    public function insert($data) { 
       if ($this->db->insert("stud", $data)) { 
          return true; 
       } 
    } 
 
    public function delete($roll_no) { 
       if ($this->db->delete("stud", "roll_no = ".$roll_no)) { 
          return true; 
       } 
    } 
 
    public function update($data,$old_roll_no) { 
       $this->db->set($data); 
       $this->db->where("roll_no", $old_roll_no); 
       $this->db->update("stud", $data); 
    } 
 } 