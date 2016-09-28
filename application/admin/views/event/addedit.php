<!DOCTYPE html>

<html lang="en">
    <head>
        <?php echo $header; ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('css/daterangepicker.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('scripts/moment.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('scripts/daterangepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('scripts/timepicker.js'); ?>"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    </head>
    <body>
        <?php echo $headermenu; ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php echo $leftmenu; ?>
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3><?php echo $formtitle ?></h3> 
                                </div>
                                <div class="module-body">
                                    <?php if (validation_errors() == true) { ?>
                                        <br>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <?php echo validation_errors(); ?>
                                        </div>
                                    <?php } ?>
                                    <br />
                                    <?php echo form_open_multipart(base_url($formurl), array('class' => 'form-horizontal row-fluid', 'id' => 'settingform')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Title</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "title", 'id' => "inputtitle", 'placeholder' => 'please enter title', 'required' => '', 'value' => $eventtitle)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Keywords</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "metakeyword", 'id' => "inputmetakeyword", 'placeholder' => 'please enter meta keywords ', 'required' => '', 'value' => $eventmetakeyword)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "3", 'name' => "metadescription", 'id' => "inputmetadescription", 'placeholder' => 'please enter meta description', 'required' => '', 'value' => $eventmetadescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Short Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8",  'rows' => "5", 'name' => "shortdescription", 'id' => "inputshortdescription", 'placeholder' => 'please enter short description ', 'required' => '', 'value' => $eventshortdescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "7", 'name' => "description", 'id' => "inputdescription", 'placeholder' => 'please enter description', 'required' => '', 'value' => $eventdescription)); ?>
                                            </div>
                                        </div>
                                    
                                   <div class="control-group">
                                            <label class="control-label" for="basicinput">Event Time</label>
                                            <div class="controls">
                                                <?php 
                                                if($eventstarttime != "0000-00-00 00:00:00" && $eventstarttime != "1970-01-01 01:00:00" && $eventstarttime != "") {
                                                echo form_input(array('class' => "form-control", 'name' => "eventtime", 'id' => "eventtime")); 
                                                } else {
                                                echo form_input(array('class' => "form-control", 'name' => "eventtime", 'id' => "eventdefaulttime")); 
                                                } ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Event Location</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'rows' => "7", 'name' => "location", 'id' => "inputlocation", 'placeholder' => 'please enter location', 'required' => '', 'value' => $eventlocation)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Image</label>
                                            <div class="controls">
                                                <?php echo form_upload(array('class' => "span8", 'name' => "image", 'id' => "inputimage")); ?>
                                            </div>
                                        </div>
                                   
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "eventbtn", 'content' => "Submit Form")); ?>
                                            <?php echo anchor($this->uri->segment(1),'Cancel',array('class' => "btn")); ?>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div><!--/.content-->
                    </div><!--/.span9-->
                </div>
            </div><!--/.container-->
        </div><!--/.wrapper-->
        <style type="text/css">
      .demo { position: relative; }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
      </style>
      <?php //echo (date('d-m-Y H:i:s',(strtotime($eventstarttime)))); ?>
        <script>

     
$('#eventtime').daterangepicker({
    "timePicker24Hour": true,
    "timePicker": true,
    "startDate": "<?php echo (date('Y-m-d H:i:s',(strtotime($eventstarttime)))); ?>",
    "endDate": "<?php echo (date('Y-m-d H:i:s',(strtotime($eventendtime)))); ?>",
    locale: {
            format: 'YYYY/MM/DD hh:mm:ss'
        }
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});


$('#eventdefaulttime').daterangepicker({
    "timePicker24Hour": true,
    "timePicker": true,
    "setDate": new Date('Y-m-d H:i:s'),
    
    locale: {
            format: 'YYYY/MM/DD hh:mm:ss'
        }
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

        </script>
        <?php echo $footer; ?>
    </body>
    
    