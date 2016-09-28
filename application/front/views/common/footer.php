	<!--detail-->
		<div class="details-section">
			<div class="container">
				<div class="details-grids">
					<div class="col-md-4 detail-grid">
						<div class="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt="img" /></a>
			  </div>
						<!--<p>Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.</p>-->
					</div>
					<div class="col-md-4 detail-grid">
						<ul>
							<li class="dot"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $sitedata[3]['settingvalue'] ?></li>
							<li class="mobile"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo $sitedata[2]['settingvalue'] ?></li>
							<li class="mes"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:<?php echo $sitedata[4]['settingvalue'] ?>"><?php echo $sitedata[4]['settingvalue'] ?></a></a></li>
                                                        <li class="sign"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span><a style="cursor: pointer"><?php echo $sitedata[0]['settingvalue'] ?></a></li>
						</ul>
					</div>
					<div class="col-md-4 detail-grid">
						<p><?php echo $page[1]['pageshortdescription'] ?></p>
					
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!--detail-->
	<!--footer-->
		<div class="footer-section">
						<div class="container">
							<div class="footer-top">
								<p> Powered By Universal Institute of Life Mastery.| Developed by <a href="http://winspirewebsolution.com" target="_blank">Winspirewebsolution</a></p>
									</div>
							<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				</div>
		</div>
</body>
</html> 