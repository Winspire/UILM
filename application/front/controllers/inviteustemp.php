<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inviteustemp extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

       
        include ('include.php');
    }

    public function index() {

                $this->load->view('inviteustemp', $this->data);
                
    }
    
    public function captcha() {

                $this->load->view('captcha', $this->data);           
    }
    

    public function send_inquiry(){
        $this->load->helper('url');
        session_start();




//echo ($this->input->post('invite_email'));
//exit();
        if (!$this->input->post('invite_email')){
          //redirect if no parameter e-mail
          $redirect_url = site_url() . 'inviteustemp';
        }

        $this->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.winspirewebsolution.com';
        $config['smtp_port']    = '587';
        //$config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'noreply@wwsptech.com';
        $config['smtp_pass']    = 'reply123';
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
       /* if ($this->input->post('invite_email') && !empty($this->input->post('captcha')) && $_SESSION['captcha'] == $this->input->post('captcha')) {

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
         */       
        // Send Inquiry to Mail
        // check is email addrress valid or no
        //if (valid_email($email)){  
          // compose email
          $this->email->from('noreply@wwsptech.com' , $fname." ".$lname);
          $this->email->to('aniket@winspirewebsolution.com'); 
          $this->email->subject("UILM Website Invitation ");
          $this->email->message("Name: ".$fname." ".$lname."<br>".
                                "Email: ".$email."<br>".
                                "Purpose: ".$purpose."<br>".
                                "Comment: ".$comment."<br>".
                                "Contect No. :".$contact);  
          $this->email->set_mailtype("html");
        //}
          $this->email->send();
        echo $this->email->print_debugger();
                die();
        if ($this->input->post('redirect_url')) {
                $redirect_url = $this->input->post('redirect_url');
                } else {
                    $redirect_url = site_url() . 'inviteustemp';
                }

        if ($this->email->send() ) {
                $this->session->set_flashdata('success', 'Thank you for inviting us, our team member will be calling you soon !!!');
                redirect($redirect_url, 'refresh');
            } else {
                echo $this->email->print_debugger();
                $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                redirect($redirect_url, 'refresh');
            }
        
        unset($_SESSION['captcha']); 
    }
    

}
