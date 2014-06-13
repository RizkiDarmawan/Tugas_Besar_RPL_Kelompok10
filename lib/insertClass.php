<?php
include('Class.php');
error_reporting(0);
$str_field ="";
$str_value ="";

$secu = new security();

$inup =$_GET['inup'];
$tablename =$_GET['table'];

if($tablename=="mat_pel"){
	$aks = new dbAkses();
	$persen=$aks->select("select persen from mat_pel where id!='".$secu->escape($_GET['v1'])."'");
	$total_persen=0;
	for($i=0; $i<$aks->baris; $i++){
	    $total_persen=$total_persen+$persen[$i][0];
	}
	if(($total_persen+$_GET['v3'])>100){
        echo" Total Persen ".($total_persen+$_GET['v3'])." (Melebihi Kuota), Maximal Total Persen adalah 100 %, Please Try Again";
	    exit();
	} 
}else if($tablename=="mente"){
    $check1="";
	for($i=1; $i<15; $i++){
	    if(isset($_GET['v11c'.$i])){
	       $check1.=$_GET['v11c'.$i];
		}
	}
}else if($tablename=="m_kuliah"){
    $id_m=$_REQUEST['id_m'];
    $check=Array();
    $ak = new dbAkses();
    $ak->delete("delete from ".$tablename." where id_m ='".$id_m."'");
    for($i=1; $i<30; $i++){
        if(isset($_REQUEST['idshift'.$i])){
            $check[$i]=$_REQUEST['idshift'.$i];
            $result=$ak->input("insert into ".$tablename." values('".$id_m."','".$check[$i]."')");
        }
    }
    echo$result;
    exit();
}



$f = array();
$v = array();
for($i=1; $i<15; $i++){
   if(isset($_GET['f'.$i])){
      $f[$i]=$_GET['f'.$i];
      $v[$i]=$_GET['v'.$i];
 	  
	  if($inup=="in"){
	     if($i>1){
		    $str_field .= ", ".$f[$i]."";
            $str_value .= ", '".$secu->escape($v[$i])."'";
		 }else{
            $str_field .= "".$f[$i]."";
	        $str_value .= "'".$secu->escape($v[$i])."'";
		 }
	  }else{
	     if($i==2){
		    $str_value .= $f[$i]."='".$secu->escape($v[$i])."'";
		 }else if($i>2){
   		    if($tablename=="mente"){
				if($i==11){
				   $str_value .= ", ".$f[$i]."='".$secu->escape($check1)."'"; 
				}else{
				   $str_value .= ", ".$f[$i]."='".$secu->escape($v[$i])."'";
				}
			}else{
			    $str_value .= ", ".$f[$i]."='".$secu->escape($v[$i])."'";
			}					
		 }
	  }      
   }
   else{
      $i=15;
   }
}

if($inup=="in"){
   $sql = "insert into ".$tablename."(".$str_field.") values (".$str_value.") ";
   $aks = new dbAkses();
   echo($aks->input($sql));
}else{
   $sql = "update ".$tablename." set ".$str_value." where ".$f[1]."='".$v[1]."'";
   $aks = new dbAkses();
   echo($aks->update($sql));
}
?>