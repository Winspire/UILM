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
							
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											
											<th>Name</th>
                                                                                        <th>Email</th>
                                                                                        <th>Contact No</th>
											<th>Message</th>
                                                                                        <th>Status</th>
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php for($i=0;$i<count($contactus);$i++) { ?>
										<tr class="odd gradeX">
                                                                                    <?php 
                                                                                        //$unique_id=$contactus[$i]['id'];
                                                                                        //$status=$contactus[$i]['status'];
                                                                                    ?>
                                                                                    <td><?php echo $contactus[$i]['contact_name']; ?></td>
                                                                                    <td><?php echo $contactus[$i]['contact_email']; ?></td>
                                                                                    <td><?php echo $contactus[$i]['contact_no']; ?></td>
                                                                                    <td><?php echo $contactus[$i]['contact_message']; ?></td>
                                                                                    <td>
                                                                                         <?php if ($contactus[$i]['status']=='pending') { ?>
                                                                                            <a href="#" data-toggle="modal" data-target="#change_status" onclick="change_status('<?php echo $contactus[$i]['id']; ?>','<?php echo $contactus[$i]['status']; ?>')" class="btn btn-warning" title="Change Status">
                                                                                                <?php echo $contactus[$i]['status']; ?>
                                                                                            </a>
                                                                                        <?php } elseif ($contactus[$i]['status']=='completed') { ?>
                                                                                            <a href="#" data-toggle="modal" data-target="#change_status" onclick="change_status('<?php echo $contactus[$i]['id']; ?>','<?php echo $contactus[$i]['status']; ?>')" class="btn btn-info" title="Change Status">
                                                                                                <?php echo $contactus[$i]['status']; ?>
                                                                                            </a>
                                                                                        <?php } else { ?>
                                                                                            <a href="#" data-toggle="modal" data-target="#change_status" onclick="change_status('<?php echo $contactus[$i]['id']; ?>','<?php echo $contactus[$i]['status']; ?>')" class="btn btn-primary" title="Change Status">
                                                                                                <?php echo $contactus[$i]['status']; ?>
                                                                                            </a>
                                                                                        <?php } ?>
                                                                                    </td>
										</tr>
                                                                            <?php } ?>
                                                                        </tbody>
									
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

<div class="modal fade" id="change_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 140px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="frm_title">Change Status</h4>
            </div>
            <?php echo form_open('contactus/change_status_accepted/' , array('method' => 'post', 'id' => 'change_status_frm', 'class' => 'form-horizontal row-border')); ?>
            <div class="modal-body">
                <input type="hidden" name="unique_id" id="unique_id" value="" />
                <div class="form-group">
                    <div class="col-md-10">

                        <?php // foreach ($status as $state){ ?>
                        <label class="radio">

                            <input type="radio" id="pending" value="pending" name="accepted_status" class="uniform"> Pending <br>
                            
                            <input type="radio" id="completed" value="completed" name="accepted_status" class="uniform"> Completed <br>
                            
                            <input type="radio" id="cancel" value="cancel" name="accepted_status" class="uniform"> Cancel <br>

                            
                        </label>
                     
                    </div>

                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    
    function change_status(id, status) {
        
        $('#unique_id').val(id);
        $('#'+status.replace(/ /g, "_")).attr('checked', 'checked');
        $('#'+status.replace(/ /g, "_")).parent().addClass('checked');
    }
    
    </script>