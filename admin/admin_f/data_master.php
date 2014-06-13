			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i> Home</li>
					 <li>Data Master</li>	 
					 
				</ul>
			</div><!--breadcrumb-->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" onclick="data_master.quantitas()" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview
					</a>
				</li>
				<li>
					<a href="#jurusan" onclick="data_master.refreshtable('jurusan')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						jurusan
					</a>
				</li>

			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-12 col-sm-9">
						<div class="tab-content fadeInDown animation-delay1">
							<div class="tab-pane fade in active fadeInDown animation-delay1" id="overview">
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-bar-chart-o"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty1">58</div>
									 <div class="title">Fakultas</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-warning">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-bar-chart-o"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty2">58</div>
									 <div class="title">Jurusan</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-comment"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty3">41</div>
									 <div class="title">Penilaian</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-danger">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-shopping-cart"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty4">88</div>
									 <div class="title">Amalan Yaumi</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								
							</div><!-- /tab1 -->
<!-- jurusan ==================================================================================================================================== jurusan -->						
							<div class="tab-pane fade" id="jurusan">
								<div class="panel panel-default fadeInDown animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'jurusan');" id="jurusan-form" method="post">
										<div class="panel-heading">
											Master Data jurusan
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">jurusan</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="jurusan" />

												    <input type="hidden" name="f1" value="id" />
												    <input type="hidden" name="v1" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="jurusan-focus" required class="form-control input-sm" placeholder="Nama jurusan, exp : sistem informasi" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">fakultas</label>												
												<div class="col-md-10">
												    <input type="hidden" name="f3" value="id_fakultas" />
												    <select name="v3" id="fak1-option" required class="form-control">
													</select>
											    </div>
											</div>					
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="jurusan-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="jurusan-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('jurusan')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data jurusan
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('jurusan');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="jurusan-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-8"></div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="jurusan-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('jurusan')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="jurusan-tableinfo"></div>
										<div id="jurusan-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /tab2 -->

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
