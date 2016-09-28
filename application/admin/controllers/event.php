<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Event extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('ulim_admin')) {
            redirect('login', 'refresh');
        }
        include ('include.php');
    }

    public function index() {
        $this->data['events'] = $this->common->get_all_record('events');
        $this->load->view('event/index', $this->data);
    }

    public function add() {
        $this->data['eventtitle'] = '';
        $this->data['eventmetakeyword'] = '';
        $this->data['eventmetadescription'] = '';
        $this->data['eventshortdescription'] = '';
        $this->data['eventdescription'] = '';
        $this->data['eventlocation'] = '';
        $this->data['formurl'] = 'event/add';
        $this->data['formtitle'] = 'Add Seminar Info';
        if ($this->input->post()) {
            $this->data['eventtitle'] = $this->input->post('title');
            $this->data['eventmetakeyword'] = $this->input->post('metakeyword');
            $this->data['eventmetadescription'] = $this->input->post('metadescription');
            $this->data['eventshortdescription'] = $this->input->post('shortdescription');
            $this->data['eventdescription'] = $this->input->post('description');
            $this->data['eventtime'] = $this->input->post('eventtime');
            $this->data['eventstarttime'] = (date('Y-m-d H:i:s',(strtotime(substr($this->data['eventtime'],0,19)))));
            $this->data['eventendtime'] = (date('Y-m-d H:i:s',(strtotime(substr($this->data['eventtime'],21)))));
            $this->data['eventlocation'] = $this->input->post('location');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
            $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
            $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/addedit', $this->data);
            } else {
                 $imageerror = false;
                    $imagethumberror = false;
                if ($_FILES['image']['error'] == 0) {
                    $config['upload_path'] = $this->config->item('event_main_image');
                    $config['allowed_types'] = 'jpg|png';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $this->load->library('upload', $config);
                    $imageerror = true;
                    $imagethumberror = true;
                    if (!$this->upload->do_upload('image')) {
                        echo $this->upload->display_errors();
                    die();
                        $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
                        $filename = '';
                        $imageerror = false;
                    } else {
                        $filename = $this->upload->file_name;
                        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                        $config['new_image'] = $this->config->item('event_thumb_image') . $this->upload->file_name;
                        $config['upload_path'] = $this->config->item('event_thumb_image');
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
                    $eventurl = $this->common->create_unique_url($data = $this->data['eventtitle'],$table='events',$field='eventurl',$key=NULL,$value=NULL);
                    $data = array(
                        'eventtitle' => $this->data['eventtitle'],
                        'eventurl' => $eventurl,
                        'eventmetakeyword' => $this->data['eventmetakeyword'],
                        'eventmetadescription' => $this->data['eventmetadescription'],
                        'eventshortdescription' => $this->data['eventshortdescription'],
                        'eventdescription' => $this->data['eventdescription'],
                        'eventstarttime' => $this->data['eventstarttime'],
                        'eventendtime' => $this->data['eventendtime'],
                        'eventlocation' => $this->data['eventlocation'],
                        'insertip' => $_SERVER['REMOTE_ADDR'],
                        'insertdatetime' => date('Y-m-d h:i:s'),
                        'eventimage' => $filename,
                    );
                   
                    
                    if ($this->common->insert_data($data, 'events')) {
                        $this->session->set_flashdata('success','Record has been inserted successfully.');
                        redirect('event', 'refresh');
                    } else {
                        $this->session->set_flashdata('error','There is a problem in inserting records.Please try again!');
                        $this->load->view('event/addedit', $this->data);
                    }
                } else {
                    $this->load->view('event/addedit', $this->data);
                }
            }
        } else {
            $this->load->view('event/addedit', $this->data);
        }
    }

    public function edit($id) {
        $eventid = base64_decode($id);
        $event = $this->common->select_database_id('events', 'eventid', $eventid);
        
        if (count($event) > 0) {
            $this->data['eventtitle'] = $event[0]['eventtitle'];
            $this->data['eventmetakeyword'] = $event[0]['eventmetakeyword'];
            $this->data['eventmetadescription'] = $event[0]['eventmetadescription'];
            $this->data['eventshortdescription'] = $event[0]['eventshortdescription'];
            $this->data['eventdescription'] = $event[0]['eventdescription'];
            $this->data['eventstarttime'] = $event[0]['eventstarttime'];
            $this->data['eventendtime'] = $event[0]['eventendtime'];
            $this->data['eventlocation'] = $event[0]['eventlocation'];
            $this->data['formurl'] = 'event/edit/' . $id;
            $this->data['formtitle'] = 'Edit Seminar Info';
            if ($this->input->post()) {
                $this->data['eventtitle'] = $this->input->post('title');
                $this->data['eventmetakeyword'] = $this->input->post('metakeyword');
                $this->data['eventmetadescription'] = $this->input->post('metadescription');
                $this->data['eventshortdescription'] = $this->input->post('shortdescription');
                $this->data['eventdescription'] = $this->input->post('description');
                $this->data['eventtime'] = $this->input->post('eventtime');
                $this->data['eventstarttime'] = (date('Y-m-d H:i:s',(strtotime(substr($this->data['eventtime'],0,19)))));
                $this->data['eventendtime'] = (date('Y-m-d H:i:s',(strtotime(substr($this->data['eventtime'],21)))));
                $this->data['eventlocation'] = $this->input->post('location');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('metakeyword', 'Meta Keyword', 'trim|required');
                $this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required');
                $this->form_validation->set_rules('shortdescription', 'Shortdescription', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('event/addedit', $this->data);
                } else {
                    $imageerror = true;
                    $imagethumberror = true;                    
                    if ($_FILES['image']['error'] == 0 && $_FILES['image']['name'] != '') {
                        $config['upload_path'] = $this->config->item('event_main_image');
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
                            $config['new_image'] = $this->config->item('event_thumb_image') . $this->upload->file_name;
                            $config['upload_path'] = $this->config->item('event_thumb_image');
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
                                'eventtitle' => $this->data['eventtitle'],
                                'eventmetakeyword' => $this->data['eventmetakeyword'],
                                'eventmetadescription' => $this->data['eventmetadescription'],
                                'eventshortdescription' => $this->data['eventshortdescription'],
                                'eventdescription' => $this->data['eventdescription'],
                                'eventstarttime' => $this->data['eventstarttime'],
                                'eventendtime' => $this->data['eventendtime'],
                                'eventlocation' => $this->data['eventlocation'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-m-d h:i:s'),
                            );
                        } else {
                            $data = array(
                                'eventtitle' => $this->data['eventtitle'],
                                'eventmetakeyword' => $this->data['eventmetakeyword'],
                                'eventmetadescription' => $this->data['eventmetadescription'],
                                'eventshortdescription' => $this->data['eventshortdescription'],
                                'eventdescription' => $this->data['eventdescription'],
                                'eventstarttime' => $this->data['eventstarttime'],
                                'eventendtime' => $this->data['eventendtime'],
                                'eventlocation' => $this->data['eventlocation'],
                                'editip' => $_SERVER['REMOTE_ADDR'],
                                'editdatetime' => date('Y-d-m h:i:s'),
                                'eventimage' => $filename,
                            );
                        }
                        
                        if ($this->common->update_data($data, 'events', 'eventid', $eventid)) {
                            $this->session->set_flashdata('success','Record has been updated successfully.');
                            redirect('event', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','There is a problem in updating records.Please try again!');
                            $this->load->view('event/addedit', $this->data);
                        }
                    } else {
                        $this->load->view('event/addedit', $this->data);
                    }
                }
            } else {
                $this->load->view('event/addedit', $this->data);
            }
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('event', 'refresh');
        }
    }
    
    public function delete($id) {
        $eventid = base64_decode($id);
        $event = $this->common->select_database_id('events', 'eventid', $eventid);
        if (count($event) > 0) {
            $filename = $event[0]['eventimage'];
            $main = $_SERVER['DOCUMENT_ROOT'].'/ulim/uploads/events/main/'.$filename ;
            $thumb = $_SERVER['DOCUMENT_ROOT'].'/ulim/uploads/events/thumb/'.$filename ;
            if(is_file($main)){
              unlink($main);
            }
            if(is_file($thumb)){
              unlink($thumb);
            }
            $result = $this->common->delete_data('events', 'eventid', $eventid);
            if($result)
            {
                $this->session->set_flashdata('success','Records has been deleted successfully');
                redirect('event', 'refresh');
            }else
            {
                $this->session->set_flashdata('error','There id problem in deleting records');
                redirect('event', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error','Records not found with specific id');
            redirect('event', 'refresh');
        }
    }

      public function status($type,$id)
    {
        $eventid = base64_decode($id);
        $event = $this->common->select_database_id('events', 'eventid', $eventid);
        if (count($event) > 0) {
            $result_data = array(
                    'status'=>$type
                    );
            $result = $this->common->update_data($result_data,$tablename='events','eventid', $eventid);
            if($result)
            {
                $this->session->set_flashdata('success','Status has been changed successfully.');
                redirect('event', 'refresh');
            }
            else
            {
                 $this->session->set_flashdata('error','There is problem in changing status.');
                redirect('event', 'refresh');
            }
        }
    }
    
     public function view($id) {
        $eventid = base64_decode($id);
        $event = $this->common->select_database_id('events', 'eventid', $eventid);
//        echo "<pre>";print_r($event);die();
        if (count($event) > 0) {
            $this->data['eventtitle'] = $event[0]['eventtitle'];
            $this->data['eventmetakeyword'] = $event[0]['eventmetakeyword'];
            $this->data['eventmetadescription'] = $event[0]['eventmetadescription'];
            $this->data['eventshortdescription'] = $event[0]['eventshortdescription'];
            $this->data['eventdescription'] = $event[0]['eventdescription'];
            $this->data['eventlocation'] = $event[0]['eventlocation'];
            $this->data['eventimage'] = $event[0]['eventimage'];
            $this->data['eventimage_path'] = $this->config->item('event_thumb_image');
            $this->data['formurl'] = 'event/view/' . $id;
            $this->data['formtitle'] = 'View Seminar Info';
         
                $this->load->view('event/view', $this->data);
            
        } else {
            $this->session->set_flashdata('error','Records not founs with specific id');
            redirect('event', 'refresh');
        }
    }
   
    
}
