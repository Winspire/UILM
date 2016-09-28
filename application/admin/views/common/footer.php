<div class="footer">
            <div class="container">
                <b class="copyright">&copy; <?php echo date('Y').'&nbsp'.$sitename ?> - Developed by Winspire Web Solution </b>
            </div>
        </div>
        <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('scripts/flot/jquery.flot.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('scripts/flot/jquery.flot.resize.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('scripts/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('scripts/bootbox.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('scripts/common.js'); ?>" type="text/javascript"></script>
                <script>
$(document).ready (function(){

 setTimeout(function(){ $(".alert").fadeOut('slow'); }, 2000);
 });
 </script>  
        <script>
            function confirm_dialog()
            {
                    bootbox.confirm("Are you sure?", function(result) {
                    Example.show("Confirm result: "+result);
                    }); 
		
            }
		$(document).ready(function() {
               
                	$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
