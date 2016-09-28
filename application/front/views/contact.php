<?php echo $header ?>        
        <div class="container">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
			<li class="active"><?php echo $page[9]['pagetitle'] ?></li>
		</ol>
        </div>

<?php
        $form_attr = array('id' => 'contactform', 'class' => 'form-horizontal row-border' , 'enctype' => 'multipart/form-data');
        echo form_open_multipart('contact/send_inquiry', $form_attr);
?>

    <div class="contactus">
    	<div class="container">
    		<div class="heading">
            <h2><?php echo $page[9]['pagetitle'] ?></h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.788846884855!2d72.52062981487046!3d23.01239383539392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84d50d30b085%3A0x6a37413e66d3e234!2sTitanium+City+Centre!5e1!3m2!1sen!2sin!4v1454492256142" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    		</div>
            
                            
            <div class="col-sm-8">
                            
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert fade in alert-success">
                                    <i class="icon-remove close" data-dismiss="alert"></i>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } elseif ($this->session->flashdata('captcha_error')) { ?>  
                            <div class="alert fade in alert-danger" >
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <?php echo $this->session->flashdata('captcha_error'); ?>
                            </div>
                            <?php } elseif ($this->session->flashdata('error')) { ?>  
                                <div class="alert fade in alert-danger" >
                                    <i class="icon-remove close" data-dismiss="alert"></i>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
            	<div class="contactform">
                <h2><?php echo $page[9]['pagetitle'] ?></h2>
                </div>
                
                <form>
            	<div class="contactfilled">
                	<span>Name <label>*</label></span>
                        <input type="text" name="contact_name" placeholder="Name" />
            	</div>
                
                <div class="contactfilled">
                	<span>Email <label>*</label></span>
                        <input type="text" name="contact_email" placeholder="Email" />
            	</div>
                
                <div class="contactfilled">
                	<span>Contact No<label>*</label></span>
                        <input type="text" name="contact_no" placeholder="0123456789" />
            	</div>
                
                <div class="contactfilled">
                	<span>Message</span>
                        <textarea name="contact_message" placeholder="Message"></textarea>
            	</div>
                <div class="contactfilled">      
                <img src="inviteus/captcha" id="captcha" /><br/>


                <!-- CHANGE TEXT LINK -->
                <a onclick="
                    document.getElementById('captcha').src='inviteus/captcha?'+Math.random();
                    document.getElementById('captcha_form').focus();"  style="cursor:pointer;"
                                    id="change-image">Not readable? Change text.</a><br><br>


                        <input type="text" name="captcha" id="captcha_form" autocomplete="off" />
                </div>
                
                <div class="s_btn">
                <button>Submit</button>
                </div>
                </form>
                
                
                </div>
                
            <div class="col-sm-4">
             <?php echo $page[9]['pagedescription'] ?>
            </div>    
                
            </div>
        
        </div>
       
    </div>    
	
<!--//contact-->
	</div>



<script type="text/javascript">
    //validation for edit email formate form
    $(document).ready(function () {


        $("#contactform").validate({
            
            rules: {
              
                 contact_name: {
                    required: true,
                },
                 contact_email: {
                    required: true,
                    email:true,
                },
                 contact_no: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                 contact_message: {
                    required: true,
                },
                 captcha: {
                    required: true,
                 },
                 
            },
            messages:
                    {
                        
                        contact_name: {
                            required: "Name is required",
                        },
                         contact_email: {
                            required: "Email is required",
                        },
                         contact_no: {
                            required: "Contact Number is required",
                            minlength: "Invalid Mobile No. Format",
                            maxlength: "Invalid Mobile No. Format",
                        },
                         contact_message: {
                            required: "Message is required",
                        },
                         captcha: {
                        required: "Captcha is required",
                 },
                        
                    
                    },
        });

    });
</script>

<?php echo $footer ?>