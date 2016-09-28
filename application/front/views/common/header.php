<!--
Author: W3layouts			sshs 
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <?php
    foreach($page as $current_page) {
        if(basename($_SERVER["REQUEST_URI"])==$current_page['pageurl']) {
            $title=$current_page['pagetitle'];
            $description=$current_page['pagemetadescription'];
            $keywords=$current_page['pagemetakeyword'];
        }
    }
    if(basename($_SERVER["REQUEST_URI"]) == 'uilm') {
        $title=$page[0]['pagetitle'];
        $description=$page[0]['pagemetadescription'];
        $keywords=$page[0]['pagemetakeyword'];
    }
    if(basename($_SERVER["REQUEST_URI"]) == 'product_service') {
        $title='product_service';
        $description='';
        $keywords='';
    }
    //echo basename($_SERVER["REQUEST_URI"]);
    ?>
<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="<?php echo base_url(); ?>images/universalfavicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $description ?>">
<meta name="keywords" content="<?php echo $keywords ?>">




<script type="<?php echo base_url(); ?>application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
<script src="<?php echo base_url(); ?>js/responsiveslides.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
	
  </script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<!--startsmothscrolling-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>
 <script type="<?php echo base_url(); ?>text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!--endsmothscrolling-->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/swipebox.css">
			<script src="<?php echo base_url(); ?>js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
					jQuery(".swipebox").swipebox();
					});
                                        
				</script>

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  
  
.error{
	color:red;

}
  </style>



</head>
<body>
    
		<!--start-header-section-->
	<div class="header">
    	<div class="top_header">
		<div class="container">
        	<div class="col-sm-4">
			<div class="header-top">
				<div class="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo1.png" alt="img" /></a>
			  </div>
			
				<div class="clearfix"></div>
			</div>
            </div>
            
          <div class="col-sm-5">
            <div class="decision">
            
            <img src="<?php echo base_url(); ?>images/14.png" alt="img" />
            </div>
          </div>
            
            <div class="col-sm-3">
            	<div class="social icon">
                <ul>
                    <li><a href="<?php echo $sem[0]['semvalue'] ?>" target="_blank" class="facebook"><img src="<?php echo base_url(); ?>images/11.png" alt="img" class="fb" /></a></li>
            	<li><a href="<?php echo $sem[1]['semvalue'] ?>" target="_blank" class="twiter"><img src="<?php echo base_url(); ?>images/12.png" alt="img" class="twitter" /></a></li>
                <li><a href="<?php echo $sem[2]['semvalue'] ?>" target="_blank" class="googleplus"><img src="<?php echo base_url(); ?>images/13.png" alt="img" class="g_plus" /></a></li>
                
            	
                </ul>
            </div>
            </div>
            
            </div>
            </div>
            </div>
          	
<div class="menu">
	<div class="container">            
            
<div id="navbar">    
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div>
            <?php // echo print_r($page); exit() ?>
      
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[0]['pageurl']) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo base_url(); ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
                    
                  
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[1]['pageurl'] || basename($_SERVER["REQUEST_URI"]) == $page[4]['pageurl'] || basename($_SERVER["REQUEST_URI"]) == $page[5]['pageurl']) {
                            echo 'class="dropdown active"';
                        }
                        else
                        {
                            echo ' class="dropdown" ';
                        }
                        ?>>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">

    About Us <b class="caret"></b></a> 
                      
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url().$page[1]['pageurl']; ?>"><?php echo $page[1]['pagetitle'] ?></a></li>
                            <li class=" dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mentor Profile</a>
								<ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url().$page[4]['pageurl']; ?>"><?php echo $page[4]['pagetitle'] ?></a></li>
									<li><a href="<?php echo base_url().$page[5]['pageurl']; ?>"><?php echo $page[5]['pagetitle'] ?></a></li>
									
                                                                      
								</ul>
							</li>
                          
                                                               
                        </ul>
                    </li>
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == 'product_service') {
                            echo 'class="dropdown active"';
                        }
                        else
                        {
                            echo 'class="dropdown"';
                        }
                        ?>><a href="#" class="dropdown-toggle" data-toggle="dropdown">Product & Services <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Workshop</a>
								<ul class="dropdown-menu">
                                    <li><a href="<?php  echo base_url()."product_service/".$page[15]['pageurl'] ?>">The Champion</a></li>
									<li><a href="<?php  echo base_url()."product_service/".$page[15]['pageurl'] ?>">The Winners</a></li>
									
								</ul>
							</li>
                            <li><a href="<?php  echo base_url()."product_service/".$page[16]['pageurl'] ?>">EAGLE</a></li>
                            <li><a href="<?php  echo base_url()."product_service/".$page[17]['pageurl'] ?>">Business Coaching</a></li>
                            <li><a href="<?php  echo base_url()."product_service/".$page[18]['pageurl'] ?>">Personal Coaching</a></li>
                            
                                                              
                        </ul>
                    </li>
                    
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[3]['pageurl']) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo base_url().$page[3]['pageurl']; ?>"><?php echo $page[3]['pagetitle'] ?></a></li>
                    
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[10]['pageurl'] || basename($_SERVER["REQUEST_URI"]) == $page[11]['pageurl'] || basename($_SERVER["REQUEST_URI"]) == $page[12]['pageurl']) {
                            echo 'class="dropdown active"';
                        }
                        else
                        {
                            echo ' class="dropdown" ';
                        }
                        ?>><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $page[6]['pagetitle'] ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          
                            <li><a href="<?php echo base_url().$page[6]['pageurl']."/".$page[10]['pageurl']; ?>"><?php echo $page[10]['pagetitle'] ?></a></li>
                            <li><a href="<?php echo base_url().$page[6]['pageurl']."/".$page[11]['pageurl']; ?>"><?php echo $page[11]['pagetitle'] ?></a></li>
                            <li><a href="<?php echo base_url().$page[6]['pageurl']."/".$page[12]['pageurl']; ?>"><?php echo $page[12]['pagetitle'] ?></a></li>
                            
                                                              
                        </ul>
                    </li>
                    
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[7]['pageurl']) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo base_url().$page[7]['pageurl']; ?>"><?php echo $page[7]['pagetitle'] ?> </a></li>
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[8]['pageurl']) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo base_url().$page[8]['pageurl']; ?>"><?php echo $page[8]['pagetitle'] ?></a></li>
                    <li <?php
                        if(basename($_SERVER["REQUEST_URI"]) == $page[9]['pageurl']) {
                            echo 'class="active"';
                        }
                        ?>><a href="<?php echo base_url().$page[9]['pageurl']; ?>"><?php echo $page[9]['pagetitle'] ?></a></li>
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>

</div>


</div>
   

		<!--end header-section-->
