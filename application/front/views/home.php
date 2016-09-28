<?php
echo $header;
$banner_path = $this->config->item('banner_main_image');
$event_path = $this->config->item('event_main_image');
$testimonial_path = $this->config->item('testimonial_main_image');
?>
<div class="banner">
    <div class="banner_img">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $first_banner = $banner_list[0]['bannerid'];
                $i = 0;
                foreach ($banner_list as $banner) {
                    if ($banner['bannerid'] == $first_banner) {
                        echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="active"></li>';
                    } else {

                        echo '<li data-target="#myCarousel" data-slide-to="' . $i . '"></li>';
                    }
                    $i++;
                }
                ?>

            </ol>


            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
<?php
foreach ($banner_list as $banner) {
    if ($banner['bannerid'] == $first_banner) {
        echo '<div class="item active">';
    } else {

        echo '<div class="item">';
    }
    ?>
                    <img src="<?php echo $banner_path . $banner['bannerimage'] ?>" alt="img" width="460" height="345">
                </div>

                <?php } ?>

        </div>


    </div>
</div>



<div class="slider_part">

    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
<?php
foreach ($saminar_list as $seminar) {
    //if($seminar['eventstarttime'] > date('Y-m-d H:i:s')) {
    ?>
                    <li>
                        <div class="caption-top">
                            <div class="caption" style="padding: 1em 1em;">
                                <a href="<?php echo base_url() . "seminardetail/index/" . $seminar['eventurl'] ?>"><image src="<?php echo $event_path . $seminar['eventimage'] ?>" width="40px" height="40px" /></a>
                                <a href="<?php echo base_url() . "seminardetail/index/" . $seminar['eventurl'] ?>"><p><?php echo $seminar['eventtitle'] ?>
                                        <br><?php echo (date('j/n/Y @ g:s a', (strtotime($seminar['eventstarttime'])))) ?> - <?php echo (date('j/n/Y @ g:s A', (strtotime($seminar['eventendtime'])))) ?>	</p></a>
                                <a class="morebtn hvr-sweep-to-right" href="<?php echo base_url() . $page[3]['pageurl']; ?>">View All Seminar</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
    <?php
    //} 
}
?>

            </ul>
        </div>
    </div>

</div>

</div>


<!--MARKETS SERVED -->
<div class="content">

    <!--newproject-->
    <div class="new-project">
        <div class="container">
            <div class="newproject-grids">
                <div class="col-md-6 newproject-grid">
                    <h3>Know more about UILM and video</h3>
                    <p><?php echo $aboutus_detail[0]['pagedescription'] ?>
                        <a href="<?php echo base_url() . $page[1]['pageurl']; ?>">Read more</a></p>

                </div>
<?php
$url = filter_var($sitedata[6]['settingvalue'], FILTER_SANITIZE_URL);

