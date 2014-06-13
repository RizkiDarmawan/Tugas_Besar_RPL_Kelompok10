<?php
ob_start();
session_start();	
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
}?><?php
   $a=new dbAkses();
   $data = $a->select("select * from gallery");

?>
		<div class="padding-md" >
				
            <div class="gallery-container">
				<?php
				for($i=0; $i<$a->baris; $i++){
				echo'<div class="gallery-item">
				  			
					<a class="image-wrapper gallery-zoom" href="../img/'.$data[$i][3].'">
						<img src="../img/'.$data[$i][3].'" alt="'.$data[$i][1].'">		
						<div class="image-overlay">
							<div class="image-info">
								<div class="h3">'.$data[$i][1].'</div>
								<span>'.$data[$i][2].'</span>
								<div class="image-time">2013-10-23</div>
								<div class="image-like">
									<i class="fa fa-heart"></i>
									45 Likes
								</div>
							</div>
						</div>	
					</a><!-- /image-wrapper -->
				</div><!-- /gallery-item -->';
				}
				?>
			</div><!-- /gallery-container -->
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="login.html">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../plugin/js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Colorbox -->
	<script src='../plugin/js/jquery.colorbox.min.js'></script>	

	<!-- Modernizr -->
	<script src='../plugin/js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='../plugin/js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='../plugin/js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='../plugin/js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='../plugin/js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="../plugin/js/endless/endless.js"></script>
	
	<script>
		$(function()	{
			//Colorbox 
			$('.gallery-zoom').colorbox({
				rel:'gallery',
				maxWidth:'90%',
				width:'800px'
			});
		});
	</script>
	
  </body>
</html>
	