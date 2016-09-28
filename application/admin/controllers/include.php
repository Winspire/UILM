<?php
     $sitename=$this->common->select_database_id('setting','settingid',1,'settingvalue');
     $this->data['sitename'] = $sitename[0]['settingvalue'];
    //page title
    $this->data['title'] = ucfirst($this->data['sitename']).' Admin'.' : '.ucfirst($this->uri->segment(1));       
    //Load header and save in variable
    $this->data['header'] = $this->load->view('common/header',$this->data,true);
    $this->data['headermenu'] = $this->load->view('common/headermenu',$this->data,true);
    $this->data['leftmenu'] = $this->load->view('common/leftmenu',$this->data,true);
    $this->data['footer'] = $this->load->view('common/footer',$this->data,true);

?>