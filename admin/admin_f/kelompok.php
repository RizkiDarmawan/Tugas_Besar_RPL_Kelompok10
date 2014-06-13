			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li>Mentoring</li>	 
					 <li class="active">Kelompok</li>	 
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
					<a href="#kelompok" onclick="p_kelompok.refreshtable('kelompok')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Data Kelompok
					</a>
				</li>
                <li>
					<a href="#automatic" onclick="p_kelompok.refreshtable('kelompok')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Automatic
					</a>
				</li>
                <li>
					<a href="#manual" onclick="p_kelompok.refreshtable('kelompok')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Manual
					</a>
				</li>
				
			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-12 col-sm-9">
						<div class="tab-content fadeInDown animation-delay1">
						
<!-- OVER VIEW ============================================================================================================= OVER VIEW -->					       <div class="tab-pane fade in active fadeInDown animation-delay1" id="overview">
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-comment"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty9">58</div>
									 <div class="title">Mentor Ikhwan</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-user"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty11">58</div>
									 <div class="title">Mente Ikhwan</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-group"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty13">41</div>
									 <div class="title">Klompk Ikhwan</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-comment"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty10">58</div>
									 <div class="title">Mentor Akhwat</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-user"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty12">58</div>
									 <div class="title">Mente Akhwat</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-group"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty14">41</div>
									 <div class="title">Klompk Akhwat</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
				            </div><!-- /tab1 -->
						
<!-- DATA KELOMPOK ============================================================================================================================================ DATA KELOMPOK -->			
                       <div class="tab-pane fade fadeInDown animation-delay1" id="kelompok">
							<div class="col-md-8">    
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data Kelompok
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="p_kelompok.refreshtable('kelompok');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="kelompok-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
                                            <form id="kelompok-searchform" method="post" onsubmit="return p_kelompok.searching('kelompok')">
											<div class="col-md-2">
                                                <input type="hidden" name="table" value="kelompok" />
                                                <input type="hidden" name="search" value="1" />
                                                <input type="hidden" name="p" value="1" />
                                                <select class="form-control input-sm" name="gender"><option value="">- Gender -</option>
                                                          <option value="L">Ikhwan</option>
                                                          <option value="P">Akhwat</option>
                                                </select>
                                            </div>
											<div class="col-md-3">
                                                <select class="form-control input-sm" id="fak1-option" name="id_fakultas" onchange="p_kelompok.generatejurusan(this.value,1)"><option value="">- Fakultas -</option>
                                                </select>
                                            </div>
											<div class="col-md-3">
                                                <select class="form-control input-sm" name="id_jurusan" id="jur1-option"><option value="">- Jurusan -</option>                              </select>
                                            </div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="kelompok-search">
							            		 	  <input type="text" name="text" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="submit" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
                                            </form>
										</div>
									    <div id="kelompok-tableinfo"></div>
										<div id="kelompok-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div>
							<div class="col-md-4">
							    <div id="portal_kelompok-table"></div>
							</div>
				        </div><!-- /tab1 -->
						
<!-- AUTOMATIC ======================================================================================================================== AUTOMATIC  -->						
							<div class="tab-pane fade" id="automatic">
								<div class="col-md-6">
                                    <div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return p_kelompok.quantitas(this);" id="kawasanautomatis" method="post">
										<div class="panel-heading">
											Membagi Kelompok Secara Automatic
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Gender</label>												
												<div class="col-md-10">
												    <select class="form-control input-sm" id="gen1" name="gender" onchange="p_kelompok.generatefakultas();" required><option value="">- Gender -</option>
                                                          <option value="L">Ikhwan</option>
                                                          <option value="P">Akhwat</option>
                                                    </select>
                                                </div>
												
                                            </div>
											<div class="form-group">
												<label class="control-label col-md-2">Fakultas</label>												
												<div class="col-md-10">
                                                    <select id="fak5-option" name="fakultas" required class="form-control" onchange="p_kelompok.generatejurusan(this.value,4);p_kelompok.generatementor(this.value,2,1);">
													</select>
												</div><!-- /.col -->
												
											</div><!-- /form-group -->
                                            <div class="form-group">
												<label class="control-label col-md-2">Jurusan</label>												
												<div class="col-md-10">
                                                    <select id="jur4-option" required name="jurusan" class="form-control">
                                                        <option value="">- pilih jurusan -</option>
													</select>
												</div><!-- /.col -->
												
											</div><!-- /form-group -->
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="kelompok-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" value="Pilih Kawasan" />
                                                        <button class="btn btn-sm btn-success" type="reset" onclick="p_kelompok.resetpage(\'kelompok\')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								    </div><!-- /panel -->
	
                                </div>
                                
                                
                                
                                
                                <div class="col-md-6 fadeInRight animation-delay1">
                                <div class="col-md-12 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
                                         <br />
									 <div class="title" id="qtym3">Kawasan Jurusan : Belum Dipilih</div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								
                                <div class="col-md-6 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-comment"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qtym2">0</div>
									 <div class="title">Mentor</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-6 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-user"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qtym1">0</div>
									 <div class="title">Mente</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-12 col-sm-4" id="tombolautomatis">
								
                                </div>
	
                                </div>
                                    
								
                                
                                
							</div><!-- /tab2 -->				
                            
