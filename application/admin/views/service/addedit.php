﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $header; ?>
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
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "title", 'id' => "inputtitle", 'placeholder' => 'please enter title', 'required' => '', 'value' => $servicetitle)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Keywords</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "metakeyword", 'id' => "inputmetakeyword", 'placeholder' => 'please enter meta keywords ', 'required' => '', 'value' => $servicemetakeyword)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "3", 'name' => "metadescription", 'id' => "inputmetadescription", 'placeholder' => 'please enter meta description', 'required' => '', 'value' => $servicemetadescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Short Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8",  'rows' => "5", 'name' => "shortdescription", 'id' => "inputshortdescription", 'placeholder' => 'please enter short description ', 'required' => '', 'value' => $serviceshortdescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "7", 'name' => "description", 'id' => "inputdescription", 'placeholder' => 'please enter description', 'required' => '', 'value' => $servicedescription)); ?>
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
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "servicebtn", 'content' => "Submit Form")); ?>
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

        <?php echo $footer; ?>
    </body>