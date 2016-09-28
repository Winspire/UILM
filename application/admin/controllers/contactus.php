<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Contactus extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        
        $this->data['contactus'] = $this->common->get_all_record('contactus');
        $this->load->view('contactus/index', $this->data);
    }

    public function change_status_accepted() {
        if ($this->input->post('unique_id')) {
            $id = $this->input->post('unique_id');
            $accepted_status = $this->input->post('accepted_status');
            
                           
                $update_data = array('status' => $accepted_status);
                $update_result = $this->common->update_data($update_data, 'contactus', 'id', $id);
                                
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $this->session->set_flashdata('success', 'Status successfully changed.');
                    redirect($_SERVER['HTTP_REFERER'], 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Status successfully changed.');
                redirect(site_url() . 'contactus', 'refresh');
                }
            
                if ($update_result) {
                    $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                    redirect($_SERVER['HTTP_REFERER'], 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                    redirect(site_url() . 'contactus', 'refresh');
                }
            
        }
        
    }
   
    
}
