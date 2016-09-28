<?php echo $header; 
      $image_path=$this->config->item('testimonial_main_image');          
        ?>        
        <div class="container">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
			<li class="active"><?php echo $page[7]['pagetitle'] ?></li>
		</ol>
        </div>
        

<div class="t_videos">

<div class="container">
	
    <div class="testimonial">
    <h2><?php echo $page[7]['pagetitle'] ?></h2>
    </div>
<?php
    foreach($testimonials_list as $testimonials)
    {
        $url = filter_var($testimonials['testimonialtext'], FILTER_SANITIZE_URL);
        
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $testimonials['testimonialtext'], $matches);
            $id = $matches[1];
    
?>	        
	<div class="col-sm-3">
            <div class="video">
                <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $id ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
<?php 
            }
    }
    ?>

                
    </div>        
</div>

<div class="col-sm-12"><hr></div>

<div class="testimonial_part">
<div class="container">
	<div class="t_part">

<?php
$i=0;
    foreach($testimonials_list as $testimonials)
    {
        if (!filter_var($testimonials['testimonialtext'], FILTER_VALIDATE_URL) === true) {
            if($i % 2 == 0)
            {
                echo '<div class="col-sm-12">';
            }
?>
            <div class="col-sm-6">
        
        <div class="col-sm-3">
        <div class="t_image">
        <img src="<?php echo $image_path.$testimonials['clientimage'] ?>" alt="img" />
        </div>
        </div>
        
        <div class="col-sm-9">
        <div class="t_part">
        
        <p><?php echo $testimonials['testimonialtext'] ?></p>
        <h3><?php echo $testimonials['clientname'] ?></h3>
        <span><?php echo $testimonials['clientprofession'] ?></span>
        
        </div>
        </div>
        
    	</div>
<?php 
            if($i % 2 != 0)
            {
                echo '</div>';
            }
        $i++;
        }
    }
?>

	
    </div>
</div>        
</div>        
<?php echo $footer ?>        