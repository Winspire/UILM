<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sem extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['sems'] = $this->common->get_all_record('sem');
        $this->load->view('sem/index', $this->data);
        
    }
    
    public function edit($id) {
        $semid= base64_decode($id);
        $semvalue=$this->common->select_database_id('sem','semid',$semid);
        
        if(count($semvalue)>0)
        {
            $this->data['semname']=$semvalue[0]['semname'];
            $this->data['semvalue']=$semvalue[0]['semvalue'];
            $this->data['semid']=$semvalue[0]['semid'];
        if ($this->input->post()) {
            $this->data['semvalue'] = $this->input->post('value');
            $this->form_validation->set_rules('value', 'Value', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('sem/edit', $this->data);
            } else {
                $data = array(
                                'semvalue' => $this->data['semvalue'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                if($this->common->update_data($data,'sem','semid',$this->data['semid']))
                {
                    $this->session->set_flashdata('success',$semvalue[0]['semname'].' updated successfully.');
                    redirect('sem', 'refresh');
                }
 else {$this->load->view('sem/edit', $this->data);}
                
            }
        } else {
            $this->load->view('sem/edit', $this->data);
        }
        }
        else {redirect('sem', 'refresh');}
    }

    

}
