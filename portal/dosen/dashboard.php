			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="./?pg=dashboard"> Dashboard</a></li>	 
				</ul>
			</div><!--breadcrumb-->
			<div class="padding-md" >
				<span class="label label-info">PENGUMUMAN</span>
				<div class="alert-animated">
					<div class="alert-inner">
						<div class="alert-message">
							<table id="pengumuman">
                                <tr><?php $b= new dbAkses();
									$data=$b->select("select * from pengumuman where ket='pusat'")
									?>
                                <td style="padding:30px;">
                                   <i style="font-size:100px;" class="fa <?php echo$data[0][1]; ?>"></i>
                                </td>
                                <td style="text-align:left;">
                                    <?php echo$data[0][2]; ?>
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
				</div>
				
				
				
			</div><!-- /.padding -->
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
	<script src="../../plugin/js/jquery-1.10.2.min.js"></script>
	
	<script src="../../lib/mylibrary.js"></script>
	
	<!--Bootstrap-->
    <script src="../../plugin/bootstrap/js/bootstrap.min.js"></script>
  
	<!--Colorbox-->
	<script src='../../plugin/js/jquery.colorbox.min.js'></script>	
		
	<!-- Modernizr -->
	<script src='../../plugin/js/modernizr.min.js'></script>	
		
	<!-- Pace -->
	<script src='../../plugin/js/pace.min.js'></script>	
		
	<!-- Popup Overlay -->
	<script src='../../plugin/js/jquery.popupoverlay.min.js'></script>	
		
	<!-- Slimscroll -->
	<script src='../../plugin/js/jquery.slimscroll.min.js'></script>	
		
	<!--Cookie-->
	<script src='../../plugin/js/jquery.cookie.min.js'></script>

	<!--Endless-->
	<script src="../../plugin/js/endless/endless.js"></script>
	
	<script>
		$(function()	{
			//Timeline color box
			$('.timeline-img').colorbox({
				rel:'group1',
				width:"90%",
				maxWidth:'800px'
			});
		});
	</script>
	
  </body>
</html>
