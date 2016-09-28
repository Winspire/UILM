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
                                        <div class="pull-right"><a href="<?php echo base_url('doctor');?>"> &lt;&lt; Back</a></div>
                                    <br />
                                    <?php echo form_open('#', array('class' => 'form-horizontal row-fluid')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Title</label>
                                            <div class="controls">
                                               <?php echo $doctorname ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Keywords</label>
                                            <div class="controls">
                                                <?php  echo $doctormetakeyword;?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Description</label>
                                            <div class="controls">
                                                <?php  echo $doctormetadescription; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Description</label>
                                            <div class="controls">
                                                <?php echo $doctordescription; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Speciality</label>
                                            <div class="controls">
                                                <?php echo $doctorspeciality; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Degree</label>
                                            <div class="controls">
                                                <?php echo $doctordegree; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Address</label>
                                            <div class="controls">
                                                <?php echo $doctoraddress; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Phone</label>
                                            <div class="controls">
                                                <?php echo $doctorphone; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Email</label>
                                            <div class="controls">
                                                <?php echo $doctoremail; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Facebook</label>
                                            <div class="controls">
                                                <?php echo $doctorfacebook; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Twitter</label>
                                            <div class="controls">
                                                <?php echo $doctortwitter; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Skype</label>
                                            <div class="controls">
                                                <?php echo $doctorskype; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Linkedin</label>
                                            <div class="controls">
                                                <?php echo $doctorlinkedin; ?>
                                            </div>
                                        </div>
                                   
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Image</label>
                                            <div class="controls">
                                                <img src="<?php echo base_url().$doctorimage_path.$doctorimage?>"/>
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