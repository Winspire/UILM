<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['admins'] = $this->common->get_all_record('admins');
        $this->load->view('admin/index', $this->data);
    }


    public function edit($id) {
        $adminid = base64_decode($id);
        $admin = $this->common->select_database_id('admin', 'adminid', $adminid);
//        echo "<pre>";print_r($admin);die();
        
        if (count($admin) > 0) {
            $this->data['adminname'] = $admin[0]['adminname'];
            $this->data['adminemail'] = $admin[0]['adminemail'];
            $this->data['adminrole'] = $admin[0]['adminrole'];
            $this->data['formurl'] = 'admin/edit/' . $id;
            $this->data['formtitle'] = 'Edit Admin';
            
            if ($this->input->post()) {
            $this->data['adminname'] = $this->input->post('name');
            $this->data['adminemail'] = $this->input->post('email');
            $this->data['adminrole'] = $this->input->post('adminrole');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('dashboard', $this->data);
                } else {
                  
                            $data = array(
                                'adminname' => $this->data['adminname'],
                                'adminemail' => $this->data['adminemail'],
                                'adminrole' => $this->data['adminrole'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        
                        if ($this->common->update_data($data, 'admin', 'adminid', $adminid)) {
                            $adminsession = array(
                                'id' => $adminid,
                                'name' => $this->data['adminname']
                            );
                            $this->session->set_userdata('ulim_admin', $adminsession);
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('dashboard', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is problem in updating Record.');
                            $this->load->view('admin/edit', $this->data);
                        }
                    
                }
            } else {
                $this->load->view('admin/addedit', $this->data);
            }
        } else {
            redirect('dashboard', 'refresh');
        }
    }
    
      public function changepassword($id) {
        $adminid = base64_decode($id);
        $admin = $this->common->select_database_id('admin', 'adminid', $adminid);
//        echo "<pre>";print_r($admin);die();
        
        if (count($admin) > 0) {
            $this->data['adminpassword'] = $admin[0]['adminpassword'];
            $this->data['formurl'] = 'admin/changepassword/' . $id;
            $this->data['formtitle'] = 'Change Password';
            
            if ($this->input->post()) {
            $this->data['adminpassword'] = $this->input->post('adminpassword');
            $this->data['new_adminpassword'] = $this->input->post('new_adminpassword');
            $this->data['re_adminpassword'] = $this->input->post('re_adminpassword');
            $this->form_validation->set_rules('adminpassword', 'Name', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/changepassword/'.$id, $this->data);
                } else {
                            if($admin[0]['adminpassword']=== md5($this->data['adminpassword']))
                            { 
                                if($this->data['new_adminpassword'] == $this->data['re_adminpassword'])
                                {
                                    $data = array(
                                        'adminpassword' => md5($this->data['new_adminpassword']),
                                        'editip' => $_SERVER['REMOTE_ADDR'],
                                        'editdatetime' => date('Y-m-d h:i:s'),
                                    );

                                    if ($this->common->update_data($data, 'admin', 'adminid', $adminid)) {
                                        $this->session->set_flashdata('success','Password changed successfully.');
                                        redirect('dashboard', 'refresh');
                                    } else {
                                        $this->session->set_flashdata('error','There is problem in changing password.');
                                        $this->load->view('admin/changepassword', $this->data);
                                    }
                                } else {
                                        $this->session->set_flashdata('error','new password and re-password must be same.');
                                        $this->load->view('admin/changepassword', $this->data);
                                    }
                             } else { //echo "hiw";die();
                                    $this->session->set_flashdata('error','Old Password does not match.');
                                    $this->load->view('admin/changepassword', $this->data);
                                }
                    
                }
            } else {
                $this->load->view('admin/changepassword', $this->data);
            }
        } else {
            redirect('dashboard', 'refresh');
        }
    }
   
       

}
