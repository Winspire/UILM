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

					<div class="content">

<?php if ($this->session->flashdata('success')) { ?>
<div class="alert fade in alert-success">
    <i class="icon-remove close" data-dismiss="alert"></i>
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>  
<div class="alert fade in alert-danger" >
    <i class="icon-remove close" data-dismiss="alert"></i>
    <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
                
                                               
						<?php echo form_open_multipart(base_url($formurl), array('class' => 'form-horizontal row-fluid','method' => 'post', 'id' => 'change_passform')); ?>
                                    
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Old Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "old_password", 'id' => "old_password", 'required' => '')); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">New Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "new_password", 'id' => "new_password", 'required' => '')); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Confirm Password</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "password", 'name' => "confirm_password", 'id' => "confirm_password", 'required' => '')); ?>
                                            </div>
                                        </div>                                
                                   
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "change_passbtn", 'content' => "Submit Form")); ?>
                                            <?php echo anchor($this->uri->segment(1),'Cancel',array('class' => "btn")); ?>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
					<br />
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
                             </div>
                            </div>
                    </div>
            
	<?php echo $footer; ?>
        
</body>