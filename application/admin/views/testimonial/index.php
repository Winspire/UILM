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
                                                            <h3>Testimonial<?php echo anchor('testimonial/add','Add Testimonial',array('class' => "btn btn-primary pull-right",'title'=>'Add Testimonial')); ?></h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Image</th>
											<th>Client Name</th>
                                                                                        <th>Client's Profession</th>
                                                                                        <th>Text</th>
                                                                                        <th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php for($i=0;$i<count($testimonial);$i++) { ?>
										<tr class="odd gradeX">
                                                                                    <td><?php echo $i+1; ?></td>
                                                                                    <td><img src='<?php echo base_url($this->config->item('testimonial_thumb_image').$testimonial[$i]['clientimage']); ?>' title='<?php echo $testimonial[$i]['clientname'] ?>' alt='<?php echo $testimonial[$i]['clientname'] ?>' /></td>
                                                                                    <td><?php echo $testimonial[$i]['clientname']; ?></td>
                                                                                    <td><?php echo $testimonial[$i]['clientprofession']; ?></td>
                                                                                    <td><?php echo $testimonial[$i]['testimonialtext']; ?></td>
                                                                                     <?php if($testimonial[$i]['status'] == 'Active'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('testimonial/status/InActive/'.base64_encode($testimonial[$i]['testimonialid'])) ?>" class="btn btn-success" title="Click to In-Active">Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <?php if($testimonial[$i]['status'] == 'InActive'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('testimonial/status/Active/'.base64_encode($testimonial[$i]['testimonialid'])) ?>" class="btn btn-danger" title="Click to Active">In Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <td class="center"> 
                                                                                        <a href="<?php echo base_url('testimonial/view/'.base64_encode($testimonial[$i]['testimonialid'])) ?>" title="View"><i class="icon-search"></i></a> 
                                                                                        <a href="<?php echo base_url('testimonial/edit/'.base64_encode($testimonial[$i]['testimonialid'])) ?>" title="Edit"><i class="icon-edit"></i></a> 
                                                                                        <a onClick="return confirm('Are you sure to Delete this record?');" href="<?php echo base_url('testimonial/delete/'.base64_encode($testimonial[$i]['testimonialid'])) ?>" title="Delete"><i class="icon-trash"></i></a>
                                                                                    </td>
										</tr>
                                                                            <?php } ?>
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