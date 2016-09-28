<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['settings'] = $this->common->get_all_record('setting');
        $this->load->view('setting/index', $this->data);
        
    }
    
    public function edit($id) {
        $settingid= base64_decode($id);
        $settingvalue=$this->common->select_database_id('setting','settingid',$settingid);
        
        if(count($settingvalue)>0)
        {
            $this->data['settingname']=$settingvalue[0]['settingname'];
            $this->data['settingvalue']=$settingvalue[0]['settingvalue'];
            $this->data['settingid']=$settingvalue[0]['settingid'];
        if ($this->input->post()) {
            $this->data['settingvalue'] = $this->input->post('value');
            $this->form_validation->set_rules('value', 'Value', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('setting/edit', $this->data);
            } else {
                $data = array(
                                'settingvalue' => $this->data['settingvalue'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                if($this->common->update_data($data,'setting','settingid',$this->data['settingid']))
                {
                    $this->session->set_flashdata('success',$this->data['settingname'].' updated successfully');
                    redirect('setting', 'refresh');
                    
                }
 else {$this->load->view('setting/edit', $this->data);}
                
            }
        } else {
            $this->load->view('setting/edit', $this->data);
        }
        }
        else {
            $this->session->set_flashdata('error','There id problem in updating '.$this->data['settingname']);
            redirect('setting', 'refresh');
            
        }
    }

    

}
