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

                                              <?php if( $this->session->flashdata('success') ) { ?>
                <div class="alert alert-success">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong><?php echo $this->session->flashdata('success');?></strong>
</div>
    <?php } ?>
    <?php if( $this->session->flashdata('error') ) { ?>
                <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo $this->session->flashdata('error');?></strong></div>
                
        <?php } ?>

						<div class="module">
							<div class="module-head">
                                                            <h3>Gallery <a class="btn btn-primary pull-right" href="<?php echo base_url('gallerybrochure/add'); ?>" title="Add Gallery">Add Brochure</a></h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Brochure PDF</th>
                                                                                        <th>Brochure IMAGE</th>
                                                                                        <th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php for($i=0;$i<count($gallerys);$i++) { ?>
                                                                            <?php
                                                                            //print_r($gallerys[$i]['brochure_images']);
                                                                            //exit();
                                                                            if($gallerys[$i]['gallerybrochure'] != "" || $gallerys[$i]['brochure_images'] != "")
                                                                            {
                                                                            ?>
										<tr class="odd gradeX">
                                                                                    <td><?php echo $i+1; ?></td>
                                                                                    
                                                                                    <?php if($gallerys[$i]['gallerybrochure'] != "") { ?>
                                                                                    <td><a href="<?php echo base_url($this->config->item('brochure_main').$gallerys[$i]['gallerybrochure']); ?>"><?php echo $gallerys[$i]['gallerybrochure'] ?></a> </td>
                                                                                    <?php } else { ?>
                                                                                    <td></td>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if($gallerys[$i]['brochure_images'] != "") { 
                                                                                        $image=explode(',',$gallerys[$i]['brochure_images']);
                                                                                        //echo $image[2];
                                                                                        ?>
                                                                                    <td><img src="<?php echo $this->config->item('gallery_main_image').$image[0] ?>" height="50px" width="50px" /> </td>
                                                                                    <?php } else { ?>
                                                                                    <td></td>
                                                                                    <?php } ?>
                                                                                    
                                                                                    
                                                                                    <?php if($gallerys[$i]['status'] == 'Active'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('gallerybrochure/status/InActive/'.base64_encode($gallerys[$i]['galleryid'])) ?>" onclick="return confirm('Are you sure to InActive this gallery?');" class="btn btn-success" title="Click to In-Active">Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <?php if($gallerys[$i]['status'] == 'InActive'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('gallerybrochure/status/Active/'.base64_encode($gallerys[$i]['galleryid'])) ?>" onclick="return confirm('Are you sure to Active this gallery?');" class="btn btn-danger" title="Click To Active">In Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <td class="center">                                                                                         
                                                                                        <a href="<?php echo base_url('gallerybrochure/edit/'.base64_encode($gallerys[$i]['galleryid'])) ?>" title="Edit"><i class="icon-edit"></i></a>  
                                                                                        <a onClick="return confirm('Are you sure to Delete this record?');" href="<?php echo base_url('gallerybrochure/delete/'.base64_encode($gallerys[$i]['galleryid'])) ?>" title="Delete"><i class="icon-trash"></i></a></td>
										</tr>
                                                                            <?php } } ?>
                                                                        </tbody>
									<tfoot>
										<tr>
                                                                                    <th colspan="6">Legends: <i class="icon-edit"></i>-Edit <i class="icon-trash"></i>-Delete</th>
											
										</tr>
									</tfoot>
								</table>
							</div>
						</div><!--/.module-->

					<br />
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<?php echo $footer; ?>
        
</body>