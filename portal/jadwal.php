<?php
ob_start();
session_start();	
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
}?>	<?php 	$lmai_id = $_SESSION['lmai_id']; $lmai_nama= $_SESSION['lmai_nama']; $lmai_jabatan=strtolower($_SESSION['lmai_jabatan']);  ?>
	<!-- Jquery -->
	<script src="../plugin/js/jquery-1.10.2.min.js"></script>
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li class="active">Jadwal</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" onclick="" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview Jadwal
					</a>
				</li>
				<li>
					<a href="#m_kuliah" onclick="portal.refresh_mkuliah('m_kuliah','<?php echo$lmai_id; ?>')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Edit Jadwal Kuliah Anda
					</a>
				</li>
			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-4 col-sm-3">
						
						<div class="panel panel-default table-responsive fadeInUp animation-delay1">
								<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Jadwal Kuliah Anda
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="portal.refresh_mkuliah('m_kuliah','<?php echo$lmai_id; ?>');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="m_kuliah-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div id="m_kuliah-tableinfo"></div>
										<div id="m_kuliah-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
						 </div><!-- /panel -->

					</div><!-- /.col -->
					<div class="col-md-8 col-sm-9">
   						<div class="tab-content fadeInDown animation-delay1">

   						<div class="tab-pane fade  in active" id="overview">
						    <div class="panel panel-default fadeInDown animation-delay1">
								 <div class="panel-heading">
								 	  Jadwal Alternatif Untuk Anda Mentoring
									  <ul class="tool-bar">
									   	    <li><a href="#" onclick="portal.refresh_kelompok('jadwal_alternatif','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
									  </ul>
									  <a href="#" style="display:none;" id="khs-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
								 </div>
								 <div class="panel-body">
								     <div id="jadwal_alternatif-table"></div>
								 </div>
								 <div class="loading-overlay">
									  <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
								 </div>
							</div>
						</div>
						
						<div class="tab-pane fade " id="m_kuliah">
							<div class="panel panel-default table-responsive fadeInDown animation-delay1">
								 <div class="panel-heading">
								 	  Jadwal Kuliah Anda
								 </div>
								 <div class="panel-body">
								 <table class="table table-bordered " id="responsiveTable">
									<thead>
                                    <style>.th{background:#7FAAFF; color:#fff;}</style>
								 	<tr class="th">
										<th>Hari</th>
									<?php
									//include('../lib/Class.php');
									$a = new dbAkses();
									$ab = new dbAkses();
									$shift =$a->select("select * from ket_shift");
									for($i=0; $i<$a->baris; $i++){
									    echo'<th style="text-align:center; background:#7FAAFF;">Shift '.($i+1).'</th>';
									}	
									$kuliah = new dbAkses();
                                    $kul=$kuliah->select("select id_jadwal_shift from m_kuliah where id_m='".$lmai_id."'");
									?>
									</tr>
									</thead>
									
									<tbody>
									<form class="form-horizontal form-border" onsubmit=" return portal.edit_profil(this,'m_kuliah'); " id="m_kuliah-form" method="post">
									<input type="hidden" name="table" value="m_kuliah" />
									<input type="hidden" name="id_m" value="<?php echo$lmai_id; ?>" />
								    <?php
									
                                    $data = $ab->select("select * from jadwal_shift,ket_shift where jadwal_shift.id_ket_shift = ket_shift.id order by jadwal_shift.id asc");
									$s=0;
									echo'<tr><th class="th">'.$data[0][2].'</th>';
									for($i=0; $i<$ab->baris; $i++){
									    $pem = $i+1;   
                                        $checked=false;
                                        $k=0; 
                                        while(($k<$kuliah->baris)&&($checked==false)){
                                            if($data[$i][0]==$kul[$k][0]){
                                                $checked=true;
                                            }
                                            $k++;
                                        }        
                                        if($checked==true){
									    ?>
                                        <td style="padding:20px; background:#FF5555;" id="sh<?php echo$pem; ?>"><label class="label-checkbox">
											<input type="checkbox" onClick="con<?php echo$pem; ?>(this.checked)" name="idshift<?php echo$data[$i][0]; ?>" value="<?php echo$data[$i][0]; ?>" checked >
								            <span class="custom-checkbox"></span>
											</label>
                                        </td>
                                        <?php
                                        }else{?>
                                            <td style="padding:20px; " id="sh<?php echo$pem; ?>"><label class="label-checkbox">
											<input type="checkbox" onClick="con<?php echo$pem; ?>(this.checked)" name="idshift<?php echo$data[$i][0]; ?>" value="<?php echo$data[$i][0]; ?>" >
								            <span class="custom-checkbox"></span>
											</label>
                                        </td><?php
                                        }
									    if(($pem%$a->baris)==0){
									        $s++;
										    if($s <= $a->baris){
										        echo'</tr><tr><th class="th">'.$data[$i+1][2].'</th>'; 
										    } 
									    }
										echo'<script language="javascript">
										function con'.$pem.'(status){
			     						 	if(status==true){$("#sh'.$pem.'").css("background","#FF5555");}
			     						 	else{$("#sh'.$pem.'").css("background","#fff");}
			  							}</script>';
		
									}
									echo"</tr>"
									
									
									?>							
									</tbody>
								</table>
											<div class="row">
												<div id="m_kuliah-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="m_kuliah-submit" value="Save">
												    </div>
											    </div>
											</div>
										</form>
								 </div>
								<div class="panel-footer">
								    <span>Keterangan :</span><br /><br />
								<?php 
									for($i=0; $i<$a->baris; $i++){
									    echo'<a class="label label-info" style="font-size:12px;" >Shift '.($i+1).' = '.$shift[$i][1].'</a><br /><br />';
									}	
								?>
								</div>
							</div><!-- /panel -->
							</div>
						</div><!-- /tab2 -->
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
