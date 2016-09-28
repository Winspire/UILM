<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $header ?>
    </head>
    <body>
        <?php echo $headermenu; ?>  
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="module module-login span4 offset4">
                        <?php echo form_open(base_url('login'), array('class' => 'form-vertical', 'id' => 'loginform')); ?>
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>   
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <?php echo form_input(array('class' => "span12", 'type' => "text", 'name' => "email", 'id' => "inputEmail",'required'=>'', 'placeholder' => "Email", 'value' => $email)); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <?php echo form_input(array('class' => "span12", 'type' => "password", 'name' => "password", 'id' => "inputPassword",'required'=>'', 'placeholder' => "Password", 'value' => $password)); ?>
                                </div>
                            </div>
                        </div>
                        <?php if (validation_errors() == true) { ?>
                            <br>
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php // echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <?php echo form_button(array('class' => "btn btn-primary pull-right", 'type' => "submit", 'name' => "loginbtn", 'id' => "loginbtn", 'content' => "Login")); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div><!--/.wrapper-->
        <?php echo $footer; ?>
    </body>