<?php
ob_start();
session_start();
if(!$_SESSION['lmai_login_admin']){
    header('location:../login.php');
    exit();
}
?>			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li>Mentoring</li>	 
					 <li class="active">Mentor</li>	 
				</ul>
			</div><!--breadcrumb-->
			<ul class="tab-bar grey-tab" id="tabbar">
				<li class="active">
					<a href="#overview" onclick="" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview
					</a>
				</li>
				<li>
					<a href="#mentor" onclick="data_mentor.refreshtable('mentor')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Detail mentor
					</a>
				</li>
				<li>
					<a href="#rekap_mentor" onclick="data_master.generatefakultas()" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-save fa-2x"></i> 
						</span>
						Rekap Data Mentor
					</a>
				</li>

				
			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-12 col-sm-9">
						<div class="tab-content fadeInDown animation-delay1">
						
<!-- DATA mentor =================================================================================================== DATA mentor -->						
                            <div class="tab-pane fade in active fadeInDown animation-delay1" id="overview">
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data mentor
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_mentor.refreshtable('mentor');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="mentor-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
                                            <form id="mentor-searchform" method="post" onsubmit="return data_mentor.searching('mentor')">
                                            <div class="col-md-2">  
                                                <select class="form-control input-sm" name="gender"><option value="">- Gender -</option>
                                                          <option value="L">ikhwan</option>
                                                          <option value="P">akhwat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" name="table" value="mentor" />
                                                <input type="hidden" name="search" value="1" />
                                                <input type="hidden" name="p" value="1" />
                                                <select class="form-control input-sm" name="gol_dar"><option value="">- Gol Darah -</option>
                                                          <option value="O">O</option>
                                                          <option value="A">A</option>
                                                          <option value="B">B</option>
                                                          <option value="AB">AB</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
                                                <select class="form-control input-sm" name="ppm"><option value="">- PPM -</option>
                                                          <option value="y">Sudah</option>
                                                          <option value="t">belum</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
                                                <select class="form-control input-sm" name="sm"><option value="">- sm -</option>
                                                          <option value="y">sudah</option>
                                                          <option value="t">belum</option>
                                                </select>
                                            </div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="mentor-search">
							            		 	  <input type="text" name="text" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="submit" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
                                            </form>
										</div>
									    <div id="mentor-tableinfo"></div>
										<div id="mentor-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								
				            </div><!-- /tab1 -->
                            
<!-- DETAIL mentor ========================================================================================================= DETAIL mentor -->						
							<div class="tab-pane fade" id="mentor">
																<div class="col-md-6">
										<div class="panel panel-default fadeInDown animation-delay2">
											<div class="panel-heading">
												<i class="fa fa-twitter"></i> Detail Data
											</div>
											<style>#profil-report .badge-info{width:100%; padding:10px; border-radius:0 10px 0 10px;}</style>
											<ul class="list-group" id="profil-report"> 
												<li class="list-group-item"> 
													<p>nama lengkap : <br /><a class="badge badge-info profil-nama"></a> </p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> &nbsp; gender : <a class="badge badge-success profil-gender"></a> 
														, golongan darah : <a class="badge badge-success profil-golongan_darah"></a>
													</small>
												</li>
												<li class="list-group-item"> 
													<p>email : <br /><a class="badge badge-info profil-email" ></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>phone / telp : <br /><a class="badge badge-info profil-hp" ></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>no BP / NIM : <br /><a class="badge badge-info profil-id" ></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>alamat : <br /><a class="badge badge-info profil-alamat" ></a> </p> 
												</li>
												  
												 
											</ul><!-- /list-group -->
										</div><!-- /panel -->
									</div><!-- /.col -->
									<div class="col-md-6">
										<div class="panel panel-overview fadeInUp animation-delay5" id="contr1">
								        </div>
										<div class="panel panel-overview fadeInUp animation-delay6" id="contr2">
										</div>
									</div><!-- /.col -->

							</div><!-- /tab2 -->				
<!-- DATA mentor =================================================================================================== DATA mentor -->						
                            <div class="tab-pane fade fadeInDown animation-delay1" id="rekap_mentor">
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data mentor
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_mentor.refreshtable('mentor');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="mentor-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
                                            <form id="mentor-searchform" method="get" target="_blank" action="../../lib/pdfClass.php">
                                            <div class="col-md-2">  
                                                <select class="form-control input-sm" name="gender"><option value="">- Gender -</option>
                                                          <option value="L">ikhwan</option>
                                                          <option value="P">akhwat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control input-sm" name="gol_dar"><option value="">- Gol Darah -</option>
                                                          <option value="O">O</option>
                                                          <option value="A">A</option>
                                                          <option value="B">B</option>
                                                          <option value="AB">AB</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
                                                <select class="form-control input-sm" name="ppm"><option value="">- PPM -</option>
                                                          <option value="y">Sudah</option>
                                                          <option value="t">belum</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
                                                <select class="form-control input-sm" name="sm"><option value="">- sm -</option>
                                                          <option value="y">sudah</option>
                                                          <option value="t">belum</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
                                                <select class="form-control input-sm" name="fakultas" onchange="data_master.generatejurusan(this.value,1)" id="fak1-option">
												    <option value="">- Fakultas -</option>
                                                </select>
                                            </div>

											<div class="col-md-2">
                                                <select class="form-control input-sm" name="jurusan" id="jur1-option">
												     <option value="">- Jurusan -</option>
                                                </select>
                                            </div>
											
											<br /><br /><br /><br /><br /><br />
											<div class="col-md-12">
												 <div class="input-group text-center" style="z-index:0; margin-bottom:10px;">
							            			  <div class="input-group-btn"><button type="submit" name="mentor" class="btn btn-lg btn-success" tabindex="-1">Rekap To PDF</button></div>
							        			 </div>
											</div>
                                                                                        </form>
										</div>
									    <div id="mentor-tableinfo"></div>
										<div id="mentor-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								
				            </div><!-- /tab1 -->

<!-- END ================================================================================================================================================ END -->







						</div><!-- /tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->			
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../../plugin/js/jquery-1.10.2.min.js"></script>
	
	<!-- Datatable -->
	<script src='../../lib/mylibrary.js'></script>	
	
	<!-- Bootstrap -->
    <script src="../../plugin/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Datatable -->
	<script src='../../plugin/js/jquery.dataTables.min.js'></script>	
	
   
	<!-- holder -->
	<script src='../../plugin/js/uncompressed/holder.js'></script>
	
	<!-- Modernizr -->
	<script src='../../plugin/js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='../../plugin/js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='../../plugin/js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='../../plugin/js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='../../plugin/js/jquery.cookie.min.js'></script>
	
	<!-- Endless -->
	<script src="../../plugin/js/endless/endless.js"></script>
	
  </body>
</html>
