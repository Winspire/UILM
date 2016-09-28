<?php echo $header;
        $event_path=$this->config->item('event_main_image');      
?>        
        <div class="container">
        <ol class="breadcrumb">
						<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
                        <li><a href="<?php echo base_url().$page[3]['pageurl'] ?>"><?php echo $page[3]['pagetitle'] ?></a></li>
						<li class="active">Seminar Detail</li>
					</ol>
        </div>
        
		
        
<?php foreach ($event_detail as $event) { ?>
        <div class="event_detail">
        	<div class="container">
            	<div class="e_names">
            	<h2><?php echo $event['eventtitle'] ?></h2>
            	</div>
            	<div class="col-sm-9">
                	<div class="event_img">
                    <img src="<?php echo base_url().$event_path.$event['eventimage'] ?>" alt="img" />
                    </div>
        		</div>
                <!--
                <div class="col-sm-3">
                	<div class="col-sm-12">
                		<div class="e_smallimg">
                        <a href="#"><img src="<?php // echo base_url(); ?>images/17.png" alt="img" /></a>
                        </div>
                        
                        <div class="e_smallimg">
                        <a href="#"><img src="<?php // echo base_url(); ?>images/16.png" alt="img" /></a>
                        </div>
                        
                        <div class="e_smallimg">
                        <a href="#"><img src="<?php // echo base_url(); ?>images/17.png" alt="img" /></a>
                        </div>
                    </div>
                </div> -->
        	</div>
        </div>


       	<div class="e_date">
        	<div class="container">
            	<div class="col-sm-6">
                	<div class="event_date">
                    <img src="<?php echo base_url(); ?>images/18.png" alt="img" />
                <h2>Date</h2>
                    <span><?php echo (date('d-m-Y',(strtotime(substr($event['eventstarttime'],0,10))))); ?></span>
                    </div>
                </div>
                <?php if($event['eventlocation'] != "") { ?>
                <div class="col-sm-6">
                	<div class="event_date">
                    <img src="<?php echo base_url(); ?>images/19.png" alt="img" />
                <h2>Location</h2>
                    <address><?php echo $event['eventlocation'] ?></address>
                    </div>
                </div>
                <?php } ?>
            
            </div>
        </div>
  
        <div class="description">
        	<div class="container">
            
            <div class="d_concept">
            <h2>Description</h2>
            <p><?php echo $event['eventdescription'] ?></p>
            </div>
            
            </div>
        </div>
<?php } ?>           
        
<?php echo $footer ?>