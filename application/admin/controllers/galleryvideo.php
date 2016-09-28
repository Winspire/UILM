<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Galleryvideo extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['galleryvideos'] = $this->common->get_all_record('gallery');
        $this->load->view('galleryvideos/index', $this->data);
    }
    

    public function add() {
//        print_r($this->data['staff_type']);die();
        $this->data['galleryvideo'] = '';
        $this->data['formurl'] = 'galleryvideo/add';
        $this->data['formtitle'] = 'Add Banner';
        if ($this->input->post()) {
            $this->data['galleryvideo'] = $this->input->post('galleryvideo');
            $this->form_validation->set_rules('galleryvideo', 'Video URL', 'trim|required|valid_url_format|url_exists');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('galleryvideos/addedit', $this->data);
            } else {
                   
                
                    $data = array(
                        'galleryvideo' => $this->data['galleryvideo'],
                    );
                    if ($this->common->insert_data($data, 'gallery')) {
                        $this->session->set_flashdata('success','Record has been added successfully.');
                        redirect('galleryvideo', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting Record.');
                        $this->load->view('galleryvideos/addedit', $this->data);
                    }
                
            }
        } else {
            $this->load->view('galleryvideos/addedit', $this->data);
        }
    }
    
    

    public function edit($id) {
        
        $galleryid = base64_decode($id);
        
        $galleryvideo = $this->common->select_database_id('gallery', 'galleryid', $galleryid,'*');
        
        if (count($galleryvideo) > 0) {
            $this->data['galleryvideo'] = $galleryvideo[0]['galleryvideo'];
            $this->data['formurl'] = 'galleryvideo/edit/' . $id;
            $this->data['formtitle'] = 'Edit Gallery';
            
            if ($this->input->post()) {
            $this->data['galleryvideo'] = $this->input->post('galleryvideo');
            
            $this->form_validation->set_rules('galleryvideo', 'Name', 'trim|required|valid_url_format|url_exists');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('galleryvideos/addedit', $this->data);
                } else {
                    
                            $data = array(
                                'galleryvideo' => $this->data['galleryvideo'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                            );
                        
                        if ($this->common->update_data($data, 'gallery', 'galleryid', $galleryid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('galleryvideo', 'refresh');
                        } else {
                            $this->load->view('galleryvideos/addedit', $this->data);
                            $this->session->set_flashdata('error','There is problem in updating Record.');
                        }
                    
                }
            } else {
                $this->load->view('galleryvideos/addedit', $this->data);
            }
        } else {
            redirect('galleryvideo', 'refresh');
        }
    }
    
 
       
    public function delete($id) {
        $galleryid = base64_decode($id);
        $galleryvideo = $this->common->select_database_id('gallery', 'galleryid', $galleryid);
        if (count($galleryvideo) > 0) {
            
            $this->common->delete_data('gallery', 'galleryid', $galleryid);
            $this->session->set_flashdata('success','Record has been deleted successfully.');
           redirect('galleryvideo', 'refresh');
        } else {
            $this->session->set_flashdata('error','Record not found with specific id.');
            redirect('galleryvideo', 'refresh');
        }
    }
    
    public function status($type,$id)
    {
        $galleryid = base64_decode($id);
        $galleryvideo = $this->common->select_database_id('gallery', 'galleryid', $galleryid);
        if (count($galleryvideo) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
//            print_r($result_data);die();
            $result = $this->common->update_data($result_data,$tablename='gallery','galleryid', $galleryid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('galleryvideo', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('galleryvideo', 'refresh');
            }
        }
    }
    

}
