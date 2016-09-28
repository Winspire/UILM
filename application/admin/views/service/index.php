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
                                                            <h3>Services<?php echo anchor('service/add','Add Service',array('class' => "btn btn-primary pull-right",'title'=>'Add Service')); ?></h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Image</th>
											<th>Title</th>
                                                                                        <th>Description</th>
                                                                                        <th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php for($i=0;$i<count($services);$i++) { ?>
										<tr class="odd gradeX">
                                                                                    <td><?php echo $i+1; ?></td>
                                                                                    <td><img src='<?php echo base_url($this->config->item('service_thumb_image').$services[$i]['serviceimage']); ?>' title='<?php echo $services[$i]['servicetitle'] ?>' alt='<?php echo $services[$i]['servicetitle'] ?>' /></td>
                                                                                    <td><?php echo $services[$i]['servicetitle']; ?></td>
                                                                                    <td><?php echo $services[$i]['serviceshortdescription']; ?></td>
                                                                                     <?php if($services[$i]['status'] == 'Active'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('service/status/InActive/'.base64_encode($services[$i]['serviceid'])) ?>" class="btn btn-success" title="Click to In-Active">Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <?php if($services[$i]['status'] == 'InActive'){?>
                                                                                    <td class="center"> <a href="<?php echo base_url('service/status/Active/'.base64_encode($services[$i]['serviceid'])) ?>" class="btn btn-danger" title="Click to Active">In Active</a> </td>
                                                                                    <?php } ?>
                                                                                    <td class="center"> 
                                                                                        <a href="<?php echo base_url('service/view/'.base64_encode($services[$i]['serviceid'])) ?>" title="View"><i class="icon-search"></i></a> 
                                                                                        <a href="<?php echo base_url('service/edit/'.base64_encode($services[$i]['serviceid'])) ?>" title="Edit"><i class="icon-edit"></i></a> 
                                                                                        <a onClick="return confirm('Are you sure to Delete this record?');" href="<?php echo base_url('service/delete/'.base64_encode($services[$i]['serviceid'])) ?>" title="Delete"><i class="icon-trash"></i></a>
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