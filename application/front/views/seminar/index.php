<?php  echo $header; 
      $event_path=$this->config->item('event_main_image');        
?>        
        <div class="container">
        <ol class="breadcrumb">
						<li><a href="<?php echo base_url().$page[0]['pageurl'] ?>"><?php echo $page[0]['pagetitle'] ?></a></li>
						<li class="active"><?php echo $page[3]['pagetitle'] ?></li>
					</ol>
        </div>

        <div class="seminar">
            <div class="container">
            	<div class="col-sm-3">
            	<div class="s_name">
                	<h2>Seminar</h2>
                    </div>
                </div>
                
<?php echo form_open('seminar/search', array('method' => 'post', 'id' => 'search_frm')); ?>     
                
              <div class="col-sm-3"></div>
              <div class="col-sm-4">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" name="search_keyword" class="form-control input-lg" value="<?php // echo $search_keyword; ?>" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" id="search_btn" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>


              
              </div>  
            
               <div class="col-sm-2">
               
  <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li><a href="<?php echo base_url('seminar/week/') ?>" id="week" style="cursor: pointer">This Week</a></li>
        <li><a href="<?php echo base_url('seminar/month/') ?>" id="month" style="cursor: pointer">This Month</a></li>
    </ul>
  </div>
       
               </div> 
              
                
                
            <div class="s_details" id="events">
                
                <?php foreach ($events_list as $event) { ?>
                
			<div class="col-md-4 new-grid" >
							<div class="new-inner">
								<h4><a href='<?php echo base_url()."seminardetail/index/".$event['eventurl'] ?>'><?php echo $event['eventtitle'] ?></a></h4>
                                                                <h5><?php echo (date('d-m-Y',(strtotime(substr($event['eventstarttime'],0,10))))); ?></h5>
                                                                <p><?php echo substr($event['eventdescription'], 0, 140)."..."; ?></p>
							</div>
                            <a href='<?php echo base_url()."seminardetail/index/".$event['eventurl'] ?>'><img alt="" class="img-responsive" src="<?php echo base_url().$event_path.$event['eventimage'] ?>"></a>	
						</div>
                <?php } 
                
                if($events_list[0]['eventurl'] == "") {
                    echo '<div class="col-md-12 new-grid">';
                    echo '<h4>No Data found. Please search using another keyword.</h4>';
                    echo '</div>';
                }
                
                ?>        
            
            </div>
              <?php echo form_close(); ?>        
                        <div class="row">
                            <div class="table-footer">

                                <div class="col-md-12">
                                    <!-- /pagination -->
                                    <?php if ($this->pagination->create_links()) { ?>
                                        <div class="pagination pull-right"> <?php echo $this->pagination->create_links(); ?> </div>
<?php } ?>
                                    <!-- /pagination -->
                                </div>
                            </div>
                        </div>
</div>        
        </div>
        
        </div>
<script type="text/javascript">

    $(document).ready(function () {
        
        $('#search_btn').click(function () {
            $('#search_frm').submit();
        });
        
    });
    
</script>
<?php echo $footer ?>