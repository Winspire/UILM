<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['testimonial'] = $this->common->get_all_record('testimonials');
        $this->load->view('testimonial/index', $this->data);
    }

    public function add() {
        $this->data['clientname'] = '';
        $this->data['clientprofession'] = '';
        $this->data['testimonialtext'] = '';
        $this->data['formurl'] = 'testimonial/add';
        $this->data['formtitle'] = 'Add Testimonial';
        if ($this->input->post()) {
            $this->data['clientname'] = $this->input->post('clientname');
            $this->data['clientprofession'] = $this->input->post('clientprofession');
            $this->data['testimonialtext'] = $this->input->post('testimonialtext');
            $this->form_validation->set_rules('clientname', 'Clientname', 'trim|required');
            $this->form_validation->set_rules('testimonialtext', 'Testimonialtext', 'trim|required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('testimonial/addedit', $this->data);
            } else {
                 $imageerror = false;
                    $imagethumberror = false;
                    $filename='';
                if ($_FILES['image']['error'] == 0) {
                    $config['upload_path'] = $this->config->item('testimonial_main_image');
                    $config['allowed_types'] = 'jpg|png';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $this->load->library('upload', $config);
                    $imageerror = true;
                    $imagethumberror = true;
                    $filename='';
                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                        $filename = '';
                        $imageerror = false;
                    } else {
                        $filename = $this->upload->file_name;
                        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                        $config['new_image'] = $this->config->item('testimonial_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('testimonial_thumb_image');
                        $config['maintain_ratio'] = true;
                        $config['width'] = 40;
                        $config['height'] = 40;

                        $this->load->library('image_lib', $config);

                        if (!$this->image_lib->resize()) {
                            $this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
                            echo $this->upload->display_errors();
                            $imagethumberror = false;
                        }
                    }
                }  
                    $data = array(
                        'clientname' => $this->data['clientname'],       
                        'clientprofession' => $this->data['clientprofession'],       
                        'testimonialtext' => $this->data['testimonialtext'],
                        'insertip' => $_SERVER['REMOTE_ADDR'],
                        'insertdatetime' => date('Y-m-d h:i:s'),
                        'clientimage' => $filename,
                    );
                    
                    if ($this->common->insert_data($data, 'testimonials')) {
                        $this->session->set_flashdata('success','Record has been inserted successfully.');
                        redirect('testimonial', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting records.Please try again!');
                        $this->load->view('testimonial/addedit', $this->data);
                    }
                
            }
        } else {
            $this->load->view('testimonial/addedit', $this->data);
        }
    }

    public function edit($id) {
        $testimonialid = base64_decode($id);
        $testimonial = $this->common->select_database_id('testimonials', 'testimonialid', $testimonialid);
        if (count($testimonial) > 0) {
            $this->data['clientname'] = $testimonial[0]['clientname'];
            $this->data['clientprofession'] = $testimonial[0]['clientprofession'];
            $this->data['testimonialtext'] = $testimonial[0]['testimonialtext'];
            $this->data['formurl'] = 'testimonial/edit/' . $id;
            $this->data['formtitle'] = 'Edit Testimonial';
            if ($this->input->post()) {
                $this->data['clientname'] = $this->input->post('clientname');
                $this->data['clientprofession'] = $this->input->post('clientprofession');
                $this->data['testimonialtext'] = $this->input->post('testimonialtext');
                $this->form_validation->set_rules('clientname', 'Clientname', 'trim|required');
                $this->form_validation->set_rules('testimonialtext', 'Testimonialtext', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('testimonial/addedit', $this->data);
                } else {
                    $imageerror = true;
                    $imagethumberror = true;
                    if ($_FILES['image']['error'] == 0 && $_FILES['image']['name'] != '') {
                        $config['upload_path'] = $this->config->item('testimonial_main_image');
                        $config['allowed_types'] = 'jpg|png';
                        $config['overwrite'] = false;
                        $config['remove_spaces'] = true;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                            $filename = '';
                            $imageerror = false;
                        } else {
                            $filename = $this->upload->file_name;
                            $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                            $config['new_image'] = $this->config->item('testimonial_thumb_image') . $this->upload->file_name;
                            $config['upload_path'] = $this->config->item('testimonial_thumb_image');
                            $config['maintain_ratio'] = true;
                            $config['width'] = 40;
                            $config['height'] = 40;

                            $this->load->library('image_lib', $config);

                            if (!$this->image_lib->resize()) {
                                $this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
                                echo $this->upload->display_errors();
                                $imagethumberror = false;
                            }
                        }
                    }
                    if ($imagethumberror == true && $imageerror == true) {
                        if ($_FILES['image']['name'] == '') {
                            $data = array(
                                'clientname' => $this->data['clientname'],
                                'clientprofession' => $this->data['clientprofession'],      
                                'testimonialtext' => $this->data['testimonialtext'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        } else {
                            $data = array(
                                'clientname' => $this->data['clientname'],
                                'clientprofession' => $this->data['clientprofession'],      
                                'testimonialtext' => $this->data['testimonialtext'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                'clientimage' => $filename,
                            );
                        }
                        if ($this->common->update_data($data, 'testimonials', 'testimonialid', $testimonialid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('testimonial', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is a problem in updating records.Please try again!');
                            $this->load->view('testimonial/addedit', $this->data);
                        }
                    } else {
                        $this->load->view('testimonial/addedit', $this->data);
                    }
                }
            } else {
                $this->load->view('testimonial/addedit', $this->data);
            }
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('testimonial', 'refresh');
        }
    }
    
    public function delete($id) {
        $testimonialid = base64_decode($id);
        $testimonial = $this->common->select_database_id('testimonials', 'testimonialid', $testimonialid);
        if (count($testimonial) > 0) {
            $filename = $testimonial[0]['clientimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].'/kps/uploads/testimonial/main/'.$filename ;
            $thumb = $_SERVER['DOCUMENT_ROOT'].'/kps/uploads/testimonial/thumb/'.$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $result = $this->common->delete_data('testimonials', 'testimonialid', $testimonialid);
            if($result)
            {
                $this->session->set_flashdata('success','Records has been deleted successfully');
                redirect('testimonial', 'refresh');
            }else
            {
                $this->session->set_flashdata('error','There id problem in deleting records');
                redirect('testimonial', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error','Records not found with specific id');
            redirect('testimonial', 'refresh');
        }
    }

      public function status($type,$id)
    {
        $testimonialid = base64_decode($id);
        $testimonial = $this->common->select_database_id('testimonials', 'testimonialid', $testimonialid);
        if (count($testimonial) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
            $result = $this->common->update_data($result_data,$tablename='testimonials','testimonialid', $testimonialid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('testimonial', 'refresh');
            }
            else
            {
                 $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('testimonial', 'refresh');
            }
        }
    }
    
     public function view($id) {
        $testimonialid = base64_decode($id);
        $testimonial = $this->common->select_database_id('testimonials', 'testimonialid', $testimonialid);
        if (count($testimonial) > 0) {
            $this->data['clientname'] = $testimonial[0]['clientname'];
            $this->data['testimonialtext'] = $testimonial[0]['testimonialtext'];
            $this->data['clientimage'] = $testimonial[0]['clientimage'];
            $this->data['clientimage_path'] = $this->config->item('testimonial_thumb_image');
            $this->data['formurl'] = 'testimonial/view/' . $id;
            $this->data['formtitle'] = 'View Testimonial';
         
                $this->load->view('testimonial/view', $this->data);
            
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('testimonial', 'refresh');
        }
    }
   
    
}
