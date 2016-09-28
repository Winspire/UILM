<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('kvp_admin')) {
//            redirect('login', 'refresh');
//        }
        
        
        include ('include.php');
    }

    public function index() {
      
        //Banner
        $conditionarray=array('status' => 'Active');
        $this->data['banner_list'] = $this->common->getallrecordbytablename('banners', '*', '', '','bannerid','',$conditionarray);
        
        $conditionarray=array('status' => 'Active');
        $this->data['saminar_list'] = $this->common->getallrecordbytablename('events', '*', '3', '','eventstarttime','',$conditionarray);

        //$conditionarray=array('pages' => '2');
        $this->data['aboutus_detail'] = $this->common->select_database_id('pages', 'pageid', '1', '*');

        
        $conditionarray=array('status' => 'Active');
        $this->data['testimonial_list'] = $this->common->getallrecordbytablename('testimonials', '*', '', '','testimonialid','',$conditionarray);
        
        $date=date("Y-m-d", mktime(0, 0, 0, date('m') - 3, date('d'), date('Y')));
        $conditionarray=array('eventstarttime <=' => $date);
        $this->data['workshop_list'] = $this->common->getallrecordbytablename('events', '*', '3', '','eventstarttime','',$conditionarray);
        
        
//        echo "<pre>";print_r($this->data['doctor']);die();
        $this->load->view('home', $this->data);
    }

}
