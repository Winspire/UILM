<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Aboutus extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        
        include ('include.php');

    }
    
    public function index()
    {

        $this->data['page_list'] = $this->common->select_database_id('pages','pageurl','aboutus','*');
        //print_r($this->data['page_list']);
        //exit();
        $this->load->view('page',$this->data);
    }
    
    

}
