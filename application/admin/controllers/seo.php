<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['seos'] = $this->common->get_all_record('seo');
        $this->load->view('seo/index', $this->data);
        
    }
    
    public function edit($id) {
        $seoid= base64_decode($id);
        $seovalue=$this->common->select_database_id('seo','seoid',$seoid);
        
        if(count($seovalue)>0)
        {
            $this->data['seoname']=$seovalue[0]['seoname'];
            $this->data['seovalue']=$seovalue[0]['seovalue'];
            $this->data['seoid']=$seovalue[0]['seoid'];
        if ($this->input->post()) {
            $this->data['seovalue'] = $this->input->post('value');
            $this->form_validation->set_rules('value', 'Value', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('seo/edit', $this->data);
            } else {
                $data = array(
                                'seovalue' => $this->data['seovalue'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                if($this->common->update_data($data,'seo','seoid',$this->data['seoid']))
                {
                    $this->session->set_flashdata('success',$seovalue[0]['seoname'].' has been updated successfully.');
                    redirect('seo', 'refresh');
                }
 else {$this->load->view('seo/edit', $this->data);}
                
            }
        } else {
            $this->load->view('seo/edit', $this->data);
        }
        }
        else {redirect('seo', 'refresh');}
    } 

    

}
