<?php
include('Class.php');
error_reporting(0);
$tablename =$_GET['table'];
$id =$_GET['id'];

$aks = new dbAkses;


if($tablename=="mentesel"){
    $length=$_GET['length'];
    $id_kelompok = $_GET['id_kelompok'];

    $id=explode(",",$id);
    for($j=0; $j<$length; $j++){
       $sql="insert into det_kelompok values('".$id_kelompok."','".$id[$j]."') ";
       $sql2="update mente set status=1 where id='".$id[$j]."'";
       $data=$aks->input($sql);
       $data=$aks->update($sql2);
    }
}else if($tablename=="mentehap"){
    $sql="delete from det_kelompok where mente='".$id."'";
    $sql2="update mente set status='0' where id='".$id."'";
    $data=$aks->update($sql2);
    $aks->delete($sql);

}
			  
echo$data;
		
	
?>