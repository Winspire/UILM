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
                                        <div class="pull-right"><a href="<?php echo base_url('event');?>"> &lt;&lt; Back</a></div>
                                    <br />
                                    <?php echo form_open("#", array('class' => 'form-horizontal row-fluid')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Title</label>
                                            <div class="controls">
                                                <?php echo  $eventtitle; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Keywords</label>
                                            <div class="controls">
                                                <?php echo $eventmetakeyword; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Description</label>
                                            <div class="controls">
                                                <?php echo $eventmetadescription; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Short Description</label>
                                            <div class="controls">
                                                <?php echo $eventshortdescription; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Description</label>
                                            <div class="controls">
                                                <?php echo $eventdescription; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Event Start Date</label>
                                            <div class="controls">
                                                <?php echo $eventstartdate; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Event End Date</label>
                                            <div class="controls">
                                                <?php echo $eventenddate; ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Image</label>
                                            <div class="controls">
                                                <img src="<?php echo base_url().$eventimage_path.$eventimage?>"/>
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