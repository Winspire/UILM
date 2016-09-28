<?php


        $this->data['sitedata'] = $this->common->getallrecordbytablename('setting', '*', '', '','settingid','');
        
         $this->data['page'] = $this->common->getallrecordbytablename('pages', '*', '', '','pageid','');
         $this->data['sem'] = $this->common->getallrecordbytablename('sem', '*', '', '','semid','');
        //print_r($this->data['page']);
        //exit();
$this->data['header'] = $this->load->view('common/header', $this->data, true);
//$this->data['headermenu'] = $this->load->view('common/headermenu', $this->data, true);
//$this->data['leftmenu'] = $this->load->view('common/leftmenu', $this->data, true);
$this->data['footer'] = $this->load->view('common/footer', $this->data, true);

//$this->data['news'] = $this->common->get_news();
?>