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
                                    <h3>Edit Sem</h3>
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
                                    <?php echo form_open(base_url('sem/edit/' . base64_encode($semid)), array('class' => 'form-horizontal row-fluid', 'id' => 'semform')); ?>
                                    
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput"><?php echo $semname ?></label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "value", 'id' => "inputvalue", 'placeholder' => 'please enter ' . $semname, 'required' => '', 'value' => $semvalue)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "sembtn", 'content' => "Submit Form")); ?>
                                             <?php echo anchor('sem','Cancel',array('class' => "btn")); ?>
                                                
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