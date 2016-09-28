<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed')

;class Login extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('ulim_admin')) {
            redirect('dashboard', 'refresh');
        } include ('include.php');
    }

    public function index() {
        $this->data['email'] = '';
        $this->data['password'] = '';
        if ($this->input->post()) {
            $this->data['email'] = $this->input->post('email');
            $this->data['password'] = $this->input->post('password');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback___check_login');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login/index', $this->data);
            } else {
                $this->load->view('login/index', $this->data);
            }
        } else {
            $this->load->view('login/index', $this->data);
        }
    }

    public function __check_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $islogin = $this->common->select_database_id('admin', 'adminemail', $email, 'adminid,adminname', $condition_array = array('adminpassword' => md5($password)));
        if ($islogin) {
            $adminsession = array('id' => $islogin[0]['adminid'], 'name' => $islogin[0]['adminname']);
            
            $this->load->library( 'nativesession' );
            $this->nativesession->set( 'fileman', true );
            $this->session->set_userdata('ulim_admin', $adminsession);
            redirect('dashboard', 'refresh');
        } else {
            $this->form_validation->set_message('__check_login', 'Invalid email or password');
            return FALSE;
        }
    }

}
