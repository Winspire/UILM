<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inviteus extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

       
        include ('include.php');
    }

    public function index() {

                $this->load->view('inviteus', $this->data);
                
    }
    
    public function captcha() {

                $this->load->view('captcha', $this->data);           
    }
    

    public function send_inquiry(){
        $this->load->helper('url');
        session_start();

if (!empty($this->input->post('captcha')) ) {
   
    if ($_SESSION['captcha'] != $this->input->post('captcha')) {
        $this->session->set_flashdata('captcha_error', 'Invalid Captcha!');
        $this->data['captcha_error'] = $this->session->flashdata('captcha_error');

        $redirect_url = site_url() . 'inviteus';        
    }
}

if(empty($this->input->post('captcha'))) {
        $this->session->set_flashdata('captcha_error', 'Captcha is required!');
        $this->data['captcha_error'] = $this->session->flashdata('captcha_error');

        $redirect_url = site_url() . 'inviteus'; 
}

        if (!$this->input->post('invite_email')){
          //redirect if no parameter e-mail
          $redirect_url = site_url() . 'inviteus';
        }
        
        $emailsetting = $this->common->getallrecordbytablename('emailsetting', '*', '', '','settingid','');
        
        $this->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = $emailsetting[0]['settingvalue'];
        $config['smtp_port']    = $emailsetting[1]['settingvalue'];
        $config['smtp_user']    = $emailsetting[2]['settingvalue'];
        $config['smtp_pass']    = $emailsetting[3]['settingvalue'];
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // text or html
        $config['validation'] = TRUE; // bool whether to validate email or not
      
                //load email library
        $this->email->initialize($config);
        

        //read parameters from $_POST using input class
        $fname = $this->input->post('invite_fname');   
        $lname = $this->input->post('invite_lname');   
        $email = $this->input->post('invite_email');
        $contact = $this->input->post('invite_contact_no');
        $purpose = $this->input->post('invite_purpose');  
        $comment = $this->input->post('invite_comment');  

        //Send Inquiry to Database
       if ($this->input->post('invite_email') && !empty($this->input->post('captcha')) && $_SESSION['captcha'] == $this->input->post('captcha')) {

                $insert_array = array(
                    'invite_fname' => $fname,
                    'invite_lname' => $lname,
                    'invite_email' => $email,
                    'invite_contact_no' => $contact,
                    'invite_purpose' => $purpose,
                    'invite_comment' => $comment,
                    'status' => 'pending',

                ); 

                $insert_result = $this->common->insert_data($insert_array, 'invitation');
        
          $this->email->from($emailsetting[2]['settingvalue'] , $fname." ".$lname);
          $this->email->to($emailsetting[4]['settingvalue']); 
          $this->email->subject("UILM Website Invitation ");
          $this->email->message("Name: ".$fname." ".$lname."<br>".
                                "Email: ".$email."<br>".
                                "Purpose: ".$purpose."<br>".
                                "Comment: ".$comment."<br>".
                                "Contect No. :".$contact);  
          $this->email->set_mailtype("html");
        }
        //}
        if ($this->input->post('redirect_url')) {
                $redirect_url = $this->input->post('redirect_url');
                } else {
                    $redirect_url = site_url() . 'inviteus';
                }

        if ($this->email->send() && $insert_result ) {
                $this->session->set_flashdata('success', 'Thank you for inviting us, our team member will be calling you soon !!!');
                redirect($redirect_url, 'refresh');
            } else {
            //show_error($this->email->print_debugger());               
                $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                redirect($redirect_url, 'refresh');
            }
        
        unset($_SESSION['captcha']); 
    }
    

}
