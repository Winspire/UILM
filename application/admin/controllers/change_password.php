<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Change_password extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['formurl'] = 'change_password/edit';
        $this->data['formtitle'] = 'Change Password';
        $this->load->view('change_password/index', $this->data);
    }

    public function edit() {

        $adm = $this->common->select_database_id('admin', 'adminid', 1);

            $this->data['new_password'] = '';
            $old_password = $adm[0]['adminpassword'];
            
            $this->data['formurl'] = 'change_password/edit/';
            $this->data['formtitle'] = 'Edit Page';
            if ($this->input->post()  && $adm[0]['adminpassword'] == md5($this->input->post('old_password'))) {

                $this->data['new_password'] = $this->input->post('new_password');
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('new_password', 'New Password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[new_password]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('change_password/index', $this->data);
                } else {
                            $data = array(
                                'adminpassword' => md5($this->data['new_password']),
                                
                            );
                  
                        if ($this->common->update_data($data, 'admin', 'adminid', 1)) {
                            $this->session->set_flashdata('success','Password has been updated successfully.');
                            redirect('dashboard', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is a problem in updating Password.Please try again!');
                            $this->load->view('change_password/edit', $this->data);
                        }
                   
                }
            } else {
                $this->session->set_flashdata('error','There is a problem in updating Password.Please try again!');
                redirect('change_password', 'refresh');
                $this->load->view('change_password', $this->data);
            }
            
        
    }
 
    
    
   
    
}
