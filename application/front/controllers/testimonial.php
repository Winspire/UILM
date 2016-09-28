<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        
        include ('include.php');
    }

    public function index() {
        
        $conditionarray=array('status' => 'Active');
        $this->data['testimonials_list'] = $this->common->getallrecordbytablename('testimonials', '*', '', '','testimonialid','',$conditionarray);


                $this->load->view('testimonial', $this->data);
           
    }

    

}
