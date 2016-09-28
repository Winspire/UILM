<?php echo $header;
        $gallery_path=$this->config->item('gallery_main_image');    
        $brochure_path=$this->config->item('brochure_main');
       
?>        
        <div class="container">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
			<li class="active"><?php echo $page[6]['pagetitle'] ?></li>
		</ol>
        </div>
        
        
	<div class="content">
		<!--gallery-->
		<div class="projects">
		<div class="container">
                    <?php
                    if(basename($_SERVER["REQUEST_URI"]) == $page[10]['pageurl']) {
                            echo '<h2>'.$page[10]['pagetitle'].'</h2>';
                        }
                    if(basename($_SERVER["REQUEST_URI"]) == $page[11]['pageurl']) {
                            echo '<h2>'.$page[11]['pagetitle'].'</h2>';
                        }
                    if(basename($_SERVER["REQUEST_URI"]) == $page[12]['pageurl']) {
                            echo '<h2>'.$page[12]['pagetitle'].'</h2>';
                        }
                    ?>
			
			<div class="project-grids">
                            <?php 
                            $i=0;
                            //echo basename($_SERVER["REQUEST_URI"]);
                            foreach($gallery_list as $gallery) { 
                                    if(basename($_SERVER["REQUEST_URI"]) == "image" ) {
                                ?>
                                        <div class="col-md-4 project-grid">
                                                <div class="project-grd">
                                                 <a class="swipebox" href="<?php echo $gallery_path.$gallery['galleryimage'] ?>" ><img src="<?php echo $gallery_path.$gallery['galleryimage'] ?>" class="img-style row6" alt=""><span class="zoom-icon"></span></a>
                                                </div>
                                        </div>
                                    <?php } 
                                    if(basename($_SERVER["REQUEST_URI"]) == "video") { 
                                        $url = filter_var($gallery['galleryvideo'], FILTER_SANITIZE_URL);
        
                                        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {

                                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $gallery['galleryvideo'], $matches);
                                            $id = $matches[1];
                                        ?>
                                        <div class="col-md-4 project-grid">
                                                <div class="project-grd">
                                                    <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $id ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                        </div>
                                    <?php } }
                                    if(basename($_SERVER["REQUEST_URI"]) == "brochure" && ($gallery['gallerybrochure'] !="" || $gallery['brochure_images'] !="")) { ?>
                                        <div class="col-md-4 project-grid"> 
                                                <div class="project-grd new-inner">
                                                    <h4>
                                                 <a href="<?php echo base_url('gallery/brochure')."/".$gallery['galleryid'] ?>" >
                                                     <img src="<?php echo base_url('images/brochure-icon-250.png') ?>" class="img-style row6" style="width: 40%" alt="">
                                                     Brochure - <?php echo ++$i; ?>
                                                 </a>
                                                    </h4>
                                                </div>
                                        </div>
                                    <?php } } ?>
                            <?php if(basename($_SERVER["REQUEST_URI"]) == $gallery_detail[0]['galleryid']) { 
                                    if($gallery_detail[0]['brochure_images'] != "") {
                                $images=explode(',',$gallery_detail[0]['brochure_images']);
                                foreach($images as $image) {
                                ?>
                                    <div class="col-md-4 project-grid">
                                                <div class="project-grd">
                                                 <a class="swipebox" href="<?php echo "../".$gallery_path.$image ?>" ><img src="<?php echo "../".$gallery_path.$image ?>" class="img-style row6" alt=""><span class="zoom-icon"></span></a>
                                                </div>
                                    </div>
                            <?php } } if($gallery_detail[0]['gallerybrochure'] != "") { ?>
                            <div class="col-md-12 project-grid">
                                                <div class="project-grd new-inner">
                                                    <h4><a href="<?php echo "../".$brochure_path.$gallery_detail[0]['gallerybrochure'] ?>" ><?php echo "Download Brochure" ?></a></h4>
                                                </div>
                                    </div>
                            <?php } } ?>
				
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>

	<!--//gallery-->

	</div>
<?php echo $footer ?>