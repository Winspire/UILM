<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Mentor_1 extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        
        include ('include.php');

    }
    
    public function index()
    {

        $this->data['page_list'] = $this->common->select_database_id('pages','pageurl','mentor_1','*');
        //print_r($this->data['page_list']);
        //exit();
        $this->load->view('page',$this->data);
    }
    
    

}
