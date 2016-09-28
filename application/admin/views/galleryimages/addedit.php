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
                                    <?php echo form_open_multipart(base_url($formurl), array('class' => 'form-horizontal row-fluid', 'id' => 'galleryform','data-toggle'=>'validator')); ?>
                                    
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Add Image</label>
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