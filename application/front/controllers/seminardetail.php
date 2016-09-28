<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seminardetail extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        
        include ('include.php');
    }

    public function index($url='') {

        if($url != '')  {      
                
            $conditionarray=array('status' => 'Active','eventurl' => $url);
            $this->data['event_detail'] = $this->common->select_database_id('events', 'eventurl', $url, '*',$conditionarray);

            $this->load->view('seminar/seminardetail', $this->data);
        } else {
            redirect('seminar', 'refresh');
        }
    }

    

}
