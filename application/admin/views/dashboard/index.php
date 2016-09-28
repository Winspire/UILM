<!DOCTYPE html>
<html lang="en">
    <head>
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

                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert" type="button">×</button>
                                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo $this->session->flashdata('error'); ?></strong></div>

                            <?php } ?>
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="<?php echo base_url() . 'setting' ?>" class="btn-box big span4"><i class="icon-cog"></i><b></b>
                                        <p class="text-muted">
                                            Setting</p></a>
                                    </a><a href="<?php echo base_url() . 'sem' ?>" class="btn-box big span4"><i class="icon-facebook"></i><b></b>
                                        <p class="text-muted">
                                            Sem</p></a>
                                    </a><a href="<?php echo base_url() . 'seo' ?>" class="btn-box big span4"><i class="icon-bullhorn"></i><b></b>
                                        <p class="text-muted">
                                            Seo</p></a>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a href="<?php echo base_url() . 'page' ?>" class="btn-box big span4"><i class="icon-file-alt"></i><b><?php echo $pages_count; ?></b>
                                        <p class="text-muted">
                                            Pages</p></a>
                                    
                                    </a><a href="<?php echo base_url() . 'banner' ?>" class="btn-box big span4"><i class="icon-picture"></i><b><?php echo $banners_count; ?></b>
                                        <p class="text-muted">
                                            Banners</p></a>
                                    <a href="<?php echo base_url() . 'testimonial' ?>" class="btn-box big span4"><i class="icon-comments"></i><b><?php echo $testimonials_count; ?></b>
                                        <p class="text-muted">
                                            Testimonial</p></a>
                                    
                                </div>
                                <div class="btn-box-row row-fluid">                              
                                    <a href="<?php echo base_url() . 'galleryimage' ?>" class="btn-box big span4"><i class="icon-film"></i><b><?php echo $gallery_count; ?></b>
                                        <p class="text-muted">
                                            Gallery</p></a>
                                    <a href="<?php echo base_url() . 'event' ?>" class="btn-box big span4"><i class="icon-calendar"></i><b><?php echo $events_count; ?></b>
                                        <p class="text-muted">
                                            Seminars</p></a>
                                    <a href="<?php echo base_url() . 'inviteus' ?>" class="btn-box big span4"><i class="icon-envelope"></i><b><?php echo $invitation_count; ?></b>
                                        <p class="text-muted">
                                            Invitations</p></a>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <div class="btn-box-row row-fluid">                                                                  
                                    <a href="<?php echo base_url() . 'contactus' ?>" class="btn-box big span4"><i class="icon-inbox"></i><b><?php echo $inquiry_count; ?></b>
                                        <p class="text-muted">
                                            Inquires</p></a>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    
                                    </a>
                                    
                                    
                                </div>

                            </div>

                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>


                </div>
            </div><!--/.container-->
        </div><!--/.wrapper-->

        <?php echo $footer; ?>

    </body>