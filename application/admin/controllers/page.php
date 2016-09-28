<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Page extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['pages'] = $this->common->get_all_record('pages');
        $this->load->view('page/index', $this->data);
    }

    public function add() {
        $this->data['pagetitle'] = '';
        $this->data['pagemetakeyword'] = '';
        $this->data['pagemetadescription'] = '';
        $this->data['pageshortdescription'] = '';
        $this->data['pagedescription'] = '';
        $this->data['formurl'] = 'page/add';
        $this->data['formtitle'] = 'Add Page';
        if ($this->input->post()) {
            $this->data['pagetitle'] = $this->input->post('title');
            $this->data['pagemetakeyword'] = $this->input->post('metakeyword');
            $this->data['pagemetadescription'] = $this->input->post('metadescription');
            $this->data['pageshortdescription'] = $this->input->post('shortdescription');
            $this->data['pagedescription'] = $this->input->post('description',TRUE);
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
            $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
            $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('page/addedit', $this->data);
            } else {
                
                    $pageurl = $this->common->create_unique_url($data = $this->data['pagetitle'],$table='pages',$field='pageurl',$key=NULL,$value=NULL);
                    $data = array(
                        'pagetitle' => $this->data['pagetitle'],
                        'pageurl' => $pageurl,
                        'pagemetakeyword' => $this->data['pagemetakeyword'],
                        'pagemetadescription' => $this->data['pagemetadescription'],
                        'pageshortdescription' => $this->data['pageshortdescription'],
                        'pagedescription' => $this->data['pagedescription'],
                        'insertip' => $_SERVER['REMOTE_ADDR'],
                        'insertdatetime' => date('Y-m-d h:i:s'),
                    );
                    
                    if ($this->common->insert_data($data, 'pages')) {
                        $this->session->set_flashdata('success','Record has been inserted successfully.');
                        redirect('page', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting records.Please try again!');
                        $this->load->view('page/addedit', $this->data);
                    }
               
            }
        } else {
            $this->load->view('page/addedit', $this->data);
        }
    }

    public function edit($id) {
        $pageid = base64_decode($id);
        $page = $this->common->select_database_id('pages', 'pageid', $pageid);
        if (count($page) > 0) {
            $this->data['pagetitle'] = $page[0]['pagetitle'];
            $this->data['pagemetakeyword'] = $page[0]['pagemetakeyword'];
            $this->data['pagemetadescription'] = $page[0]['pagemetadescription'];
            $this->data['pageshortdescription'] = $page[0]['pageshortdescription'];
            $this->data['pagedescription'] = $page[0]['pagedescription'];
            $this->data['formurl'] = 'page/edit/' . $id;
            $this->data['formtitle'] = 'Edit Page';
            if ($this->input->post()) {
                $this->data['pagetitle'] = $this->input->post('title');
                $this->data['pagemetakeyword'] = $this->input->post('metakeyword');
                $this->data['pagemetadescription'] = $this->input->post('metadescription');
                $this->data['pageshortdescription'] = $this->input->post('shortdescription');
                $this->data['pagedescription'] = $this->input->post('description');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
                $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
                $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('page/addedit', $this->data);
                } else {
                            $data = array(
                                'pagetitle' => $this->data['pagetitle'],
                                'pagemetakeyword' => $this->data['pagemetakeyword'],
                                'pagemetadescription' => $this->data['pagemetadescription'],
                                'pageshortdescription' => $this->data['pageshortdescription'],
                                'pagedescription' => $this->data['pagedescription'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        
                        if ($this->common->update_data($data, 'pages', 'pageid', $pageid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('page', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is a problem in updating records.Please try again!');
                            $this->load->view('page/addedit', $this->data);
                        }
                   
                }
            } else {
                $this->load->view('page/addedit', $this->data);
            }
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('page', 'refresh');
        }
    }
    

    
     public function view($id) {
        $pageid = base64_decode($id);
        $page = $this->common->select_database_id('pages', 'pageid', $pageid);
//        echo "<pre>";print_r($page);die();
        if (count($page) > 0) {
            $this->data['pagetitle'] = $page[0]['pagetitle'];
            $this->data['pageurl'] = $page[0]['pageurl'];
            $this->data['pagemetakeyword'] = $page[0]['pagemetakeyword'];
            $this->data['pagemetadescription'] = $page[0]['pagemetadescription'];
            $this->data['pageshortdescription'] = $page[0]['pageshortdescription'];
            $this->data['pagedescription'] = $page[0]['pagedescription'];
             $this->data['formurl'] = 'page/view/' . $id;
            $this->data['formtitle'] = 'View Page';
         
                $this->load->view('page/view', $this->data);
            
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('page', 'refresh');
        }
    }
   
    
}
