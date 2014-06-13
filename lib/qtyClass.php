<?php
include('Class.php');

$aks = new dbAkses();
$qty=Array();


if(isset($_GET['automatis'])){
    $no=0;
    $gender=$_GET['gender'];
    $fakultas=$_GET['fakultas'];
    $jurusan=$_GET['jurusan'];
    
    $namajurusan=$aks->select("select nama from jurusan where id='".$jurusan."'");
    
    $sql="select count(id) from mente where id_jurusan = '".$jurusan."' and gender='".$gender."'";
    $sql2="select count(id) from mentor where id_jurusan = '".$jurusan."' and gender='".$gender."'";
    
    $data=$aks->select($sql);
    $qty[$no]=$data[0][0];$no++;
    
    $data=$aks->select($sql2);
    $qty[$no]=$data[0][0];$no++;
    
    $qty[$no]="Kawasan Jurusan : ".$namajurusan[0][0];$no++;
    $qty[$no]=$gender;$no++;
    $qty[$no]=$jurusan;$no++;

    
    echo json_encode($qty);
    
    exit();   
}

$datamaster = Array("fakultas","jurusan","mat_pel","amalanyaumi","admin_f","admin_p","ket_shift","kode_mentor","mentor","mente","kelompok");

$no=0;
for($i=0; $i<11; $i++){
    if($datamaster[$i]!=null){
       if($datamaster[$i]=="mentor"||$datamaster[$i]=="mente"){
           $sql = "select count(id) from ".$datamaster[$i]." where gender='L' ";
           $data= $aks->select($sql);
	       $qty[$no]=$data[0][0];
           $no++;
           
           $sql = "select count(id) from ".$datamaster[$i]." where gender='P' ";
           $data= $aks->select($sql);
	       $qty[$no]=$data[0][0];
           $no++;
       }else if($datamaster[$i]=="kelompok"){
           $sql = "select count(kelompok.id) from kelompok,mentor where kelompok.mentor=mentor.id and mentor.gender='L' ";
           $data= $aks->select($sql);
	       $qty[$no]=$data[0][0];
           $no++;
           
           $sql = "select count(kelompok.id) from kelompok,mentor where kelompok.mentor=mentor.id and mentor.gender='P' ";
           $data= $aks->select($sql);
	       $qty[$no]=$data[0][0];
           $no++;
           
       }else{
           $sql = "select count(id) from ".$datamaster[$i]." ";
           $data= $aks->select($sql);
	       $qty[$no]=$data[0][0];
           $no++;
       }
    }else{
       $i=15;
    }
}


echo json_encode($qty);
?>