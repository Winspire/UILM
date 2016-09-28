<!DOCTYPE html>
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
                                            <label class="control-label" for="basicinput">Client Name</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "clientname", 'id' => "inputclientname", 'placeholder' => 'please enter client name', 'required' => '', 'value' => $clientname)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Client's Profession</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "clientprofession", 'id' => "inputclientprofession", 'placeholder' => 'please enter client Profession', 'required' => '', 'value' => $clientprofession)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Testimonial Text</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "7", 'name' => "testimonialtext", 'id' => "inputtestimonialtext", 'placeholder' => 'please enter testimonialtext', 'required' => '', 'value' => $testimonialtext)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Client Image</label>
                                            <div class="controls">
                                                <?php echo form_upload(array('class' => "span8", 'name' => "image", 'id' => "inputimage")); ?>
                                            </div>
                                        </div>
                                   
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "newsbtn", 'content' => "Submit Form")); ?>
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