<?php
ob_start();
session_start();
if(!$_SESSION['lmai_login_admin']){
    header('location:../login.php');
    exit();
}
?>
			<div class="padding-md" >
				<div class="timeline-wrapper col-md-6">
					<div class="timeline-item timeline-start">
						<div class="panel bg-success">
							<div class="panel-body text-center">
								<div class="timeline-icon bg-success">
									<i class="fa fa-bell"></i>
								</div>
								<strong class="font-14">
									START
								</strong>
								<div class="time">
									Bakti Unand
								</div>
							</div>
						</div><!-- /panel -->
					</div><!-- /timeline-item -->
					<div id="timeline-table"></div>
					<div class="timeline-item clearfix">
						<div class="timeline-info">
							<div class="timeline-icon bg-grey">
								<i class="fa fa-pencil"></i>
							</div>
						</div>
					</div><!-- /timeline-item -->
				</div><!-- /timeline-wrapper -->
				
				
				<div class="col-md-6">
								<div class="panel-stat3 bg-info fadeInRight animation-delay1">
									 <h2 class="m-top-none" id="userCount"></h2>
									 <h4><a href="#" onclick="app.refreshtable('timeline')">REFRESH</a></h4>
									 <span style="font-size:20px;" class="m-left-xs"><i class="fa fa-arrow-circle-o-up fa-lg"></i> &nbsp; <span id="timeline-user"></span> &nbsp; Timeline</span>
									 <div class="stat-icon">
									 	  <i class="fa fa-user fa-3x"></i>
									 </div>
									 <div class="loading-overlay">
									 	  <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									 </div>
								</div>
								<div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'timeline');" id="timeline-form" method="post">
										<div class="panel-heading">
											Simpan Data TimeLine
										</div>
										<div class="panel-body">
										    <div class="form-group">
												<label class="control-label col-md-3">Icon</label>												
												<div class="col-md-9">
												    <input type="hidden" name="f2" value="icon" />
												    <select name="v2" required class="form-control">
													    <option value="">- pilih -</option>
														<option value="fa-briefcase">Briefcase</option>									
														<option value="fa-bell">Lonceng</option>
														<option value="fa-file-text-o">File</option>
														<option value="fa-clock-o">Jam</option>
														<option value="fa-picture-o">Picture</option>
														<option value="fa-comment">Comment</option>
														<option value="fa-plane">pesawat</option>
														<option value="fa-pencil">pencil</option>
													</select>
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Tanggal</label>												
												<div class="col-md-9">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="timeline" />

													<input type="hidden" name="f1" value="id" />
													<input type="hidden" name="v1" value="" />
													
												    <input type="hidden" name="f3" value="tanggal" />
													<input type="date" name="v3" required class="form-control input-sm" placeholder="exp : 3 nov 2014" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-3">Nama Kegiatan</label>												
												<div class="col-md-9">
													<input type="hidden" name="f4" value="nama" />
												    <input type="text" name="v4" required class="form-control input-sm" placeholder="exp : ujian " value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Prioritas</label>												
												<div class="col-md-9">
													<input type="hidden" name="f5" value="prioritas" />
													<select name="v5" required class="form-control">
													    <option value="">- pilih -</option>
														<option value="PENTING">Penting</option>
														<option value="WAJIB">Wajib</option>
														<option value="RECOMENDED">Rekomendasi</option>
														<option value="NEW">New</option>
														<option value="SUNNAH">Sunnah</option>
													</select>
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Time</label>												
												<div class="col-md-9">
													<input type="hidden" name="f6" value="time" />
												    <input type="text" name="v6" class="form-control input-sm" placeholder="13:00 s/d selesai" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Gambar</label>												
												<div class="col-md-9">
													<input type="hidden" name="f7" value="gambar" />
												    <input type="text" name="v7" class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Deskripsi</label>												
												<div class="col-md-9">
													<input type="hidden" name="f8" value="ket" />
													<textarea name="v8" class="form-control input-sm" id="v8";></textarea>
                                        		</div>
											</div>						
				
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="timeline-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="timeline-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('timeline')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
								
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
