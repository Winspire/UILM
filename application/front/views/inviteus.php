<?php echo $header ?>   

        <div class="container">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
			<li class="active"><?php echo $page[8]['pagetitle'] ?></li>
		</ol>
        </div>

<?php

       $form_attr = array('id' => 'invitationform', 'class' => 'form-horizontal row-border' , 'enctype' => 'multipart/form-data');
        echo form_open('inviteus/send_inquiry',$form_attr);
?>

        <div class="main-1">
		<div class="container">
			<div class="register">
		  	
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
				 <div class="register-top-grids">
                                     
					<h3><?php echo $page[8]['pagetitle'] ?></h3>
                                        
					 <div class="wow fadeInLeft" id="fname" data-wow-delay="0.4s">
						<span>First Name<label>*</label></span>
                                                <input name="invite_fname" id="invite_fname" type="text"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Last Name<label>*</label></span>
                                                <input name="invite_lname" id="invite_lname" type="text"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span>
                                                 <input name="invite_email" id="invite_email" type="text"> 
					 </div>
                     <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Contact No<label>*</label></span>
                                                 <input name="invite_contact_no" id="invite_contact_no" type="text"> 
					 </div>
                     
                     <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Purpose<label>*</label></span>
                                                 <input name="invite_purpose" id="invite_purpose" type="text"> 
					 </div>
			
                     <div class="clearfix"> </div>
					
                    <div class="text">
                     	<span>Comments</span>
                        <textarea name="invite_comment" id="invite_comment"></textarea>
                     </div>
                     
                    
<div class="wow fadeInRight" data-wow-delay="0.4s">      
<img src="inviteus/captcha" id="captcha" /><br/>


<!-- CHANGE TEXT LINK -->
<a onclick="
    document.getElementById('captcha').src='inviteus/captcha?'+Math.random();
    document.getElementById('captcha_form').focus();"
    id="change-image" style="cursor:pointer;">Not readable? Change text.</a><br/><br/>

    
        <input type="text" name="captcha" id="captcha_form" autocomplete="off" />
    </div>

 <div class="field">
       </div>

       </div>
                    
                    <div class="submit">
                        <button class="btn btn-default" id="submit">Submit</button>
                    <span>Fields marked with * are mandatory.</span>
                    </div>
                    
                    </div>
                    </form>
				</div>
		   </div>
		 </div>

        
        
        
        
<?php echo form_close(); ?>

<?php echo $footer ?>

<script type="text/javascript">
    //validation for edit email formate form
    $(document).ready(function () {
       
       
        $("#invitationform").validate({
            
            rules: {
              
                 invite_fname: {
                    required: true,
                },
                 invite_lname: {
                    required: true,
                },
                 invite_email: {
                    required: true,
                    email:true,
                },
                 invite_contact_no: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                 invite_purpose: {
                    required: true,
                },
                
                 captcha: {
                    required: true,
                 },
                 
            },
            messages:
                    {
                        
                        invite_fname: {
                            required: "First Name is required",
                        },
                         invite_lname: {
                            required: "Last Name is required",
                        },
                         invite_email: {
                            required: "Email Id is required",
                        },
                         invite_contact_no: {
                            required: "Contact No. is required",
                            minlength: "Invalid Mobile No. Format",
                            maxlength: "Invalid Mobile No. Format",
                        },
                        invite_purpose: {
                            required: "Invitation Purpose is required",
                        },
                        captcha: {
                            required: "Captcha is required",
                        },
                        
                        
                    
                    },
        });
        
       
    });
</script>