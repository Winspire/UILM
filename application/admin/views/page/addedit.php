<!DOCTYPE html>
<html lang="en">
    <head>
        <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
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
                                    <?php echo form_open_multipart(base_url($formurl), array('class' => 'form-horizontal row-fluid', 'id' => 'settingform')); ?>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Title</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "title", 'id' => "inputtitle", 'placeholder' => 'please enter title', 'required' => '', 'value' => $pagetitle)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Keywords</label>
                                            <div class="controls">
                                                <?php echo form_input(array('class' => "span8", 'type' => "text", 'name' => "metakeyword", 'id' => "inputmetakeyword", 'placeholder' => 'please enter meta keywords ', 'required' => '', 'value' => $pagemetakeyword)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Meta Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8", 'rows' => "3", 'name' => "metadescription", 'id' => "inputmetadescription", 'placeholder' => 'please enter meta description', 'required' => '', 'value' => $pagemetadescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Short Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8",  'rows' => "5", 'name' => "shortdescription", 'id' => "inputshortdescription", 'placeholder' => 'please enter short description ', 'required' => '', 'value' => $pageshortdescription)); ?>
                                            </div>
                                        </div>
                                    <div class="control-group">
                                            <label class="control-label" for="basicinput">Description</label>
                                            <div class="controls">
                                                <?php echo form_textarea(array('class' => "span8 ckeditor", 'rows' => "7", 'name' => "description", 'id' => "inputdescription", 'placeholder' => 'please enter description', 'required' => '', 'value' => $pagedescription)); ?>
                                         <script> 
var roxyFileman = '<?php echo base_url().'../uploads/upload.php'; ?>' ; 

   CKEDITOR.replace( 'inputdescription',{
                                filebrowserBrowseUrl : roxyFileman,
                                filebrowserUploadUrl : roxyFileman,
                                filebrowserImageBrowseUrl : roxyFileman+'?type=image',
                                filebrowserImageUploadUrl : roxyFileman,
                                extraAllowedContent:  'img[alt,border,width,height,align,vspace,hspace,!src];' ,
                                removeDialogTabs: 'link:upload;image:upload'}); 

CKEDITOR.config.allowedContent = true;

CKEDITOR.on('instanceReady', function(ev) {

    // Ends self closing tags the HTML4 way, like <br>.
    ev.editor.dataProcessor.htmlFilter.addRules({
        elements: {
            $: function(element) {
                // Output dimensions of images as width and height
                if (element.name == 'img') {
                    var style = element.attributes.style;

                    if (style) {
                        // Get the width from the style.
                        var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                            width = match && match[1];

                        // Get the height from the style.
                        match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                        var height = match && match[1];

                        // Get the float from the style.
                        match = /(?:^|\s)float\s*:\s*(\w+)/i.exec(style);
                        var float = match && match[1];

                        if (width) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                            element.attributes.width = width;
                        }

                        if (height) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                            element.attributes.height = height;
                        }
                        if (float) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)float\s*:\s*(\w+)/i, '');
                            element.attributes.align = float;
                        }

                    }
                }

                if (!element.attributes.style) delete element.attributes.style;

                return element;
            }
        }
    });
});

 </script>
                                            </div>
                                        </div>
                                    
                                   
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_button(array('class' => "btn btn-primary", 'type' => "submit", 'name' => "submitbtn", 'id' => "pagebtn", 'content' => "Submit Form")); ?>
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