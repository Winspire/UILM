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
                                        <div class="pull-right"><a href="<?php echo base_url('testimonial');?>"> &lt;&lt; Back</a></div>
                                    <br />
                                    <?php echo form_open("#", array('class' => 'form-horizontal row-fluid')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Client Name</label>
                                            <div class="controls">
                                                <?php echo  $clientname; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Testimonial Text</label>
                                            <div class="controls">
                                                <?php echo $testimonialtext; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Image</label>
                                            <div class="controls">
                                                <img src="<?php echo base_url().$clientimage_path.$clientimage?>"/>
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