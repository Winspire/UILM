<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Service extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['services'] = $this->common->get_all_record('services');
        $this->load->view('service/index', $this->data);
    }

    public function add() {
        $this->data['servicetitle'] = '';
        $this->data['servicemetakeyword'] = '';
        $this->data['servicemetadescription'] = '';
        $this->data['serviceshortdescription'] = '';
        $this->data['servicedescription'] = '';
        $this->data['formurl'] = 'service/add';
        $this->data['formtitle'] = 'Add Service';
        if ($this->input->post()) {
            $this->data['servicetitle'] = $this->input->post('title');
            $this->data['servicemetakeyword'] = $this->input->post('metakeyword');
            $this->data['servicemetadescription'] = $this->input->post('metadescription');
            $this->data['serviceshortdescription'] = $this->input->post('shortdescription');
            $this->data['servicedescription'] = $this->input->post('description');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
            $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
            $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('service/addedit', $this->data);
            } else {
                 $imageerror = false;
                    $imagethumberror = false;
                if ($_FILES['image']['error'] == 0) {
                    $config['upload_path'] = $this->config->item('service_main_image');
                    $config['allowed_types'] = 'jpg|png';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $this->load->library('upload', $config);
                    $imageerror = true;
                    $imagethumberror = true;
                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                        $filename = '';
                        $imageerror = false;
                    } else {
                        $filename = $this->upload->file_name;
                        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                        $config['new_image'] = $this->config->item('service_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('service_thumb_image');
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
                    $serviceurl = $this->common->create_unique_url($data = $this->data['servicetitle'],$table='services',$field='serviceurl',$key=NULL,$value=NULL);
                    $data = array(
                        'servicetitle' => $this->data['servicetitle'],
                        'serviceurl' => $serviceurl,
                        'servicemetakeyword' => $this->data['servicemetakeyword'],
                        'servicemetadescription' => $this->data['servicemetadescription'],
                        'serviceshortdescription' => $this->data['serviceshortdescription'],
                        'servicedescription' => $this->data['servicedescription'],
                        'insertip' => $_SERVER['REMOTE_ADDR'],
                        'insertdatetime' => date('Y-m-d h:i:s'),
                        'serviceimage' => $filename,
                    );
                    
                    if ($this->common->insert_data($data, 'services')) {
                        $this->session->set_flashdata('success','Record has been inserted successfully.');
                        redirect('service', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting records.Please try again!');
                        $this->load->view('service/addedit', $this->data);
                    }
                } else {
                    $this->load->view('service/addedit', $this->data);
                }
            }
        } else {
            $this->load->view('service/addedit', $this->data);
        }
    }

    public function edit($id) {
        $serviceid = base64_decode($id);
        $service = $this->common->select_database_id('services', 'serviceid', $serviceid);
        if (count($service) > 0) {
            $this->data['servicetitle'] = $service[0]['servicetitle'];
            $this->data['servicemetakeyword'] = $service[0]['servicemetakeyword'];
            $this->data['servicemetadescription'] = $service[0]['servicemetadescription'];
            $this->data['serviceshortdescription'] = $service[0]['serviceshortdescription'];
            $this->data['servicedescription'] = $service[0]['servicedescription'];
            $this->data['formurl'] = 'service/edit/' . $id;
            $this->data['formtitle'] = 'Edit Service';
            if ($this->input->post()) {
                $this->data['servicetitle'] = $this->input->post('title');
                $this->data['servicemetakeyword'] = $this->input->post('metakeyword');
                $this->data['servicemetadescription'] = $this->input->post('metadescription');
                $this->data['serviceshortdescription'] = $this->input->post('shortdescription');
                $this->data['servicedescription'] = $this->input->post('description');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
                $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
                $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('service/addedit', $this->data);
                } else {
                    $imageerror = true;
                    $imagethumberror = true;
                    if ($_FILES['image']['error'] == 0 && $_FILES['image']['name'] != '') {
                        $config['upload_path'] = $this->config->item('service_main_image');
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
                            $config['new_image'] = $this->config->item('service_thumb_image') . $this->upload->file_name;
                            $config['upload_path'] = $this->config->item('service_thumb_image');
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
                                'servicetitle' => $this->data['servicetitle'],
                                'servicemetakeyword' => $this->data['servicemetakeyword'],
                                'servicemetadescription' => $this->data['servicemetadescription'],
                                'serviceshortdescription' => $this->data['serviceshortdescription'],
                                'servicedescription' => $this->data['servicedescription'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        } else {
                            $data = array(
                                'servicetitle' => $this->data['servicetitle'],
                                'servicemetakeyword' => $this->data['servicemetakeyword'],
                                'servicemetadescription' => $this->data['servicemetadescription'],
                                'serviceshortdescription' => $this->data['serviceshortdescription'],
                                'servicedescription' => $this->data['servicedescription'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                'serviceimage' => $filename,
                            );
                        }
                        if ($this->common->update_data($data, 'services', 'serviceid', $serviceid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('service', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is a problem in updating records.Please try again!');
                            $this->load->view('service/addedit', $this->data);
                        }
                    } else {
                        $this->load->view('service/addedit', $this->data);
                    }
                }
            } else {
                $this->load->view('service/addedit', $this->data);
            }
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('service', 'refresh');
        }
    }
    
    public function delete($id) {
        $serviceid = base64_decode($id);
        $service = $this->common->select_database_id('services', 'serviceid', $serviceid);
        if (count($service) > 0) {
            $filename = $service[0]['serviceimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].'/kvpci/uploads/services/main/'.$filename ;
            $thumb = $_SERVER['DOCUMENT_ROOT'].'/kvpci/uploads/services/thumb/'.$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $result = $this->common->delete_data('services', 'serviceid', $serviceid);
            if($result)
            {
                $this->session->set_flashdata('success','Records has been deleted successfully');
                redirect('service', 'refresh');
            }else
            {
                $this->session->set_flashdata('error','There id problem in deleting records');
                redirect('service', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error','Records not found with specific id');
            redirect('service', 'refresh');
        }
    }

      public function status($type,$id)
    {
        $serviceid = base64_decode($id);
        $service = $this->common->select_database_id('services', 'serviceid', $serviceid);
        if (count($service) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
            $result = $this->common->update_data($result_data,$tablename='services','serviceid', $serviceid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('service', 'refresh');
            }
            else
            {
                 $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('service', 'refresh');
            }
        }
    }
    
     public function view($id) {
        $serviceid = base64_decode($id);
        $service = $this->common->select_database_id('services', 'serviceid', $serviceid);
//        echo "<pre>";print_r($service);die();
        if (count($service) > 0) {
            $this->data['servicetitle'] = $service[0]['servicetitle'];
            $this->data['servicemetakeyword'] = $service[0]['servicemetakeyword'];
            $this->data['servicemetadescription'] = $service[0]['servicemetadescription'];
            $this->data['serviceshortdescription'] = $service[0]['serviceshortdescription'];
            $this->data['servicedescription'] = $service[0]['servicedescription'];
            $this->data['serviceimage'] = $service[0]['serviceimage'];
            $this->data['serviceimage_path'] = $this->config->item('service_thumb_image');
            $this->data['formurl'] = 'service/view/' . $id;
            $this->data['formtitle'] = 'View Service';
         
                $this->load->view('service/view', $this->data);
            
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('service', 'refresh');
        }
    }
   
    
}