<!-- MANUAL ============================================================================================================= MANUAL  -->						
							<div class="tab-pane fade" id="manual">
								<div class="col-md-12">
                                    <div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return p_kelompok.insert(this,'kelompok');" id="kelompok-form" method="post">
										<div class="panel-heading">
											Simpan Data Kelompok Baru
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Gender</label>												
												<div class="col-md-4">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="kelompok" />

													<input type="hidden" name="f1" value="id" />
													<input type="hidden" name="v1" value="" />
				
                                                    <input type="hidden" name="f2" value="gender" />
                                                    <select class="form-control input-sm" id="gen2" name="v2" onchange="p_kelompok.generatefakultas(); " required><option value="">- Gender -</option>
                                                          <option value="L">Ikhwan</option>
                                                          <option value="P">Akhwat</option>
                                                    </select>
                                                </div>
												<label class="control-label col-md-2">nama kelp</label>												
												<div class="col-md-4">
												    <input type="hidden" name="f3" value="nama" />
													<input type="text" name="v3" id="kelompok-focus" required class="form-control input-sm"  placeholder="exp : unggulan si" value="">
												</div><!-- /.col -->

                                            </div>
											<div class="form-group">
												<label class="control-label col-md-2">Fakultas</label>												
												<div class="col-md-4">
                                                    <select name="v7" id="fak2-option" required class="form-control" onchange="p_kelompok.generatejurusan(this.value,2);p_kelompok.generatementor(this.value,1,2);">
													</select>
												</div><!-- /.col -->
												<label class="control-label col-md-2">Mentor</label>
												<div class="col-md-4">
												    <input type="hidden" name="f4" value="mentor" />
												    <select name="v4" id="men1-option" required class="form-control">
                                                        <option value="">- pilih mentor -</option>
													</select>
											    </div>

											</div><!-- /form-group -->
                                            <div class="form-group">
												<label class="control-label col-md-2">Jurusan</label>												
												<div class="col-md-4">
												    <input type="hidden" name="f5" value="id_jurusan" />
                                                    <select name="v5" id="jur2-option" required class="form-control">
                                                        <option value="">- pilih jurusan -</option>
													</select>
												</div><!-- /.col -->
												
											</div><!-- /form-group -->
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="kelompok-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="kelompok-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="p_kelompok.resetpage(\'kelompok\')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								    </div><!-- /panel -->
	
                                    
                                    
                                    <div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data Kelompok
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="p_kelompok.refreshtable('kelompok');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="kelompok-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
                                            <form id="kelompok-searchform" method="post" onsubmit="return p_kelompok.searching('kelompok')">
											<div class="col-md-2">
                                                <input type="hidden" name="table" value="kelompok" />
                                                <input type="hidden" name="search" value="1" />
                                                <input type="hidden" name="p" value="1" />
                                                <select class="form-control input-sm" id="gen3" name="gender" onchange="p_kelompok.generatefakultas();p_kelompok.generatejurusan(this.value,3);p_kelompok.refreshtable3('kelmente-'+this.value,1);p_kelompok.generatekelompok(this.value,1,3);p_kelompok.refreshtable3('mentesel-'+this.value+'-'+3,1);idceklis.length=0;"><option value="">- Gender -</option>
                                                          <option value="L">Ikhwan</option>
                                                          <option value="P">Akhwat</option>
                                                </select>
                                            </div>
											<div class="col-md-3">
                                                <select class="form-control input-sm" id="fak4-option" onchange="p_kelompok.generatejurusan(this.value,3);"><option value="">- Fakultas -</option>
                                                </select>
                                            </div>
											<div class="col-md-3">
                                                <select class="form-control input-sm" id="jur3-option" onchange="p_kelompok.generatekelompok(this.value,1,3); p_kelompok.refreshtable3('mentesel-'+this.value+'-'+3,1);idceklis.length=0;"><option value="">- Jurusan -</option>
                                                </select>
                                            </div>
											<div class="col-md-2">
											    <select class="form-control input-sm" id="kel1-option" onchange="p_kelompok.refreshtable3('kelmente-'+this.value,1);"><option value="">- Kelompok -</option>
                                                </select>
											</div>
                                            <div class="col-md-2">
                                                    <div class="text-right">
												        <button class="btn btn-sm btn-reset" type="reset" onclick="p_kelompok.resetpage(\'kelompok\')">Reset</button>
											        </div>
											</div>
                                            
                                            </form>

									        <br /><br /><br />
                                            <div class="col-md-6 col-ms-6"> 
                                                <div id="kelmente-table" >
                                                </div>
                                    	    
                                    	    </div>
                                            <div class="col-md-6 col-ms-6">
                                                <div class="col-md-5"></div>
                                                <div class="text-right col-md-7" id="mentesel-search">
                                                    <input type="text" placeholder="search" onkeyup="textsearch=this.value; p_kelompok.refreshtable3('mentesel-'+idjurusan+'-'+3,1);" class="form-control input-sm" />
                                                </div><br /><br /><br />
                                                    
        
                                    	        <div id="mentesel-table" ></div>
                                                
                                            </div>
                                    
                                    </div>
                                        </div>
                                    
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								
                                </div><!-- /.col -->
    
                                <div class="col-md-0">
                                    <div id="manual-generate"></div>

                                    
                                
								</div><!-- /.col -->
								
                                
                                
                                
                                
                                
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