if (!filter_var($url, FILTER_VALIDATE_URL) === false) {

    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    $id = $matches[1];
    
    ?>
                    <div class="col-md-6 newproject-grid">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $id; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
<?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--newproject-->

    <!-- Product & services start -->

    <div class="feature">
        <div class="container">
            <h3>Product & services</h3>
            <div class="feature-grids">
                <div class="col-md-6 feature-grid">
                    <div class="abc">
                        <a href="<?php echo base_url() . "product_service/".$page[15]['pageurl'] ?>"><span class="imagess"><img src="images/7.png" alt="img" /></span></a>
                    </div>
                    <div class="feature-text new-inner">
                        <h4><a href="<?php echo base_url() . "product_service/".$page[15]['pageurl'] ?>">WORKSHOP</a></h4>
                        <p>Lorem ipsum dolor sit amet, coetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy varius penatibus et magnis.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 feature-grid feat1">
                    <div class="abc">
                        <a href="<?php echo base_url() . "product_service/".$page[16]['pageurl'] ?>"><span class="imagess"><img src="images/8.png" alt="img" /></span></a>
                    </div>
                    <div class="feature-text new-inner">
                        <h4><a href="<?php echo base_url() . "product_service/".$page[16]['pageurl'] ?>">EAGLE</a></h4>
                        <p>Lorem ipsum dolor sit amet, coetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy varius penatibus et magnis.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="feature-grids">
                <div class="col-md-6 feature-grid">
                    <div class="abc">
                        <a href="<?php echo base_url() . "product_service/".$page[17]['pageurl'] ?>"><span class="imagess"><img src="images/9.png" alt="img" /></span></a>
                    </div>
                    <div class="feature-text new-inner">
                        <h4><a href="<?php echo base_url() . "product_service/".$page[17]['pageurl'] ?>">BUSINESS COACHING</a></h4>
                        <p>Lorem ipsum dolor sit amet, coetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy varius penatibus et magnis.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 feature-grid feat1">
                    <div class="abc">
                        <a href="<?php echo base_url() . "product_service/".$page[18]['pageurl'] ?>"><span class="imagess"><img src="images/6.png" alt="img" /></span></a>
                    </div>
                    <div class="feature-text new-inner">
                        <h4><a href="<?php echo base_url() . "product_service/".$page[18]['pageurl'] ?>">PERSONAL COACHING</a></h4>
                        <p>Lorem ipsum dolor sit amet, coetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy varius penatibus et magnis.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="feature-grids">


                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Product & services end -->
    <!--Events-->

    <div class="news">
        <div class="container">
            <h3>Seminar</h3>
            <div class="news-grids">
<?php
foreach ($saminar_list as $seminar) {
    //      if($seminar['eventstarttime'] > date('Y-m-d H:i:s')) {
    ?>
                    <div class="col-md-4 new-grid">
                        <div class="new-inner">
                            <h4><a href="<?php echo base_url() . "seminardetail/index/" . $seminar['eventurl'] ?>"><?php echo $seminar['eventtitle'] ?></a></h4>
                            <h5><?php echo (date('d-m-Y', (strtotime(substr($seminar['eventstarttime'], 0, 10))))); ?></h5>
                            <p><?php echo substr($seminar['eventdescription'], 0, 140) . "..."; ?></p>
                        </div>
                        <a href="<?php echo base_url() . "seminardetail/index/" . $seminar['eventurl'] ?>"><img src="<?php echo base_url() . $event_path . $seminar['eventimage'] ?>" class="img-responsive" alt=""></a>	
                    </div>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--Events end-->

    <!-- testimonials -->
    <div class="testimonials">
        <div class="container">
            <h3>Testimonials</h3>
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $i = 0;
                        foreach ($testimonial_list as $testimonial) {
                            if (!filter_var($testimonial['testimonialtext'], FILTER_VALIDATE_URL) === true) {
                                ?>

                                <?php
                                if ($i % 2 == 0) {
                                    echo '<li><div class="testimonials-grid">';
                                }
                                ?>


                                <div class="col-md-6 testimonials-grid-left">
                                    <div class="testimonials-grid-left1">
                                        <img src="<?php echo $testimonial_path . $testimonial['clientimage'] ?>" alt="" class="img-responsive" />
                                    </div>
                                    <div class="testimonials-grid-right1">
                                        <p><span><?php echo substr($testimonial['testimonialtext'], 0, 1) ?></span><?php echo substr($testimonial['testimonialtext'], 1, 140) ?></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
        <?php
        if ($i % 2 != 0) {
            echo '</div></li>';
        }
        $i++;
        ?>        

                            <?php }
                        } ?>
                    </ul>
                </div>
            </section>
            <!--FlexSlider-->
            <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
            <script defer src="js/jquery.flexslider.js"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function (slider) {
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!--End-slider-script-->
        </div>
    </div>
    <!-- //testimonials -->
    <!--Completed workshop start-->
    <div class="marketsserved">
        <div class="container">
            <h2>Completed workshop</h2>
            <div class="market-grids">
                <?php
                foreach ($workshop_list as $workshop) {
                    //      if($workshop['eventstarttime'] > date('Y-m-d H:i:s')) {
                    ?>
                    <div class="col-md-4 market-grid new-inner">
                        <a href="<?php echo base_url() . "seminardetail/index/" . $workshop['eventurl'] ?>"><img src="<?php echo base_url() . $event_path . $workshop['eventimage'] ?>" class="img-responsive" alt=""></a>
                        <h4 class=""><a href="<?php echo base_url() . "seminardetail/index/" . $workshop['eventurl'] ?>"><?php echo $workshop['eventtitle'] ?></a></h4>
                        <p><?php echo substr($workshop['eventdescription'], 0, 144) ?></p>
                    </div>
                    <?php }
                ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--Completed workshop end -->


</div>
<?php echo $footer ?>