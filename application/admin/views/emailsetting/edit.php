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
                                    <h3>Edit Setting</h3>
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
                                    <?php echo form_open(base_url('emailsetting/edit/' . base64_encode($settingid)), array('class' => 'form-horizontal row-fluid', 'id' => 'settingform')); ?>
                                    <?php if ($settingid == 4) { ?><div class="control-group">
                                            <label class="control-label" for="basicinput"><?php echo $settingname ?></label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'type' => "text", 'name' => "value", 'id' => "inputvalue", 'placeholder' => 'please enter ' . $settingname, 'required' => '', 'value' => $settingvalue)); ?>
                                            </div>
                                        </div> <?php } else { ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput"><?php echo $settingname ?></label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "value", 'id' => "inputvalue", 'placeholder' => 'please enter ' . $settingname, 'required' => '', 'value' => $settingvalue)); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "settingbtn", 'content' => "Submit Form")); ?>
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