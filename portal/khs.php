<?php
ob_start();
session_start();	
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
}?>			<?php 	$lmai_id = $_SESSION['lmai_id']; $lmai_nama= $_SESSION['lmai_nama']; $lmai_jabatan=strtolower($_SESSION['lmai_jabatan']);  ?>
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li class="active">KHS</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" onclick="" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview KHS
					</a>
				</li>
			<?php if($lmai_jabatan=="mentor"){ ?>
				<li>
					<a href="#khs" onclick="portal.generatekelompok(<?php echo$lmai_id; ?>);" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Edit KHS
					</a>
				</li>
			<?php } ?>	
			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-12 col-sm-9">
						<div class="tab-content fadeInDown animation-delay1">
						
<!-- OVER VIEW ============================================================================================================= DATA MENTE -->						
                            <?php if ($lmai_jabatan=="mentor"){ ?>
							<div class="tab-pane fade in active fadeInDown animation-delay1" id="overview">
								<div class="panel panel-default table-responsive in active fadeInUp animation-delay1" >
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data Penilaian
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="portal.refresh_kelompok('overviewkhs','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="khs-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div id="overviewkhs-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								
				            </div><!-- /tab1 -->
                            <?php } ?>
<!-- KHS ========================================================================================================= DETAIL MENTE -->						
							<div class="tab-pane fade<?php if($lmai_jabatan=="mente")echo"in active"; ?> " id="khs">
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data Penilaian
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="portal.refresh_kelompok('khs','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="khs-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <?php if($lmai_jabatan=="mentor"){ ?>
									    <div class="col-md-4">
											<select onchange="portal.generatemente(this.value)" class="form-control" id="kel-option"><option value="">- Pilih Kelompok -</option></select>
										</div><div class="col-md-6">
											<select class="form-control" id="mente-option"  onchange="portal.refresh_kelompok('khs','<?php echo$lmai_jabatan; ?>',this.value);"><option value="">- Pilih Mente -</option></select>
										</div><br /><br /><br />
										<?php } ?>
									    <div id="khs-tableinfo"></div>
										<div id="khs-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->

							</div><!-- /tab2 -->				
								
				            
							</div>
						</div>
					</div>
			</div>	
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
	
	<script src="../lib/mylibrary.js"></script>
	
	<!-- Bootstrap -->
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
   
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
	
  </body>
</html>
