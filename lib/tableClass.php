<?php
include('../lib/Class.php');

$table = $_REQUEST['table'];
error_reporting(0);
$a = new tableOutput();

$a->$table();

class tableOutput{
    
    private $table;

    function __construct(){
        $this->table = $_REQUEST['table'];
    }
    
    /* FAKULTAS ========================================================================================================================= FAKULTAS */
    function fakultas(){
	    
        //OUTPUT
	    echo'<table class="table table-striped fadeInUp animation-delay1">
                 <thead>
                 <tr>
		   	          <th style="width:30px;"><span class="custom-checkbox"></span></th>
			          <th>Id</th>
                      <th>Fakultas</th>
                      <th style="text-align:center;">pilihan</th>
		         </tr>
		         </thead>
		         <tbody id="fakultas-table">';
        //END OUTPUT 	
            
        $sql="select* from fakultas ";
		$a=new paging();
		$security= new security();
        
		if(isset($_GET['search'])){
		    $text=$security->escape(strtolower($_GET['search']));
			$sql=$sql." where nama LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="4">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql."order by id asc",'10');
		}
        
		$arah="Right";
        
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
            
             //OUTPUT
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'">
                      <td>
				           <label class="label-checkbox">
				           <input type="checkbox" class="chk-row" onclick="data_master.ceklis(\'fakultas\',this.checked,\''.$data[$i][0].'\',this)" value="1" />
				           <span class="custom-checkbox"></span>
				           </label>
				      </td>
				      <td>'.$data[$i][0].'</td>
                      <td>'.$data[$i][1].'</td>
                      <td style="text-align:center;">
						   <a class="btn btn-xs btn-warning" onclick=data_master.update(\'fakultas\',\'id='.$data[$i][0].'\')>
                           <i class="fa fa-edit fa-lg"></i></a>&nbsp; 
						   <a class="btn btn-xs btn-danger logoutConfirm_open" onClick=data_master.calonhapus("fakultas",'.$data[$i][0].',this)>
                           <i class="fa fa-trash-o fa-lg"></i></a>
                      </td>											
             </tr>';
             //END OUTPUT
            
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
    
         //OUTPUT    
         echo'</tbody></table><div id="fakultas-hapus"></div>
          <div class="panel-footer clearfix fadeInDown animation-delay10">
              <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul>
          </div>';	
         //END OUTPUT;
    }    
    
    /* JURUSAN ========================================================================================================================== jurusan */
    function jurusan(){
        
        //OUTPUT
	    echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox"></span></th>
			  <th>Id</th>
			  <th>jurusan</th>
			  <th>fakultas</th>
			  <th style="text-align:center;">pilihan</th>
		</tr>
		</thead>
		<tbody id="jurusan-table">';
		//END OUTPUT
        
        $sql="select* from jurusan ,fakultas where jurusan.id_fakultas=fakultas.id ";
		$a=new paging();
		
        if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql." AND (jurusan.nama LIKE '%".$text."%' OR fakultas.nama LIKE '%".$text."%')";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'10');
		}
		
        $arah="Right";
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
            
             //OUTPUT
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>
				  <label class="label-checkbox">
				      <input type="checkbox" class="chk-row" onclick="data_master.ceklis(\'jurusan\',this.checked,\''.$data[$i][0].'\',this)" value="1" />
				      <span class="custom-checkbox"></span>
				  </label>
				  </td>
				  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
				  <td>'.$data[$i][4].'</td>
				  <td style="text-align:center;">
					  <a class="btn btn-xs btn-warning" onclick=data_master.update(\'jurusan\',\'id='.$data[$i][0].'\')>
                           <i class="fa fa-edit fa-lg"></i></a>&nbsp; 
				      <a class="btn btn-xs btn-primary logoutConfirm_open" onClick=data_master.calonhapus("jurusan",'.$data[$i][0].',this)>
                           <i class="fa fa-times-circle fa-lg"></i></a></td>											
				  </tr>';
             // END OUTPUT
            
            
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
         
         //OUTPUT
         echo'</tbody></table><div id="jurusan-hapus"></div>
              <div class="panel-footer clearfix fadeInDown animation-delay10">
                  <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul>
              </div>';						
         //END OUTPUT
    }
    
    /* mat_pel ========================================================================================================================== mat_pel */
	function mat_pel(){
        
        //OUTPUT
        echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox"></span></th>
			  <th>Id</th>
			  <th>Mata Pelajaran</th>
			  <th>Persentage</th>
			  <th style="text-align:center;">pilihan</th>
		</tr>
		</thead>
		<tbody id="mat_pel-table">';
        //END OUTPUT
        
		$sql="select* from mat_pel ";
		$a=new paging();
		if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql." where mat_pel.nama LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'10');
		}
        
		$total=0;	$progress="";  $arah="Right";
		$warna=array("success","warning","danger","info","success","warning","danger","info","success","warning","danger","info");
		
