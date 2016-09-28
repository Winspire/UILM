<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Galleryimage extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['gallerys'] = $this->common->get_all_record('gallery');
        $this->load->view('galleryimages/index', $this->data);
    }

    public function add() {
//        print_r($this->data['staff_type']);die();

        $this->data['formurl'] = 'galleryimage/add';
        $this->data['formtitle'] = 'Add Gallery Image';
        if ($this->input->post()) {

           
                    $imagethumberror = false;
                    $imageerror = false;
                    
                    
                if ($_FILES['image']['error'] == 0) {
                    $config['upload_path'] = $this->config->item('gallery_main_image');
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
                        $config['new_image'] = $this->config->item('gallery_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('gallery_thumb_image');
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
                        'galleryimage' => $filename,
                    );
                    $gallery=$this->common->insert_data($data, 'gallery');
                    
                    if ($gallery) {
                        $this->session->set_flashdata('success','Record has been added successfully.');
                        redirect('gallery', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting Record.');
                        $this->load->view('galleryimages/addedit', $this->data);
                    }
                } else {
                    $this->load->view('galleryimages/addedit', $this->data);
                }
            
        } else {
            $this->load->view('galleryimages/addedit', $this->data);
        }
    }

    public function edit($id) {
        $galleryid = base64_decode($id); 
        
        $gallery = $this->common->get_banner_data('gallery', 'galleryid', $galleryid);
        if (count($gallery) > 0) {

            $this->data['formurl'] = 'galleryimage/edit/' . $id;
            $this->data['formtitle'] = 'Edit Gallery';
            
            if ($this->input->post()) {
                
               
                    $imageerror = true;
                    $imagethumberror = true;
                    if ($_FILES['image']['name'] != '') {
                        $config['upload_path'] = $this->config->item('gallery_main_image');
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
                        $config['new_image'] = $this->config->item('gallery_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('gallery_thumb_image');
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
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        } else {
                            $data = array(
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                'galleryimage' => $filename,
                            );
                        }
                        if ($this->common->update_data($data, 'gallery', 'galleryid', $galleryid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('galleryimage', 'refresh');
                        } else {
                            $this->load->view('galleryimages/addedit', $this->data);
                            $this->session->set_flashdata('error','There is problem in updating Record.');
                        }
                    
                
            } else {
                $this->load->view('galleryimages/addedit', $this->data);
            }
        } else {
            redirect('galleryimage', 'refresh');
        }
    }
    
 
       
    public function delete($id) {
        $galleryid = base64_decode($id);
        $gallery = $this->common->select_database_id('gallery', 'galleryid', $galleryid);
        if (count($gallery) > 0) {
            $filename = $gallery[0]['galleryimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].$this->config->item('gallery_main_image').$filename ;
            $thumb = $_SERVER['DOCUMENT_ROOT'].$this->config->item('gallery_thumb_image').$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $this->common->delete_data('gallery', 'galleryid', $galleryid);
            $this->session->set_flashdata('success','Record has been deleted successfully.');
           redirect('galleryimage', 'refresh');
        } else {
            $this->session->set_flashdata('error','Record not found with specific id.');
            redirect('galleryimage', 'refresh');
        }
    }
    
    public function status($type,$id)
    {
        $galleryid = base64_decode($id);
        $gallery = $this->common->select_database_id('gallery', 'galleryid', $galleryid);
        if (count($gallery) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
//            print_r($result_data);die();
            $result = $this->common->update_data($result_data,$tablename='gallery','galleryid', $galleryid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('galleryimage', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('galleryimage', 'refresh');
            }
        }
    }
    

}
