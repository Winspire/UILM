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
                            <?php if( $this->session->flashdata('success') ) { ?>
                <div class="alert alert-success">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong><?php echo $this->session->flashdata('success');?></strong>
</div>
    <?php } ?>
    <?php if( $this->session->flashdata('error') ) { ?>
                <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo $this->session->flashdata('error');?></strong></div>
                
        <?php } ?>
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
                                    <?php echo form_open_multipart(base_url($formurl), array('class' => 'form-horizontal row-fluid', 'id' => 'adminform','data-toggle'=>'validator')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Old Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "adminpassword", 'id' => "adminpassword", 'placeholder' => 'old password', 'required' => '')); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">New Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "new_adminpassword", 'id' => "new_adminpassword", 'placeholder' => 'new password', 'required' => '')); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Re-Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "re_adminpassword", 'id' => "re_adminpassword", 'placeholder' => 're-password', 'required' => '')); ?>
                                            </div>
                                        </div>
                                        
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "servicebtn", 'content' => "Submit Form")); ?>
                                            <?php echo anchor('dashboard','Cancel',array('class' => "btn")); ?>
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