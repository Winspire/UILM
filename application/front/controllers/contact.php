<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        
        include ('include.php');
    }

    public function index() {
//        echo $type;die();
              
                $this->load->view('contact', $this->data);
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

        $redirect_url = site_url() . 'contact';        
    }
}
if(empty($this->input->post('captcha'))) {
        $this->session->set_flashdata('captcha_error', 'Captcha is required!');
        $this->data['captcha_error'] = $this->session->flashdata('captcha_error');

        $redirect_url = site_url() . 'contact'; 
}
        if (!$this->input->post('contact_email')){
          //redirect if no parameter e-mail
          $redirect_url = site_url() . 'contact';
        };
        
        $emailsetting = $this->common->getallrecordbytablename('emailsetting', '*', '', '','settingid','');

        //load email library
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
        $name = $this->input->post('contact_name');      
        $email = $this->input->post('contact_email');
        $contact = $this->input->post('contact_no');
        $message = $this->input->post('contact_message');  

        //Send Inquiry to Database
        if ($this->input->post('contact_email') && !empty($this->input->post('captcha')) && $_SESSION['captcha'] == $this->input->post('captcha')) {

                $insert_array = array(
                    'contact_name' => $name,
                    'contact_email' => $email,
                    'contact_no' => $contact,
                    'contact_message' => $message,
                    'status' => 'pending',

                );

                $insert_result = $this->common->insert_data($insert_array, 'contactus');
                
        // Send Inquiry to Mail
        // check is email addrress valid or no
        $this->email->from($emailsetting[2]['settingvalue'] , $name);
          $this->email->to($emailsetting[4]['settingvalue']); 
          $this->email->subject("UILM Website Invitation ");
          $this->email->message("Name: ".$name."<br>".
                                "Email: ".$email."<br>".
                                "Contect No. :".$contact."<br>".
                                "Message: ".$message);  
          $this->email->set_mailtype("html");
        }
        if ($this->input->post('redirect_url')) {
                $redirect_url = $this->input->post('redirect_url');
                } else {
                    $redirect_url = site_url() . 'contact';
                }

        if ($this->email->send() && $insert_result) {
                $this->session->set_flashdata('success', 'Thank you for contacting us, our representative will be contact you soon !!!');
                redirect($redirect_url, 'refresh');
            } else {
                show_error($this->email->print_debugger());  
                $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                redirect($redirect_url, 'refresh');
            }
        
    }
    
}
