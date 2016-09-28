<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('kvp_admin')) {
//            redirect('login', 'refresh');
//        }
        
         
       
        include ('include.php');
    }

    public function index() {
        
        $conditionarray=array('status' => 'Active');
        $this->data['gallery_list'] = $this->common->getallrecordbytablename('gallery', '*', '', '','galleryid','',$conditionarray);

        //$this->load->view('gallery', $this->data);
    }
    
    public function image() {
        
        $conditionarray=array('status' => 'Active','galleryimage !=' => '');
        $this->data['gallery_list'] = $this->common->getallrecordbytablename('gallery', '*', '', '','galleryid','',$conditionarray);

        $this->load->view('gallery', $this->data);
    }
    
    public function video() {
        
        $conditionarray=array('status' => 'Active','galleryvideo !=' => '');
        $this->data['gallery_list'] = $this->common->getallrecordbytablename('gallery', '*', '', '','galleryid','',$conditionarray);

        $this->load->view('gallery', $this->data);
    }
    
    public function brochure($id = '') {
        
        $conditionarray=array('status' => 'Active');
        $this->data['gallery_list'] = $this->common->getallrecordbytablename('gallery', '*', '', '','galleryid','',$conditionarray);
        
        if($id != "") 
        {
            $conditionarray=array('status' => 'Active','galleryid' => $id);
            $this->data['gallery_detail'] = $this->common->getallrecordbytablename('gallery', '*', '', '','galleryid','',$conditionarray);
        }

        $this->load->view('gallery', $this->data);
    }

}
