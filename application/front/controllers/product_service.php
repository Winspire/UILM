<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class product_service extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        
        include ('include.php');
    }

    public function index() {
        
        $this->load->view('under-construction', $this->data);
    }
    
    public function workshop() {
        
        $this->load->view('under-construction/workshop', $this->data);
    }
    
    public function eagle() {
        
        $this->load->view('under-construction/eagle', $this->data);
    }
    
    public function business_coaching() {
        
        $this->load->view('under-construction/business_coaching', $this->data);
    }
    
    public function personal_coaching() {
        
        $this->load->view('under-construction/personal_coaching', $this->data);
    }
    
   

}
