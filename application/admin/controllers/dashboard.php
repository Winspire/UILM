<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');



class Dashboard extends CI_Controller {



    public $data;



    public function __construct() {

        parent::__construct();

        if (!$this->session->userdata('ulim_admin')) {

            redirect('login', 'refresh');

        }

        include ('include.php');

    }



    public function index() {
        $this->data['pages_count'] = $this->common->get_count_of_table($tblname = 'pages');

        $this->data['banners_count'] = $this->common->get_count_of_table($tblname = 'banners');

        $this->data['services_count'] = $this->common->get_count_of_table($tblname = 'services');

        $this->data['events_count'] = $this->common->get_count_of_table($tblname = 'events');

        $this->data['testimonials_count'] = $this->common->get_count_of_table($tblname = 'testimonials');

        $this->data['news_count'] = $this->common->get_count_of_table($tblname = 'news');
        
        $this->data['gallery_count'] = $this->common->get_count_of_table($tblname = 'gallery');
        
        $this->data['invitation_count'] = $this->common->get_count_of_table($tblname = 'invitation');
        
        $this->data['inquiry_count'] = $this->common->get_count_of_table($tblname = 'contactus');

        
        
        $this->load->view('dashboard/index', $this->data);

    }

    public function logout()

	{

		if( isset($this->session->userdata['ulim_admin']) )

		{

			$this->session->unset_userdata('ulim_admin');
                        $this->load->library( 'nativesession' );
                        $this->nativesession->delete( 'fileman' );
			$this->session->sess_destroy();

		  	$this->session->set_flashdata('success', '<b style="color:green">You have been successfully logged out.</b>');

			redirect('login', 'refresh');

		}

		else

		{ 

			redirect('login', 'refresh');

		}

	}

   

}