        for($i=0; $i<$a->baris; $i++){
		     
             $delay=($i>=10)? 10 : $i+1;
		     
             //OUTPUT
             echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>
				  <label class="label-checkbox">
				      <input type="checkbox" class="chk-row" onclick="data_master.ceklis(\'mat_pel\',this.checked,\''.$data[$i][0].'\',this)" value="1" />
				      <span class="custom-checkbox"></span>
				  </label>
				  </td>
				  <td>'.$data[$i][0].'</td>
				  <td><span class="badge badge-'.$warna[$i].'">'.$data[$i][1].'</span></td>
				  <td>'.$data[$i][2].' %</td>
				  <td style="text-align:center;">
						<a class="btn btn-xs btn-warning" onclick=data_master.update(\'mat_pel\',\'id='.$data[$i][0].'\')>
                        <i class="fa fa-edit fa-lg"></i></a>&nbsp; 
						<a class="btn btn-xs btn-primary logoutConfirm_open" onClick=data_master.calonhapus("mat_pel",'.$data[$i][0].',this)>
                        <i class="fa fa-times-circle fa-lg"></i></a>
                  </td>											
				  </tr>';
             //END OUTPUT
            
			 $total=$total+$data[$i][2];
			 $progress.='<div class="progress-bar progress-bar-'.$warna[$i].'" style="width: '.$data[$i][2].'%"><span class="sr-only"></span></div>';
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
         echo'</tbody></table><div id="mat_pel-hapus"></div><br /><br />Total Persentase : <span class="badge badge-info">'.$total.' %</span>  
              &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Kekurangan Persentase : <span class="badge badge-warning">'.(100-$total).' %</span>
		      <br /><br /><div class="progress progress-striped active">'.$progress.'</div>
		      <div class="panel-footer clearfix fadeInDown animation-delay10">
                  <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul>
         </div>';						
     }
  
     /* amalanyaumi ===================================================================================================================== amalanyaumi */
     function amalanyaumi(){
         
         //OUTPUT
	     echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox"></span></th>
			  <th>Id</th>
			  <th>Amalan Yaumi</th>
			  <th>Target</th>
			  <th style="text-align:center;">pilihan</th>
		</tr>
		</thead>
		<tbody id="amalanyaumi-table">';
		//END OUTPUT
         
         
        $sql="select* from amalanyaumi ";
		$a=new paging();
		
         if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql." where amalanyaumi.amalan LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'10');
		}
		
        $total=0; $progress="";	$arah="Right";
        $warna= array ("success","warning","danger","info","primary","success","warning","danger","info","primary","","success", "warning","danger");
		for($i=0; $i<$a->baris; $i++){
		     
             $delay=($i>=10)? 10 : $i+1;
		     
             //OUTPUT
             echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>
				  <label class="label-checkbox">
				      <input type="checkbox" class="chk-row" onclick="data_master.ceklis(\'amalanyaumi\',this.checked,\''.$data[$i][0].'\',this)" value="1" />
				      <span class="custom-checkbox"></span>
				  </label>
				  </td>
				  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
				  <td><span class="badge badge-'.$warna[$i].'">'.$data[$i][2].'</span></td>
				  <td style="text-align:center;">
						<a class="btn btn-xs btn-warning" onclick=data_master.update(\'amalanyaumi\',\'id='.$data[$i][0].'\')>
                        <i class="fa fa-edit fa-lg"></i></a>&nbsp; 
						<a class="btn btn-xs btn-primary logoutConfirm_open" onClick=data_master.calonhapus("amalanyaumi",'.$data[$i][0].',this)>
                        <i class="fa fa-times-circle fa-lg"></i></a></td>											
             </tr>';
             //END OUTPUT
			 
             $total=$total+$data[$i][2];
			 $progress.='<div class="progress-bar progress-bar-'.$warna[$i].'" style="width: '.$data[$i][2].'%"><span class="sr-only"></span></div>';
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
         
         //OUTPUT
         echo'</tbody></table><div id="amalanyaumi-hapus"></div><div class="panel-footer clearfix fadeInDown animation-delay10">
         <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div>';		
         //END OUTPUT
     }

    /* ket_shift ======================================================================================================================== ket_shift */
	function ket_shift(){
    
        echo'<ul class="list-group collapse in fadeInUp animation-delay1">';
        
		$sql="select* from ket_shift ";
		$a=new paging();
		
        if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql." where ket_shift.amalan LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'10');
		}
		$arah="Right";		          
        $warna = array("success","warning","danger","info","primary","success","warning","danger","info","primary","","success","warning","primary");
		for($i=0; $i<$a->baris; $i++){
		     
             $delay=($i>=10)? 10 : $i+1;
		     
             //OUTPUT 
             echo'<li class="list-group-item clearfix">
					  <div class="activity-icon bg-success small">
						   <i class="fa fa-usd"></i>
					  </div>
					  <div class="pull-left m-left-sm col-md-9">
						   <div class="col-md-9">
						   <span>shift '.$data[$i][0].'</span><br/>
					       <small class="text-muted"><i class="fa fa-clock-o"></i> '.$data[$i][1].'</small>
						   </div><div class="col-md-1">
						   <a class="btn btn-xs btn-warning" onclick=data_master.update(\'ket_shift\',\'id='.$data[$i][0].'\')>
                           <i class="fa fa-pencil fa-lg"></i></a>
						   <a class="btn btn-xs btn-danger logoutConfirm_open" onClick=data_master.calonhapus("ket_shift",'.$data[$i][0].',this.parentNode)>
                           <i class="fa fa-trash-o fa-lg"></i></a></td>											
						   </div>
					  </div>	
             </li>'; 
             //END OUTPUT
            
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
        
         echo'</ul><!-- /list-group -->';						
    }

    /* admin_f ========================================================================================================================== admin_f */
	function admin_f(){
        
        echo'<ul class="list-group collapse in fadeInUp animation-delay1">';
		
		$sql="select* from admin_f ,fakultas where admin_f.id_fakultas=fakultas.id ";
		$a=new paging();
		
        if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql."  AND admin_f.nama LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'5');
		}
		
        $arah="Right";
		$warna=array("success","warning","danger","info","primary","success","warning","danger","info","primary","","success","warning","danger");
		
        for($i=0; $i<$a->baris; $i++){
		
             $delay=($i>=10)? 10 : $i+1;
            
		     echo'<li class="list-group-item clearfix">
					  <div class="activity-icon bg-info small">
						   <i class="fa fa-user"></i>
					  </div>
					  <div class="pull-left m-left-sm col-md-10" style="margin:0; padding-left:0;">
						   <div class="col-md-11">
						   <span>'.$data[$i][1].'</span><br/>
					       <small class="text-muted"><i class="fa fa-star"></i> '.$data[$i][4].'</small><br />
					       <small class="text-muted"><i class="fa fa-envelope"></i> '.$data[$i][3].'</small><br />
						   <small class="text-muted"><i class="fa fa-group"></i> Fakultas '.$data[$i][8].'</small>
						   </div><div class="col-md-1" style="padding-left:0">
						   <a style="margin-bottom:5px;" class="btn btn-xs btn-warning" onclick=data_master.update(\'admin_f\',\'id='.$data[$i][0].'\')>
                           <i class="fa fa-pencil fa-lg"></i></a>
						   <a class="btn btn-xs btn-danger logoutConfirm_open" onClick=data_master.calonhapus("admin_f",'.$data[$i][0].',this.parentNode)>
                           <i class="fa fa-trash-o fa-lg"></i></a></td>											
						   </div>
					  </div>	
			</li>';  
			 
            $arah= (($i%2)==0)? "Left" : "Right";
		 }
         echo'</ul><div class="panel-footer clearfix fadeInDown animation-delay6">
         <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div><!-- /list-group -->';						
    }

    /* admin_p ========================================================================================================================== admin_p */
	function admin_p(){
        echo'<ul class="list-group collapse in fadeInUp animation-delay1">';
		
		$sql="select* from admin_p ";
		$a=new paging();
		
        if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql."  where admin_p.nama LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql,'5');
		}
		
        $arah="Right";
		$warna=array("success","warning","danger","info","primary","success","warning","danger","info","primary","","success","warning","danger");
		
        for($i=0; $i<$a->baris; $i++){
		     
             $delay=($i>=10)? 10 : $i+1;
		     
             echo'<li class="list-group-item clearfix">
					  <div class="activity-icon bg-success small">
						   <i class="fa fa-user"></i>
					  </div>
					  <div class="pull-left m-left-sm col-md-10" style="margin:0; padding-left:0;">
						   <div class="col-md-11">
						   <span>'.$data[$i][1].'</span><br/>
					       <small class="text-muted"><i class="fa fa-star"></i> '.$data[$i][4].'</small><br />
					       <small class="text-muted"><i class="fa fa-envelope"></i> '.$data[$i][3].'</small><br />
						   </div><div class="col-md-1" style="padding-left:0">
						   <a style="margin-bottom:5px;" class="btn btn-xs btn-warning" onclick=data_master.update(\'admin_p\',\'id='.$data[$i][0].'\')>
                           <i class="fa fa-pencil fa-lg"></i></a>
						   <a class="btn btn-xs btn-danger logoutConfirm_open" onClick=data_master.calonhapus("admin_p",'.$data[$i][0].',this.parentNode)>
                           <i class="fa fa-trash-o fa-lg"></i></a></td>											
						   </div>
					  </div>	
             </li>';  
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
        
         echo'</ul><div class="panel-footer clearfix fadeInDown animation-delay6">
         <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div><!-- /list-group -->';						
    }

    /* kode_mentor ====================================================================================================================== kode_mentor */
	function kode_mentor(){
        $sql="select* from kode_mentor ";
	    $a=new dbAkses;
	    $data=$a->select($sql);
	    for($i=0; $i<$a->baris; $i++){
	       echo$data[$i][1];  
	    }
    }
    
    /* timeline ========================================================================================================================= timeline */
   	function timeline(){
        $sql="select* from timeline ";
		$a=new dbAkses();
		if(isset($_GET['search'])){
		    $text=strtolower($_GET['search']);
		    $sql=$sql."  where timeline.nama LIKE '%".$text."%'";
		    $data=$a->select($sql,'10');
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		}else{
		    $data=$a->select($sql);
		}
		$warnalab="";
		$arah="Right";
		$warna=array("success","warning","danger","info","primary","success","warning","danger","info","primary","","success","warning","danger");
		for($i=0; $i<$a->baris; $i++){
            
		     $delay=($i>=10)? 10 : $i+1;
			
			 if($data[$i][4]=="PENTING"){$warna[$i]="danger";}
		     
             echo'<div class="timeline-item fadeIn'.$arah.' animation-delay'.$delay.'">
						<div class="timeline-info">
							<div class="timeline-icon bg-'.$warna[$i].'"><i class="fa '.$data[$i][1].'"></i></div>
							<div class="timeline-date">'.$data[$i][2].'</div>
						</div>
						<div class="panel panel-default timeline-panel"><div class="panel-heading">
				            <strong>'.$data[$i][3].'</strong> <span class="label label-'.$warna[$i].' m-left-xs">'.$data[$i][4].'</span>
							</div>
                        <div class="panel-body">
							 <span><i class="fa fa-clock-o"></i> &nbsp; '.$data[$i][5].'</span>
							 <div class="seperator"></div><p>'.$data[$i][7].'</p><div class="seperator"></div><div class="pull-right">
							 <a class="btn btn-xs btn-success" onclick=data_master.update(\'timeline\',\'id='.$data[$i][0].'\')>
                        <i class="fa fa-pencil"></i> Edit</a>
				 <a class="btn btn-xs btn-danger logoutConfirm_open" onClick=data_master.calonhapus(\'timeline\','.$data[$i][0].',this.parentNode.parentNode)>
                         <i class="fa fa-trash-o"></i> Delete</a>
						 </div></div></div><!-- /panel -->
             </div><!-- /timeline-item -->';  
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
     }
    
     /* timeline_p ====================================================================================================================== timeline_p */
     function timeline_p(){
          $sql="select* from timeline ";
		  $a=new dbAkses();
		  if(isset($_GET['search'])){
		      $text=strtolower($_GET['search']);
		      $sql=$sql."  where timeline.nama LIKE '%".$text."%'";
		      $data=$a->select($sql,'10');
			  if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
		  }else{
		      $data=$a->select($sql);
		  }
		  $warnalab=""; $arah="Right";
          $warna=array("success","warning","danger","info","primary","success","warning","danger","info","primary","","success","danger","warning");
		  
          for($i=0; $i<$a->baris; $i++){
		      $delay=($i>=10)? 10 : $i+1;
			
			  if($data[$i][4]=="PENTING"){$warna[$i]="danger";}
		      
              echo'<div class="timeline-item fadeIn'.$arah.' animation-delay'.$delay.'"><div class="timeline-info">
				   <div class="timeline-icon bg-'.$warna[$i].'"><i class="fa '.$data[$i][1].'"></i></div>
                   <div class="timeline-date">'.$data[$i][2].'</div></div>
				   <div class="panel panel-default timeline-panel"><div class="panel-heading">
				        <strong>'.$data[$i][3].'</strong> <span class="label label-'.$warna[$i].' m-left-xs">'.$data[$i][4].'</span>
				   </div><div class="panel-body"><span><i class="fa fa-clock-o"></i> &nbsp; '.$data[$i][5].'</span>
				   <div class="seperator"></div><p>'.$data[$i][7].'</p></div>
              </div><!-- /panel --></div><!-- /timeline-item -->';  
			  $arah= (($i%2)==0)? "Left" : "Right";
		 }
     }

     /* m_kuliah ======================================================================================================================== m_kuliah */
	 function m_kuliah(){
         echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
			  <th>Hari</th>
			  <th>Shift</th>
         </tr></thead><tbody>';
         $id_m=$_GET['id_m'];
		 $sql="select* from m_kuliah, jadwal_shift where m_kuliah.id_jadwal_shift=jadwal_shift.id and m_kuliah.id_m='".$id_m."' order by jadwal_shift.id asc";
		 $a=new dbAkses();
         $data=$a->select($sql);
	 	 $total=0;
		 $progress="";
		 $arah="Right";
		 $warna=array("success","warning","danger","info","success","warning","danger","info","success","warning","danger","info");
		
         echo'<tr class="fadeIn'.$arah.' animation-delay2"><td>senin</td><td>';
         for($i=0; $i<$a->baris; $i++){ 
              if($data[$i][4]=="senin"){echo'<span class="badge badge-'.$warna[$i].'">'.$data[$i][3].'</span>&nbsp; ';} 
         }
         echo'</td></tr><tr class="fadeIn'.$arah.' animation-delay2"><td>selasa</td><td>';
         for($i=0; $i<$a->baris; $i++){ 
              if($data[$i][4]=="selasa"){echo'<span class="badge badge-'.$warna[$i].'">'.$data[$i][3].'</span> &nbsp;';} 
         }
         echo'</td></tr><tr class="fadeIn'.$arah.' animation-delay2"><td>rabu</td><td>';
         for($i=0; $i<$a->baris; $i++){ 
              if($data[$i][4]=="rabu"){echo'<span class="badge badge-'.$warna[$i].'">'.$data[$i][3].'</span> &nbsp;';} 
         }
         echo'</td></tr><tr class="fadeIn'.$arah.' animation-delay2"><td>kamis</td><td>';
         for($i=0; $i<$a->baris; $i++){ 
              if($data[$i][4]=="kamis"){echo'<span class="badge badge-'.$warna[$i].'">'.$data[$i][3].'</span> &nbsp;';} 
         }
         echo'</td></tr><tr class="fadeIn'.$arah.' animation-delay2"><td>jum\'at</td><td>';
         for($i=0; $i<$a->baris; $i++){ 
              if($data[$i][4]=="jumat"){echo'<span class="badge badge-'.$warna[$i].'">'.$data[$i][3].'</span> &nbsp;';} 
         }
         echo'</td></tr></tbody></table>';						
    }
    
    /* mente ============================================================================================================================ mente */
	function mente(){
         echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;">No.</th>
			  <th style="width:18%;">Nama Mente</th>
			  <th>No Bp</th>
			  <th>Phone</th> 
              <th>Fakultas</th>
              <th>Jurusan</th>
              <th>Prestasi</th>
			  <th style="text-align:center;">pilihan</th>
		</tr></thead><tbody id="mente-table">';
		
        $order = " order by mente.nama asc";
		$sql="select mente.nama, mente.id, mente.hp, fakultas.nama, jurusan.nama, mente.prestasi from mente,fakultas,jurusan where mente.id_jurusan=jurusan.id and jurusan.id_fakultas = fakultas.id";
		
        $a=new paging();
        $page=($_GET['p']==null)?1:$_GET['p'];
        $jumhal=10;
		if(isset($_GET['search'])){
            $secur= new security();
		    $gender=$_GET['gender'];
		    $text=$secur->escape(strtolower($_GET['text']));
            $goldar=$_GET['gol_dar'];
            $liqo=$_GET['liqo'];
            $rohis=$_GET['rohis'];
		    $sql=$sql." and (mente.nama LIKE '%".$text."%' OR mente.id LIKE '%".$text."%' OR mente.hp LIKE '%".$text."%' OR fakultas.nama LIKE '%".$text."%' OR jurusan.nama LIKE '%".$text."%' OR mente.prestasi LIKE '%".$text."%') and mente.gender LIKE '%".$gender."%' and mente.liqo LIKE '%".$liqo."%' and mente.rohis LIKE '%".$rohis."%' and mente.golongan_darah LIKE '%".$goldar."%'".$order;
		    $data=$a->select($sql,$jumhal);
			if($a->baris==0){echo'<tr><td colspan="8">Result : 0 </td></tr>';}
		}else{
            $sql=$sql.$order;
		    $data=$a->select($sql,$jumhal);
		}
		
        $arah="Right";
        $no=($page*$jumhal)-$jumhal+1;
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
				  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
				  <td>'.$data[$i][2].'</td>
				  <td>'.$data[$i][3].'</td>
				  <td>'.$data[$i][4].'</td>
                  <td>'.$data[$i][5].'</td>
				  <td style="text-align:center;">
		    <a href="#mente" data-toggle="tab" class="btn btn-xs btn-warning" onclick=data_mentor.update(\'mente\',\'id='.$data[$i][1].'\')>
            <i class="fa fa-search fa-lg"></i></a>&nbsp; </td></tr>';  
            $no++;
			$arah= (($i%2)==0)? "Left" : "Right";
		 }
         echo'</tbody></table><div id="mente-hapus"></div><div class="panel-footer clearfix fadeInDown animation-delay10">
         <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div>';						
     }
          
    /* mentor =========================================================================================================================== mentor */
    function mentor(){
         echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;">No.</th>
			  <th>Nama mentor</th>
			  <th>No Bp</th>
			  <th>Phone</th> 
              <th>Fakultas</th>
              <th>Jurusan</th>
			  <th style="text-align:center;">pilihan</th>
		</tr></thead><tbody id="mentor-table">';
		
        $order = " order by mentor.nama asc";
		$sql="select mentor.nama, mentor.id, mentor.hp, fakultas.nama, jurusan.nama from mentor,fakultas,jurusan where mentor.id_jurusan=jurusan.id and jurusan.id_fakultas = fakultas.id";
		$a=new paging();
        $page=($_GET['p']==null)?1:$_GET['p'];
        $jumhal=10;
		
        if(isset($_GET['search'])){
            $secur= new security();
		    $gender=$_GET['gender'];
		    $text=$secur->escape(strtolower($_GET['text']));
            $goldar=$_GET['gol_dar'];
            $ppm=$_GET['ppm'];
            $sm=$_GET['sm'];
		    $sql=$sql." and (mentor.nama LIKE '%".$text."%' OR mentor.id LIKE '%".$text."%' OR mentor.hp LIKE '%".$text."%' OR fakultas.nama LIKE '%".$text."%' OR jurusan.nama LIKE '%".$text."%') and mentor.gender LIKE '%".$gender."%' and mentor.ppm LIKE '%".$ppm."%' and mentor.sm LIKE '%".$sm."%' and mentor.golongan_darah LIKE '%".$goldar."%'".$order;
		    $data=$a->select($sql,$jumhal);
			if($a->baris==0){echo'<tr><td colspan="7">Result : 0 </td></tr>';}
		
        }else{
            $sql=$sql.$order;
		    $data=$a->select($sql,$jumhal);
		}
		$arah="Right";
        $no=($page*$jumhal)-$jumhal+1;
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
		     
             echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
				  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
				  <td>'.$data[$i][2].'</td>
				  <td>'.$data[$i][3].'</td>
				  <td>'.$data[$i][4].'</td>
				  <td style="text-align:center;">
						<a href="#mentor" data-toggle="tab" class="btn btn-xs btn-warning" onclick=data_mentor.update(\'mentor\',\'id='.$data[$i][1].'\')><i class="fa fa-search fa-lg"></i></a>&nbsp; 
                  </td>											
				  </tr>';  
             $no++;
			 
             $arah= (($i%2)==0)? "Left" : "Right";
		 }
         echo'</tbody></table><div id="mentor-hapus"></div><div class="panel-footer clearfix fadeInDown animation-delay10">
         <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div>';						
     }

     /* kelompok ======================================================================================================================== kelompok */
	 function kelompok(){
     
        echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;">No.</th>
			  <th>nama Kelompok</th>
			  <th>Mentor</th> 
              <th>Jadwal</th>
              <th>Fakultas</th>
              <th>Jurusan</th>
			  <th style="text-align:center;">pilihan</th>
		</tr>
		</thead>
		<tbody id="kelompok-table">';
         
        $order = " order by kelompok.nama asc";
		$sql="select kelompok.id, kelompok.nama, mentor.nama,  kelompok.jadwal, fakultas.nama, jurusan.nama from kelompok,mentor,fakultas,jurusan where kelompok.mentor =mentor.id and kelompok.id_jurusan=jurusan.id and jurusan.id_fakultas = fakultas.id";
		$a=new paging();
        $page=($_GET['p']==null)?1:$_GET['p'];
        $jumhal=10;
		if(isset($_GET['search'])){
            $secur= new security();
		    $gender=$_GET['gender'];
		    $text=$secur->escape(strtolower($_GET['text']));
            $id_fakultas=$_GET['id_fakultas'];
            $id_jurusan=$_GET['id_jurusan'];
		    $sql=$sql." and (kelompok.nama LIKE '%".$text."%' OR kelompok.mentor LIKE '%".$text."%' OR mentor.nama LIKE '%".$text."%' OR kelompok.jadwal LIKE '%".$text."%' OR fakultas.nama LIKE '%".$text."%' OR jurusan.nama LIKE '%".$text."%') and mentor.gender LIKE '%".$gender."%' and fakultas.id LIKE '%".$id_fakultas."%' and jurusan.id LIKE '%".$id_jurusan."%'".$order;
		    $data=$a->select($sql,$jumhal);
		}else{
            $sql=$sql.$order;
		    $data=$a->select($sql,$jumhal);
		}
   	    if($a->baris==0){echo'<tr><td colspan="8">Result : 0 </td></tr>';}

		$arah="Right";
        $no=($page*$jumhal)-$jumhal+1;
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
				  <td>'.$data[$i][1].'</td>
				  <td>'.$data[$i][2].'</td>
				  <td>'.$data[$i][3].'</td>
				  <td>'.$data[$i][4].'</td>
				  <td>'.$data[$i][5].'</td>
				  <td style="text-align:center;">
						<a href="#kelompok" data-toggle="tab" class="btn btn-xs btn-success" onclick=portal.refresh_kelompok(\'portal_kelompok\',\'idkel\',\''.$data[$i][0].'\')>
                        <i class="fa fa-search fa-lg"></i></a>&nbsp;
						<a href="#kelompok" data-toggle="tab" class="btn btn-xs btn-dan" >
                        <i class="fa fa-trash-o fa-lg"></i></a>&nbsp;
                  </td>											
				  </tr>';  
             $no++;
			 $arah= (($i%2)==0)? "Left" : "Right";
		 }
         echo'</tbody></table><div id="kelompok-hapus"></div><div class="panel-footer clearfix fadeInDown animation-delay10">
              <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div>';						
	}

	/* mentesel ========================================================================================================================= mentesel */
	function mentesel(){
        echo'<table class="table table-striped fadeInUp animation-delay1"><thead>
        <tr>
		   	  <th>No.</th>
              <th style="width:30px;">Check</th>
			  <th>No BP</th>
			  <th>Mente</th> 
		</tr>
		</thead>
		<tbody id="kelompok-table">';

        $val= $_GET['val'];
        $gender= $_GET['gender'];
        $gen= $_GET['gen'];
        $order = " order by nama asc";
		$sql="select id,nama from mente where id_jurusan='".$val."' and gender='".$gender."' and status='0'";
		$a=new pagingkhusus();
        $page=($_GET['p']==null)?1:$_GET['p'];
        $jumhal=10;
    
        $security= new security();
        
        if(isset($_GET['search'])){
		    $text=$security->escape(strtolower($_GET['search']));
			$sql=$sql." and (nama LIKE '%".$text."%' OR id LIKE '%".$text."%')";
		    $data=$a->select($sql.$order,$jumhal,$this->table."-".$val."-".$gen);
		}else{
		    $data=$a->select($sql.$order,$jumhal,$this->table."-".$val."-".$gen);
            
	  	
		}
        if($a->baris==0){echo'<tr><td colspan="4">Result : 0 </td></tr>';}

		$arah="Up";
        $no=($page*$jumhal)-$jumhal+1;
		for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
				  <td><label class="label-checkbox">
				      <input type="checkbox" class="chk-row" onclick="p_kelompok.ceklis(\'mentesel\',this.checked,\''.$data[$i][0].'\',this)" value="1" />
				      <span class="custom-checkbox"></span>
				  </label>
				  </td>
                  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
             </tr>';  
             $no++;
		 }
         echo'</tbody></table><div class="panel-footer clearfix fadeInDown animation-delay10">
              <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div><div id="mentesel-pilih"></div>';						
    }
    
    /* kelmente ========================================================================================================================= kelmente */
    function kelmente(){
        
         $idkel=$_GET['val'];
         $aks=new dbAkses();
         $datakel = $aks->select("select kelompok.nama, mentor.nama from kelompok,mentor where kelompok.mentor = mentor.id and kelompok.id='".$idkel."'");
         $aks->baris;
         if($aks->baris==1){
         echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th>Nama Kelompok</th>
              <th colspan="3">: '.$datakel[0][0].'</th>
		      </tr></thead><tbody id="kelompok-table">
              <tr><td>Nama Mentor</td><td colspan="3">: '.$datakel[0][1].'</td></tr>
              </tbody></table>';    
    

         echo'<table class="table table-striped fadeInUp animation-delay2"><thead>
         <tr><td colspan="4">Daftar Nama Mente</td></tr>
         <tr><th>No.</th><th>No BP</th><th>nama</th><th>hapus</th></tr>
         </thead><tbody>';
         
         $val= $_GET['val'];
         $gender= $_GET['gender'];
         $gen= $_GET['gen'];
         $order = " order by nama asc";
		 $sql="select det_kelompok.mente, mente.nama from det_kelompok,mente where det_kelompok.mente=mente.id and det_kelompok.id='".$idkel."'".$order;
		 $a=new pagingkhusus();
         $page=($_GET['p']==null)?1:$_GET['p'];
         $jumhal=10;
         $data=$a->select($sql,$jumhal,$this->table."-".$val."-".$gen);
   	     if($a->baris==0){echo'<tr><td colspan="4">Result : 0 </td></tr>';}
        
         $arah="Down";
         $no=($page*$jumhal)-$jumhal+1;
		 for($i=0; $i<$a->baris; $i++){
		     $delay=($i>=10)? 10 : $i+1;
		     echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
                  <td>'.$data[$i][0].'</td>
				  <td>'.$data[$i][1].'</td>
                  <td><a class="btn btn-xs btn-danger" onClick=p_kelompok.mentehap('.$data[$i][0].',this)><i class="fa fa-times-circle-o fa-lg"></i></a></td>
				  </tr>';  
             $no++;
		 }
         echo'</tbody></table><div class="panel-footer clearfix fadeInDown animation-delay10">
              <ul class="pagination pagination-xs m-top-none pull-right">'.$a->listpage.'</ul></div>';						
		}
	}
    
    /* khs ============================================================================================================================= khs */
	function khs(){
         $b=new dbAkses();
         $id_m=$_GET['id_m'];
		 $jabatan=$_GET['jabatan'];
         
		 if($jabatan=="mentor"){
			$cek=$b->select("select count(id_mat_pel) from khs where mente='".$id_m."'");
    
			if($cek[0][0]==0){
				$data=$b->select("select id from mat_pel order by id asc");
				for($i=0; $i<$b->baris; $i++){
					$b->input("insert into khs(mente,id_mat_pel) values('".$id_m."','".$data[$i][0]."') "); 
				}
			}
			
			echo'<script>var total=0; 
			    function predikat(id,data){
				var nilai=$("#khs-form [name=\'mat"+id+"\']").val();
				var persen=$("#khs-form [name=\'pers"+id+"\']").val();
				if(nilai<=100&&nilai>=80){
				   $("#pred"+id).html("A");
				}else if(nilai<=79&&nilai>=70){
				   $("#pred"+id).html("B");
				}else if(nilai<=69&&nilai>=50){
				   $("#pred"+id).html("C");
				}else if(nilai<=49&&nilai>=40){
				   $("#pred"+id).html("D");
				}else if(nilai<=39&&nilai>=0){
				   $("#pred"+id).html("E");
				}else{
				   $("#pred"+id).html("unknow");
				}
				rata = total / data;

				$("#rata-rata").html(rata);
			}</script>';
			echo'<form id="khs-form" onsubmit="return portal.simpan_khs(this,\'khs\')">
			  <table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox">No.</span></th>
			  <th>Mata Pelajaran</th>
			  <th>Persentage</th>
			  <th>Nilai</th><th style="text-align:center;">Predikat</th>
		      </tr></thead><tbody>';
		 
			$sql="select mat_pel.id, mat_pel.nama, mat_pel.persen, khs.nilai, mente.nilai from mat_pel,khs,mente where mat_pel.id=khs.id_mat_pel and khs.mente=mente.id and khs.mente='".$id_m."'";
			$a=new dbAkses();
			$data=$a->select($sql);
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
			
			echo'<input type="hidden" name="hal" value="simpan_khs" /><input type="hidden" name="mente" value="'.$id_m.'" />
			<input type="hidden" name="jumlahdata" value="'.$a->baris.'" />';
			$total=0;
			$progress="";
			$arah="Down";
			$warna=array("success","warning","danger","info","success","warning","danger","info","success","warning","danger","info");
			$predikat = new khs();
			for($i=0; $i<$a->baris; $i++){
				$delay=($i>=10)? 10 : $i+1;
				echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'">
				   <td>'.($i+1).'</td>
				   <td><span class="badge badge-'.$warna[$i].'">'.$data[$i][1].'</span></td>
				   <td>'.$data[$i][2].' %<input type="hidden" name="pers'.$data[$i][0].'" value="'.$data[$i][2].'" /></td>
				   <td><input type="text" onkeyup="predikat('.$data[$i][0].','.$a->baris.')" name="mat'.$data[$i][0].'" pattern="[0-9]{1,3}" class="form-control input-sm" style="width:50px;" value="'.$data[$i][3].'" required /></td>
                   <td style="text-align:center;"><span class="label label-lg label-info" id="pred'.$data[$i][0].'">'.$predikat->predikat($data[$i][3]).'</span></td>
				   </tr>';  
				$total=$total+$data[$i][1];
				$progress.='<div class="progress-bar progress-bar-'.$warna[$i].'" style="width: '.$data[$i][1].'%"><span class="sr-only"></span></div>';
			}
			//error_reporting(0);
			echo'<tr><td colspan="2"></td><td></td><td>Rata-Rata : <span id="rata-rata">'.$data[0][4].'</span></td><td></td></tr>
			     <tr><td colspan="4" id="khs-forminfo"></td><td><input type="submit" class="btn btn-sm btn-success pull-right" name="khs" value="simpan" /></td></tr></tbody></table></form>';						
		 }
		 
		 else if($jabatan=="mente"){
			$cek=$b->select("select count(id_mat_pel) from khs where mente='".$id_m."'");
    
			if($cek[0][0]==0){
				$data=$b->select("select id from mat_pel order by id asc");
				for($i=0; $i<$b->baris; $i++){
					$b->input("insert into khs(mente,id_mat_pel) values('".$id_m."','".$data[$i][0]."') "); 
				}
			}
			$masa = $b->select("select nilai from mente where id='".$id_m."'");
			if($masa[0][0]==0){
				echo'<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:14px; margin:0;">
					 Warning ! KHS anda belum diproses.</div><br />';
			}
			
			echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox">No.</span></th>
			  <th>Mata Pelajaran</th>
			  <th>Persentage</th>
			  <th>Nilai</th><th style="text-align:center;">Predikat</th>
		      </tr></thead><tbody>';
		 
			$sql="select mat_pel.id, mat_pel.nama, mat_pel.persen, khs.nilai, mente.nilai from mat_pel,khs,mente where mat_pel.id=khs.id_mat_pel and mente.id=khs.mente and khs.mente='".$id_m."'";
			$a=new dbAkses();
			$data=$a->select($sql);
			if($a->baris==0){echo'<tr><td colspan="5">Result : 0 </td></tr>';}
			
			echo'<input type="hidden" name="hal" value="simpan_khs" /><input type="hidden" name="mente" value="'.$id_m.'" />
			<input type="hidden" name="jumlahdata" value="'.$a->baris.'" />';
			$total=0;
			$progress="";
			$arah="Down";
			$warna=array("success","warning","danger","info","success","warning","danger","info","success","warning","danger","info");
			$predikat = new khs();
			for($i=0; $i<$a->baris; $i++){
				$delay=($i>=10)? 10 : $i+1;
				echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'">
				   <td>'.($i+1).'</td>
				   <td><span class="badge badge-'.$warna[$i].'">'.$data[$i][1].'</span></td>
				   <td>'.$data[$i][2].' %</td>
				   <td><span class="label label-lg label-success" style="font-size:13px;">'.$data[$i][3].'</span></td>
                   <td style="text-align:center;"><span class="label label-lg label-info" style="font-size:13px;" id="pred'.$data[$i][0].'">'.$predikat->predikat($data[$i][3]).'</span></td>
				   </tr>';  
				$total=$total+$data[$i][1];
				$progress.='<div class="progress-bar progress-bar-'.$warna[$i].'" style="width: '.$data[$i][1].'%"><span class="sr-only"></span></div>';
			}
			echo'<tr><td colspan="2"></td><td></td><td>Rata-Rata : <span id="rata-rata">'.$data[0][4].'</span></td><td></td></tr>
			     </tbody></table></form>';						
		 }
     }

	 /* khs ============================================================================================================================= khs */
	function overviewkhs(){
         $b=new dbAkses();
         $id_m=$_GET['id_m'];
		 $jabatan=$_GET['jabatan'];
         
		 if($jabatan=="mentor"){
			
			echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
		   	  <th style="width:30px;"><span class="custom-checkbox">No.</span></th>
			  <th>Nama</th><th>NIM</th>';
			  
			$d=new dbAkses();
			$field=$d->select("select nama from mat_pel order by id asc");
			for($i=0; $i<$d->baris; $i++){
			    echo'<th style="text-align:right;">'.$field[$i][0].'</th>';
			}
			echo'<th>Nilai Akhir</th></tr></thead><tbody>';
			
			
			$idkel=$d->select("select id, nama from kelompok where mentor='".$id_m."'");
			$a=new dbAkses();
		
			for($i=0; $i<$d->baris; $i++){
			    echo'<tr><td colspan="11" style="background:#7F7FFF; color:#fff;">Kelompok : '.$idkel[$i][1].'</td></tr>';
			    $sql="select mente.nama, det_kelompok.mente, mente.nilai from mente,det_kelompok where mente.id=det_kelompok.mente and det_kelompok.id='".$idkel[$i][0]."'";
				$data=$a->select($sql);
				for($j=0; $j<$a->baris; $j++){
    				echo'<tr><td>'.($j+1).'</td><td>'.$data[$j][0].'</td><td>'.$data[$j][1].'</td>';
					$f=new dbAkses();
					$pel=$f->select("select nilai from khs where mente='".$data[$j][1]."' order by id_mat_pel asc");
					for($k=0; $k<$f->baris; $k++){
					    echo'<td style="text-align:right">'.$pel[$k][0].'</td>';
					}
					echo'<td style="text-align:right; background:#E4BA10; color:#fff;">'.$data[$j][2].'</td></tr>';
				}
				
			}
			echo'</tbody></table>';
		}
     }

     /* kelmente ========================================================================================================================= kelmente */
    function portal_kelompok(){
         
		 $jabatan = $_GET['jabatan'];
         $idm=$_GET['id_m'];
		
		 $a = new dbAkses();
		 if($jabatan=="mente"){
			 $idkel=$a->select("select id from det_kelompok where mente = '".$idm."'");
			
		 }elseif($jabatan=="idkel"){
		     $idkel[0][0]=$idm;
			 $a->baris=1;
		 }else{
		 	 $idkel=$a->select("select id from kelompok where mentor = '".$idm."'");
			
		 }
			
		 if($a->baris==0){echo'<div class="alert alert-warnimg col-md-6 fadeInDown animation-delay1">Maaf, Kelompok Anda Sedang Diproses, Harap Menunggu.</div>';}        
	
		 $warna=array("warning","danger","info","primary","success","warning","danger","info","primary","","success","warning","danger");
		
		 for($i=0; $i<$a->baris; $i++){
			$aks=new dbAkses();
			$datakel = $aks->select("select kelompok.nama, mentor.nama, mentor.hp from kelompok,mentor where kelompok.mentor = mentor.id and kelompok.id='".$idkel[$i][0]."'");
			$aks->baris;
			if($aks->baris>0){
				$kol=($jabatan=="idkel")? '<div class="col-md-14">':'<div class="col-md-6">';
				echo$kol.'<div class="panel panel-default table-responsive fadeInUp animation-delay1"><div class="panel-body">
					 <table class="table table-striped fadeInUp animation-delay3"><thead><tr>
					 <th>Nama Kelompok</th> <th colspan="3">: '.$datakel[0][0].'</th>
					 </tr></thead><tbody id="kelompok-table">
					 <tr><td>Nama Mentor</td><td colspan="3">: '.$datakel[0][1].'</td></tr>
					 <tr><td>No Hp</td><td colspan="3">: '.$datakel[0][2].'</td></tr>
					 </tbody></table>';    
    
				
				$order = " order by mente.nama asc";
				$sql="select det_kelompok.mente, mente.nama, mente.hp, jurusan.nama from det_kelompok,mente,jurusan where det_kelompok.mente=mente.id and mente.id_jurusan=jurusan.id and det_kelompok.id='".$idkel[$i][0]."'".$order;
				$b=new dbAkses();
				//$page=($_GET['p']==null)?1:$_GET['p'];
				$jumhal=10;
				$data=$b->select($sql);
				error_reporting(0);
				echo'<table class="table table-striped fadeInUp animation-delay2"><thead>
					 <tr><td colspan="4">Daftar Nama Mente Jurusan : <span class="badge badge-'.$warna[$i].'">'.$data[0][3].'</span></td></tr>
					 <tr><th>No.</th><th>No BP</th><th>nama</th><th>No Hp</th></tr>
					 </thead><tbody>';
         
				if($b->baris==0){echo'<tr><td colspan="4">Result : 0 </td></tr>';}        
				 
				$arah="Down"; $page=1;
				$no=($page*$jumhal)-$jumhal+1;
				for($j=0; $j<$b->baris; $j++){
					$delay=($j>=10)? 10 : $j+1;
					echo'<tr class="fadeIn'.$arah.' animation-delay'.$delay.'"><td>'.($no).'</td>
						 <td>'.$data[$j][0].'</td>
						 <td>'.$data[$j][1].'</td>
						 <td>'.$data[$j][2].'</td>
						 </tr>';  
					$no++;
				}
				echo'</tbody></table></div></div></div>';
	
			}else{
				echo'<table class="table table-striped fadeInUp animation-delay1"><thead><tr>
					 <th><div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:12px; margin:0;">Maaf, Kelompok Mentoring Anda Sedang Dalam Proses Pembagian.</div></th>
					 </tr></thead></table></div></div></div>';   
			}
		}
	}
    
	 /* khs ============================================================================================================================= khs */
	function jadwal_alternatif(){
        $b=new dbAkses();
        $id_m=$_GET['id_m'];
		$jabatan=$_GET['jabatan'];
        error_reporting(0);
		
		$c = new dbAkses();
		$d = new dbAkses();
		$h = new dbAkses();
		if($jabatan=="mentor"){
		
			$idkel = $b->select("select kelompok.id, kelompok.nama, jadwal_shift.hari, jadwal_shift.id, ket_shift.jam, ket_shift.id  from kelompok, jadwal_shift, ket_shift where jadwal_shift.id=kelompok.jadwal and jadwal_shift.id_ket_shift=ket_shift.id and kelompok.mentor='".$id_m."'");
			if($b->baris==0){
				$idkel = $b->select("select kelompok.id, kelompok.nama from kelompok where kelompok.mentor='".$id_m."'");	
				if($b->baris==0){
					echo'<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">
					 Warning ! Kelompok Mentoring Anda Belum Ditentukan Harap Tunggu. Silahkan Inputkan Jadwal Kuliah Anda pada Tab <strong>"Edit Jadwal Kuliah Anda"</strong> di atas  </div>';
				}
			}
			for($i=0; $i<$b->baris; $i++){
				echo'<div><h4>Kelompok : '.$idkel[$i][1].'</h4><div id="'.$idkel[$i][0].'-forminfo">
					<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">
					 Jadwal Mentoring Yang Anda Pilih : <strong>'.$idkel[$i][2].' shift '.$idkel[$i][5].' ('.$idkel[$i][4].')</strong>  </div></div><br /><table class="table table-bordered " id="responsiveTable"><thead><style>.th{background:#7FAAFF; color:#fff;}</style>
					 <tr class="th"><th>Hari</th>';
				$shift =$c->select("select * from ket_shift");
				for($j=0; $j<$c->baris; $j++){
				    echo'<th style="text-align:center; background:#7FAAFF;">Shift '.($j+1).'</th>';
				}	
				echo'</tr></thead><tbody>';
				
				$f = new dbAkses();
				$e = new dbAkses();
				$g = new dbAkses();
				
				$jadwal = $g->select("select id from jadwal_shift");
				for($n=0; $n<$g->baris; $n++){
					$jadwal[$n][1]="false";
				}
				
				$bp = $e->select("select mente from det_kelompok where id='".$idkel[$i][0]."'");
				for($k=0; $k<$e->baris; $k++){
					$terpakai = $f->select("select id_jadwal_shift from m_kuliah where id_m ='".$bp[$k][0]."'");
					for($m=0; $m<$f->baris; $m++){
						$kbara = ($terpakai[$m][0]-1);
						$jadwal[$kbara][1]="true";
					}
				}
				$terpakai = $f->select("select id_jadwal_shift from m_kuliah where id_m ='".$id_m."'");
				for($m=0; $m<$f->baris; $m++){
					$kbara = ($terpakai[$m][0]-1);
					$jadwal[$kbara][1]="true";
				}
				
				
				$data = $d->select("select id,hari from jadwal_shift order by id asc");
				$s=0; echo'<tr><th class="th">'.$data[0][1].'</th>';
				for($j=0; $j<$d->baris; $j++){
					if($jadwal[$j][1]=="true"){
						echo'<td style="background:#CA204A;"></td>';
					}
					else{
						if($data[$j][0]==$idkel[$i][3]){
							echo'<td class="'.$idkel[$i][0].'td" id="'.$idkel[$i][0].'-'.$data[$j][0].'" style="background:#FFD500;"><label class="label-radio inline"><input type="radio" name="'.$idkel[$i][0].'jadwal_mentoring" value="'.$data[$j][0].'" onclick="warnai'.$idkel[$i][0].'(this.checked,this.value)" checked >
							<span class="custom-radio"></span></label></td>';
						}else{
							echo'<td class="'.$idkel[$i][0].'td" id="'.$idkel[$i][0].'-'.$data[$j][0].'"><label class="label-radio inline"><input type="radio" name="'.$idkel[$i][0].'jadwal_mentoring" value="'.$data[$j][0].'" onclick="warnai'.$idkel[$i][0].'(this.checked,this.value)" >
							<span class="custom-radio"></span></label></td>';
						}
					}
					if(($j+1)%$c->baris==0){
						$s++;if($s<=$c->baris){echo'</tr><th class="th">'.$data[$j+1][1].'</th>';}
					}
				}			
				echo'</tr>';
				
				echo'</tbody></table><script>function warnai'.$idkel[$i][0].'(status,value){
			     		if(status==true){
							$(".'.$idkel[$i][0].'td").css("background","#fff");
							$("#'.$idkel[$i][0].'-"+value).css("background","#FFD500");
							$.ajax({
								url:server+"khususClass.php?hal=jadwal_mentoring&kelompok='.$idkel[$i][0].'&value="+value,
								beforeSend:function(){
									$("#'.$idkel[$i][0].'-forminfo").html(\'<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>\');
								},success:function(data){
									$("#'.$idkel[$i][0].'-forminfo").html(\'<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">Jadwal Mentoring Yang Anda Pilih : <strong>\'+data+\'.</strong>  </div>\');	
								},error:function(){$("#'.$idkel[$i][0].'-forminfo").html(\'<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>\');}
							});return false;}}</script>';
				$kuliah = new dbAkses();
                $kul=$kuliah->select("select id_jadwal_shift from m_kuliah where id_m='".$id_m."'");
				
			}
			echo'<table>Keterangan : <tr><td style="background:#FFD500; width:100px;"></td><td style=" padding:10px;"> Jadwal Yang Dipilih</td></tr>
				<tr><td style="background:#fff;"></td><td style=" padding:10px;">Jadwal Yang Kosong</td></tr>
				<tr><td style="background:#CA204A"></td><td style=" padding:10px;">Jadwal Sibuk</td></tr></table><br /><br />';
		}
		else if($jabatan=="mente"){
			
			
			$idkel = $b->select("select kelompok.id, kelompok.nama, jadwal_shift.hari, jadwal_shift.id, ket_shift.jam, ket_shift.id  from kelompok, jadwal_shift, ket_shift, det_kelompok where jadwal_shift.id=kelompok.jadwal and jadwal_shift.id_ket_shift=ket_shift.id and det_kelompok.id =kelompok.id and det_kelompok.mente='".$id_m."'");
			if($b->baris==0){
				echo'<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">
					 Warning ! Jadwal Mentoring Kelompok Anda Belum Ditentukan. Silahkan Inputkan Jadwal Kuliah Anda pada Tab <strong>"Edit Jadwal Kuliah Anda"</strong> di atas  </div>';
			}
			for($i=0; $i<$b->baris; $i++){
				echo'<div><h4>Kelompok : '.$idkel[$i][1].'</h4><div id="'.$idkel[$i][0].'-forminfo">
					<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">
					 Jadwal Mentoring Kelompok Anda : <strong>'.$idkel[$i][2].' shift '.$idkel[$i][5].' ('.$idkel[$i][4].')</strong>  </div></div><br /><table class="table table-bordered " id="responsiveTable"><thead><style>.th{background:#7FAAFF; color:#fff;}</style>
					 <tr class="th"><th>Hari</th>';
				$shift =$c->select("select * from ket_shift");
				for($j=0; $j<$c->baris; $j++){
				    echo'<th style="text-align:center; background:#7FAAFF;">Shift '.($j+1).'</th>';
				}	
				echo'</tr></thead><tbody>';
				
				$f = new dbAkses();
				$e = new dbAkses();
				$g = new dbAkses();
				
				$jadwal = $g->select("select id from jadwal_shift");
				for($n=0; $n<$g->baris; $n++){
					$jadwal[$n][1]="false";
				}
				
				$bp = $e->select("select mente from det_kelompok where id='".$idkel[$i][0]."'");
				for($k=0; $k<$e->baris; $k++){
					$terpakai = $f->select("select id_jadwal_shift from m_kuliah where id_m ='".$bp[$k][0]."'");
					for($m=0; $m<$f->baris; $m++){
						$kbara = ($terpakai[$m][0]-1);
						$jadwal[$kbara][1]="true";
					}
				}
				
				$mentor = $e->select("select mentor from kelompok where id='".$idkel[$i][0]."'");
				
				$terpakai = $f->select("select id_jadwal_shift from m_kuliah where id_m ='".$mentor[0][0]."'");
				for($m=0; $m<$f->baris; $m++){
					$kbara = ($terpakai[$m][0]-1);
					$jadwal[$kbara][1]="true";
				}
				
				
				$data = $d->select("select id,hari from jadwal_shift order by id asc");
				$s=0; echo'<tr><th class="th">'.$data[0][1].'</th>';
				for($j=0; $j<$d->baris; $j++){
					if($jadwal[$j][1]=="true"){
						echo'<td style="background:#CA204A;"></td>';
					}
					else{
						if($data[$j][0]==$idkel[$i][3]){
							echo'<td class="'.$idkel[$i][0].'td" id="'.$idkel[$i][0].'-'.$data[$j][0].'" style="background:#FFD500;"></td>';
						}else{
							echo'<td class="'.$idkel[$i][0].'td" id="'.$idkel[$i][0].'-'.$data[$j][0].'"></td>';
						}
					}
					if(($j+1)%$c->baris==0){
						$s++;if($s<=$c->baris){echo'</tr><th class="th">'.$data[$j+1][1].'</th>';}
					}
				}			
				echo'</tr>';
				
				echo'</tbody></table><script>function warnai'.$idkel[$i][0].'(status,value){
			     		if(status==true){
							$(".'.$idkel[$i][0].'td").css("background","#fff");
							$("#'.$idkel[$i][0].'-"+value).css("background","#FFD500");
							$.ajax({
								url:server+"khususClass.php?hal=jadwal_mentoring&kelompok='.$idkel[$i][0].'&value="+value,
								beforeSend:function(){
									$("#'.$idkel[$i][0].'-forminfo").html(\'<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>\');
								},success:function(data){
									$("#'.$idkel[$i][0].'-forminfo").html(\'<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;">Jadwal Mentoring Yang Anda Pilih : <strong>\'+data+\'.</strong>  </div>\');	
								},error:function(){$("#'.$idkel[$i][0].'-forminfo").html(\'<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>\');}
							});return false;}}</script>';
				$kuliah = new dbAkses();
                $kul=$kuliah->select("select id_jadwal_shift from m_kuliah where id_m='".$id_m."'");
				
			}
			echo'<table>Keterangan : <tr><td style="background:#FFD500; width:100px;"></td><td style=" padding:10px;"> Jadwal Yang Dipilih</td></tr>
				<tr><td style="background:#fff;"></td><td style=" padding:10px;">Jadwal Yang Kosong</td></tr>
				<tr><td style="background:#CA204A"></td><td style=" padding:10px;">Jadwal Sibuk</td></tr></table><br /><br />';
			
		}
	}
 /* END ================================================================================================================================== END */ 
	 
}


?>