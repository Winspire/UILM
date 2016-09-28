<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Banner extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['banners'] = $this->common->get_all_record('banners');
        $this->load->view('banner/index', $this->data);
    }

    public function add() {
//        print_r($this->data['staff_type']);die();
        $this->data['bannertitle'] = '';
        $this->data['formurl'] = 'banner/add';
        $this->data['formtitle'] = 'Add Banner';
        if ($this->input->post()) {
            $this->data['bannertitle'] = $this->input->post('bannertitle');
            $this->form_validation->set_rules('bannertitle', 'Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('banner/addedit', $this->data);
            } else {
                    $imagethumberror = false;
                    $imageerror = false;
                if ($_FILES['image']['error'] == 0) {
                    $config['upload_path'] = $this->config->item('banner_main_image');
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $this->load->library('upload', $config);
                    $imageerror = true;
                    $imagethumberror = true;
                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                        $filename = '';
                        $imageerror = false;
                    } 
                    else {
                        $imgdata = $this->upload->data();
                        $filename = $imgdata['file_name'];
                        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                        $config['new_image'] = $this->config->item('banner_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('banner_thumb_image');
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
                if ($imageerror == true) {
                    $data = array(
                        'bannertitle' => $this->data['bannertitle'],
                        'bannerimage' => $filename,
                    );
                    if ($this->common->insert_data($data, 'banners')) {
                        $this->session->set_flashdata('success','Record has been added successfully.');
                        redirect('banner', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting Record.');
                        $this->load->view('banner/addedit', $this->data);
                    }
                } else {
                    $this->load->view('banner/addedit', $this->data);
                }
            }
        } else {
            $this->load->view('banner/addedit', $this->data);
        }
    }

    public function edit($id) {
        $bannerid = base64_decode($id);
        $banner = $this->common->get_banner_data('banners', 'bannerid', $bannerid);
        if (count($banner) > 0) {
            $this->data['bannertitle'] = $banner[0]['bannertitle'];
            $this->data['formurl'] = 'banner/edit/' . $id;
            $this->data['formtitle'] = 'Edit Banner';
            
            if ($this->input->post()) {
            $this->data['bannertitle'] = $this->input->post('bannertitle');
            $this->form_validation->set_rules('bannertitle', 'Name', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('banner/addedit', $this->data);
                } else {
                    $imageerror = true;
                    $imagethumberror = true;
                    if ($_FILES['image']['error'] == 0 && $_FILES['image']['name'] != '') {
                        $config['upload_path'] = $this->config->item('banner_main_image');
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['overwrite'] = false;
                        $config['remove_spaces'] = true;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                            $filename = '';
                            $imageerror = false;
                        }
                        else {
                        $imgdata = $this->upload->data();
                        $filename = $imgdata['file_name'];
                        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                        $config['new_image'] = $this->config->item('banner_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('banner_thumb_image');
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
                        if ($_FILES['image']['name'] == '') {
                            $data = array(
                                'bannertitle' => $this->data['bannertitle'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        } else {
                            $data = array(
                                'bannertitle' => $this->data['bannertitle'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                'bannerimage' => $filename,
                            );
                        }
                        if ($this->common->update_data($data, 'banners', 'bannerid', $bannerid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('banner', 'refresh');
                        } else {
                            $this->load->view('banner/addedit', $this->data);
                            $this->session->set_flashdata('error','There is problem in updating Record.');
                        }
                    
                }
            } else {
                $this->load->view('banner/addedit', $this->data);
            }
        } else {
            redirect('banner', 'refresh');
        }
    }
    
 
       
    public function delete($id) {
        $bannerid = base64_decode($id);
        $banner = $this->common->select_database_id('banners', 'bannerid', $bannerid);
        if (count($banner) > 0) {
            $filename = $banner[0]['bannerimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].$this->config->item('banner_main_image').$filename ;
            $thumb = $_SERVER['DOCUMENT_ROOT'].$this->config->item('banner_thumb_image').$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $this->common->delete_data('banners', 'bannerid', $bannerid);
            $this->session->set_flashdata('success','Record has been deleted successfully.');
           redirect('banner', 'refresh');
        } else {
            $this->session->set_flashdata('error','Record not found with specific id.');
            redirect('banner', 'refresh');
        }
    }
    
    public function status($type,$id)
    {
        $bannerid = base64_decode($id);
        $banner = $this->common->select_database_id('banners', 'bannerid', $bannerid);
        if (count($banner) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
//            print_r($result_data);die();
            $result = $this->common->update_data($result_data,$tablename='banners','bannerid', $bannerid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('banner', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('banner', 'refresh');
            }
        }
    }
    

}
