<?php echo $header; ?>        
        <div class="container">
        <ol class="breadcrumb">
			<li><a href="http://wwsptech.com/designer/UILM/index.html">Home</a></li>
			<li class="active">Temp</li>
		</ol>
        </div>
        
	<div class="content">
		<!--gallery-->
		<div class="projects">
		<div class="container">
                    
			
			<div class="project-grids">
                            <?php 
//                            $i=0;
//                            //echo basename($_SERVER["REQUEST_URI"]);
//                            $videourl = "https://www.youtube.com/watch?v=FqJPOJbQbVI";
//                                        $url = filter_var($videourl, FILTER_SANITIZE_URL);
//        
//                                        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
//
//                                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $videourl, $matches);
//                                            $id = $matches[1];
                                        ?>
                                        <div class="col-md-4 project-grid">
                                                <div class="project-grd">
                                                    <!--<iframe width="100%" src="https://www.youtube.com/embed/<?php echo $id ?>" frameborder="0" allowfullscreen></iframe>-->
                                                    <iframe width="640" height="360" src="https://www.youtube.com/embed/FqJPOJbQbVI" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                        </div>
                                    
                                    
				
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>

	<!--//gallery-->

	</div>
<?php echo $footer; ?>