<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Gallerybrochure extends CI_Controller {

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
        $this->load->view('gallerybrochure/index', $this->data);
    }

    public function add() {
//        print_r($this->data['staff_type']);die();

        $this->data['formurl'] = 'gallerybrochure/add';
        $this->data['formtitle'] = 'Add Brochure';
        if ($this->input->post()) {

           
                    $fileerror = true;
                    $filethumberror = true;
                    if ($_FILES['pdffile']['name'] != '') {
                        $config['upload_path'] = $this->config->item('brochure_main');
                        $config['allowed_types'] = 'pdf';
                        $config['overwrite'] = false;
                        $config['remove_spaces'] = true;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('pdffile')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                            $filename = '';
                            $fileerror = false;
                        }
                        else {
                        $filedata = $this->upload->data();
                        $filename = $filedata['file_name'];
                    }
                        
                    }
                             
//Brochur Images       
                
                if (!empty($_FILES['images']['name'])) {
                    $count=count($_FILES['images']['size']);
                    foreach($_FILES as $key=>$value)
                    for($s=0; $s<=$count-1; $s++) {
                    $_FILES['images']['name']=$value['name'][$s];
                    $_FILES['images']['type']    = $value['type'][$s];
                    $_FILES['images']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['images']['error']       = $value['error'][$s];
                    $_FILES['images']['size']    = $value['size'][$s];  
                        $config['upload_path'] = $this->config->item('gallery_main_image');
                        $config['allowed_types'] = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                        if ($this->upload->do_upload($key)) {
                            $data = $this->upload->data();
                            $image_array[] = $data['file_name'];
                            $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                            $config['new_image'] = $this->config->item('gallery_thumb_image') . $this->upload->file_name;
                            $config['upload_path'] = $this->config->item('gallery_thumb_image');

                        }
                    }
                                        
                }
                
                $imagesname= implode(',', $image_array);
                if($_FILES['images']['name']=="")
                {
                    $imagesname="";
                }
                
                
                    if($_FILES['images']['name'] == '')
                        {
                            $data = array(
                                'gallerybrochure' => $filename,
                                );
                            
                        }
                        elseif ($_FILES['pdffile']['name'] == '') 
                        {
                            $data = array(
                                'brochure_images' => $imagesname,
                                );
                        }
                    $gallery=$this->common->insert_data($data, 'gallery');
                    
                    if ($gallery) {
                        $this->session->set_flashdata('success','Record has been added successfully.');
                        redirect('gallerybrochure', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting Record.');
                        $this->load->view('gallerybrochure/addedit', $this->data);
                    }
                
            
        } else {
            $this->load->view('gallerybrochure/addedit', $this->data);
        }
    }

    public function edit($id) {
        $galleryid = base64_decode($id); 
        $gallery = $this->common->get_banner_data('gallery', 'galleryid', $galleryid);
        //print_r($gallery);
        //exit();
        if (count($gallery) > 0) {

            $this->data['formurl'] = 'gallerybrochure/edit/' . $id;
            $this->data['formtitle'] = 'Edit Brochure';
            
            if ($this->input->post()) {
                
                
               
                    $fileerror = true;
                    $filethumberror = true;
                    if ($_FILES['pdffile']['name'] != '') {
                        $config['upload_path'] = $this->config->item('brochure_main');
                        $config['allowed_types'] = 'pdf';
                        $config['overwrite'] = false;
                        $config['remove_spaces'] = true;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('pdffile')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                            $filename = '';
                            $fileerror = false;
                        }
                        else {
                        $filedata = $this->upload->data();
                        $filename = $filedata['file_name'];
                    }
                        
                    }
                             
//Brochur Images       
                
                if (!empty($_FILES['images']['name'])) {
                    $count=count($_FILES['images']['size']);
                    foreach($_FILES as $key=>$value)
                    for($s=0; $s<=$count-1; $s++) {
                    $_FILES['images']['name']=$value['name'][$s];
                    $_FILES['images']['type']    = $value['type'][$s];
                    $_FILES['images']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['images']['error']       = $value['error'][$s];
                    $_FILES['images']['size']    = $value['size'][$s];  
                        $config['upload_path'] = $this->config->item('gallery_main_image');
                        $config['allowed_types'] = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                        if ($this->upload->do_upload($key)) {
                            $data = $this->upload->data();
                            $image_array[] = $data['file_name'];
                            $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                            $config['new_image'] = $this->config->item('gallery_thumb_image') . $this->upload->file_name;
                            $config['upload_path'] = $this->config->item('gallery_thumb_image');

                        }
                    }
                                        
                }
                
                $imagesname= implode(',', $image_array);
                if($_FILES['images']['name']=="")
                {
                    $imagesname="";
                }

                        if ($_FILES['pdffile']['name'] == '' && $_FILES['images']['name'] == '') {
                            $data = array(
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        }
                        elseif($_FILES['pdffile']['name'] == '')
                        {
                            $data = array(
                                'brochure_images' => $imagesname,
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                );
                            
                        }
                        elseif ($_FILES['images']['name'] == '') 
                        {
                            $data = array(
                                'gallerybrochure' => $filename,
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                );
                        }
                        
                        
                        
                        if ($this->common->update_data($data, 'gallery', 'galleryid', $galleryid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('gallerybrochure', 'refresh');
                        } else {
                            $this->load->view('gallerybrochure/addedit', $this->data);
                            $this->session->set_flashdata('error','There is problem in updating Record.');
                        }
                    
                
            } else {
                $this->load->view('gallerybrochure/addedit', $this->data);
            }
        } else {
            redirect('gallerybrochure', 'refresh');
        }
    }
    
 
       
    public function delete($id) {
        $galleryid = base64_decode($id);
        $gallery = $this->common->select_database_id('gallery', 'galleryid', $galleryid);
        if (count($gallery) > 0) {
            $filename = $gallery[0]['galleryimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].$this->config->item('brochure_main').$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $this->common->delete_data('gallery', 'galleryid', $galleryid);
            $this->session->set_flashdata('success','Record has been deleted successfully.');
           redirect('gallerybrochure', 'refresh');
        } else {
            $this->session->set_flashdata('error','Record not found with specific id.');
            redirect('gallerybrochure', 'refresh');
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
                redirect('gallerybrochure', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('gallerybrochure', 'refresh');
            }
        }
    }
    

}
