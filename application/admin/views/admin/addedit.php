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
                                            <label class="control-label" for="basicinput">Name</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "name", 'id' => "inputname", 'placeholder' => 'please enter title', 'required' => '', 'value' => $adminname)); ?>
                                            </div>
                                    </div>
                                    
                                
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Email</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "email", 'name' => "email", 'id' => "inputemail", 'placeholder' => 'please enter email', 'required' => '', 'value' => $adminemail)); ?>
                                            </div>
                                        </div>
                                        <div class="control-group hidden" >
                                            <label class="control-label" for="basicinput">Admin Role</label>
                                            <div class="controls">
                                                <select name="adminrole" class="span8">
                                        <option value="">Please Select Role</option>
                                        <option value="0" <?php if($adminrole == 0){ ?> selected="selected" <?php }?>>Admin</option>
                                        <option value="1" <?php if($adminrole == 1){ ?> selected="selected" <?php }?>>Moderator</option>
                                   
                                    </select>
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