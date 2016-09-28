<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seminar extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        
        include ('include.php');
        
        //Loadin Pagination Custome Config File
        $this->config->load('paging', TRUE);
        $this->paging = $this->config->item('paging');
    }

    public function index() {

                
        $limit=6;    
        //$this->data['offset'] = 0;
        $offset=($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;
        $conditionarray=array('status' => 'Active');
        $this->data['events_list'] = $this->common->getallrecordbytablename('events', '*', $limit,$offset,'eventstarttime','DESC',$conditionarray);
        
        $this->paging['base_url'] = site_url("seminar/index/");
        $this->paging['total_rows'] = count($this->common->getallrecordbytablename('events', '*', '', '','eventid','',$conditionarray));
        
        $this->pagination->initialize($this->paging);
        $this->data['search_keyword'] = '';
        $this->load->view('seminar/index', $this->data);
           
    }
    
    public function details($url='') {

        if($url != '')  {      
                
            $conditionarray=array('status' => 'Active','eventurl' => $url);
            $this->data['event_detail'] = $this->common->select_database_id('events', 'eventurl', $url, '*',$conditionarray);

            $this->load->view('seminar/seminardetail', $this->data);
        } else {
            redirect('seminar', 'refresh');
        }
        
           
    }
    
    public function week() {

        $limit=6;    
        $offset=($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;   
        $this->data['events_list'] = $this->common->getweeklydata('events', '*', $limit,$offset,'eventstarttime','DESC');
        
        $this->paging['base_url'] = site_url("seminar/week/");
        $this->paging['total_rows'] = count($this->common->getweeklydata('events', '*', '', '','eventstarttime',''));
        
        $this->pagination->initialize($this->paging);
        
        $this->load->view('seminar/index', $this->data);
        
           
    }
    
    public function month() {

        $limit=6;    
        $offset=($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;      
        $this->data['events_list'] = $this->common->getmonthlydata('events', '*', $limit,$offset,'eventstarttime','DESC');
        
        $this->paging['base_url'] = site_url("seminar/month/");
        $this->paging['total_rows'] = count($this->common->getmonthlydata('events', '*', '', '','eventstarttime',''));
        
        $this->pagination->initialize($this->paging);
        
        $this->load->view('seminar/index', $this->data);
        
           
    }
    
    public function search() {
        
        $this->data['search_keyword'] = '';
        $this->data['events_list'] = array();
        if ($this->input->post('search_keyword')) {
            $this->data['search_keyword'] = $search_keyword = $this->input->post('search_keyword');
            $this->session->set_userdata('events_search_keyword', $search_keyword);
            $limit = 6;
            
                $short_by = 'eventstarttime';
                $order_by = 'asc';
                $offset=($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;
            
                
            //prepare search condition
            $search_condition = "(eventtitle LIKE '%$search_keyword%')";

            $contition_array = array('status' => 'Active');

            $this->data['events_list'] = $this->common->select_data_by_search('events', $search_condition, $contition_array, '*', $short_by, $order_by, $limit, $offset);
            
            if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                $this->paging['base_url'] = site_url("seminar/search/" . $short_by . "/" . $order_by);
            } else {
                $this->paging['base_url'] = site_url("seminar/search/");
            }


            if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                $this->paging['uri_segment'] = 5;
            } else {
                $this->paging['uri_segment'] = 3;
            }
            $this->paging['total_rows'] = count($this->common->select_data_by_search('events', $search_condition, $contition_array));

            $this->pagination->initialize($this->paging);
        } else if ($this->session->userdata('events_search_keyword')) {
            $this->data['search_keyword'] = $search_keyword = $this->session->userdata('events_search_keyword');

            $limit = 6;
            if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                $offset = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 0;
                $short_by = $this->uri->segment(3);
                $order_by = $this->uri->segment(4);
            } else {
                $offset = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;
                $short_by = 'eventstarttime';
                $order_by = 'asc';
            }
            $this->data['offset'] = $offset;
            //prepare search condition
            $search_condition = "(eventtitle LIKE '%$search_keyword%')";

            $contition_array = array('status' => 'Active');


            $this->data['events_list'] = $this->common->select_data_by_search('events', $search_condition, $contition_array, '*', $short_by, $order_by, $limit, $offset);

            if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                $this->paging['base_url'] = site_url("seminar/search/" . $short_by . "/" . $order_by);
            } else {
                $this->paging['base_url'] = site_url("seminar/search/");
            }


            if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                $this->paging['uri_segment'] = 5;
            } else {
                $this->paging['uri_segment'] = 3;
            }
            $this->paging['total_rows'] = count($this->common->select_data_by_search('events', $search_condition, $contition_array));

            $this->pagination->initialize($this->paging);
        }

        $this->load->view('seminar/index', $this->data);
    }


    

}
