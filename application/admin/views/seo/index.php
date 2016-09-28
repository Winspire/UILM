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
								<h3>Seo</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Value</th>
											<th>Action</th>
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php for($i=0;$i<count($seos);$i++) { ?>
										<tr class="odd gradeX">
                                                                                    <td><?php echo $i+1; ?></td>
                                                                                    <td><?php echo $seos[$i]['seoname']; ?></td>
                                                                                    <td><?php echo $seos[$i]['seovalue']; ?></td>
                                                                                    <td class="center"> <a href="<?php echo base_url('seo/edit/'.base64_encode($seos[$i]['seoid'])) ?>"><i class="icon-edit"></i></a></td>
										</tr>
                                                                            <?php } ?>
                                                                        </tbody>
									<tfoot>
										<tr>
                                                                                    <th colspan="4">Legends: <i class="icon-edit"></i>-Edit</th>
											
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