<?php
include('Class.php');
//error_reporting(0);

$a = new dbAkses();
$qty=Array();

$hal=$_GET['hal'];

if($hal=="bagimodel1"){
    $gender=$_GET['gender'];
    $jurusan=$_GET['jurusan'];
    
    $f = new dbAkses();
    $count=$f->select("select count(id) from kelompok where id_jurusan ='".$jurusan."' and gender='".$gender."'"); 
    if($count[0][0]>0){
        echo'<div class="alert alert-danger fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Maaf !</strong> Kelompok Sudah Dibagi Sebelumnya, Fitur ini hanya berlaku untuk membagi kelompok Pertama Kali</div>';
        exit();
    }
    
    $sql="select count(id) from mente where id_jurusan ='".$jurusan."' and gender='".$gender."' and status='0'";
    $mente=$a->select($sql);
    $qmente=$mente[0][0];
    
    $sql ="select count(id) from mentor where id_jurusan ='".$jurusan."' and gender='".$gender."'";
    $mentor=$a->select($sql);
    $qmentor=$mentor[0][0];
    
    $hasilbagi;
    $sisa=0;
    if(($qmente%$qmentor)!=0){
        $sisa=$qmente%$qmentor;
        $hasilbagi=($qmente-$sisa)/$qmentor;
    }else{
        $hasilbagi=($qmente)/$qmentor;
        $batas=$hasilbagi;
    }
    
    //BAGI LANGSUNG
    $c = new dbAkses();
    $d = new dbAkses();
    $e = new dbAkses();
        
    $sql2="select id from mentor where id_jurusan ='".$jurusan."' and gender='".$gender."'";
    $data=$c->select($sql2);
    for($i=0; $i<$c->baris; $i++){
        
        
        $inp = $c->input("insert into kelompok(nama,mentor,id_jurusan,gender) values('kelp(".$jurusan.")-(".($i+1)."_".$gender.")','".$data[$i][0]."','".$jurusan."','".$gender."')");
        $id_kel = $d->select("select id from kelompok where mentor='".$data[$i][0]."'");
        
        $selmen = $e->select("select id from mente where id_jurusan ='".$jurusan."' and gender='".$gender."' and status='0'");
        if($sisa>0){
            $batas=$hasilbagi+1;
        }
        for($j=0; $j<$batas; $j++){
            if($selmen[$j][0]!=null){
                $inpmente = $d->input("insert into det_kelompok values('".$id_kel[0][0]."','".$selmen[$j][0]."')");
                $upmente = $d->update("update mente set status='1' where id='".$selmen[$j][0]."'");
            }    
        }
        if($sisa>0){
            $sisa--;
            $batas--;
        }
    }
    echo'<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Success.</strong> Kelompok Mentoring Berhasil DIbagi</div>';

}else if($hal=="bagimodel2"){
    $gender=$_GET['gender'];
    $jurusan=$_GET['jurusan'];
    $maksmente=$_GET['maksmente'];
        
    $f = new dbAkses();
    $count=$f->select("select count(id) from kelompok where id_jurusan ='".$jurusan."' and gender='".$gender."'"); 
    if($count[0][0]>0){
        echo'<div class="alert alert-danger fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Maaf !</strong> Kelompok Sudah Dibagi Sebelumnya, Fitur ini hanya berlaku untuk membagi kelompok Pertama Kali</div>';
        exit();
    }
    
    
    //BAGI LANGSUNG
    $c = new dbAkses();
    $d = new dbAkses();
    $e = new dbAkses();
    $g = new dbAkses();
    
    
    
    $sql2="select id from mentor where id_jurusan ='".$jurusan."' and gender='".$gender."'";
    $data=$c->select($sql2);
    $nokelp=1;
    for($i=0; $i<$c->baris; $i++){
           
        $inp = $c->input("insert into kelompok(nama,mentor,id_jurusan,gender) values('kelp(".$jurusan.")-(".$nokelp."_".$gender.")','".$data[$i][0]."','".$jurusan."','".$gender."')");
        $id_kel = $d->select("select id from kelompok where mentor='".$data[$i][0]."' and nama='kelp(".$jurusan.")-(".$nokelp."_".$gender.")'");
        
        $selmen = $e->select("select id from mente where id_jurusan ='".$jurusan."' and gender='".$gender."' and status='0'");
        
        for($j=0; $j<$maksmente; $j++){
            if($selmen[$j][0]!=null){
                $inpmente = $d->input("insert into det_kelompok values('".$id_kel[0][0]."','".$selmen[$j][0]."')");
                $upmente = $d->update("update mente set status='1' where id='".$selmen[$j][0]."'");
            }else{
               $i=$c->baris;
            }
            
        }
        
        if($i==($c->baris-1)){
            $sisamente=$g->select("select count(id) from mente where id_jurusan ='".$jurusan."' and gender='".$gender."' and status='0'");
            if($sisamente[0][0]>0){
               $i=-1;
            }
        }
        
        $nokelp++;
        
    }
    echo'<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Success.</strong> Kelompok Mentoring Berhasil DIbagi</div>';

    
}else if($hal=="simpan_khs"){
	$data=$_GET['jumlahdata'];
	$mente=$_GET['mente'];
	$b=new dbAkses();
	$persen= $b->select("select persen from mat_pel");
	$total=0;
	for($i=1; $i<=$data; $i++ ){
	    $mat[$i] = $_GET['mat'.$i];
		$sql="update khs set nilai='".$mat[$i]."' where mente='".$mente."' and id_mat_pel='".$i."'";
		$result=$b->update("update khs set nilai='".$mat[$i]."' where mente='".$mente."' and id_mat_pel='".$i."'");
		$total=$total+($mat[$i]*($persen[$i-1][0])/100);
	}
	$b->update("update mente set nilai='".$total."' where id='".$mente."'");
	echo$result;
}
else if($hal=="setulang"){
    $b= new dbAkses();
    echo$b->update("update mente set status='0'");

}else if($hal=="jadwal_mentoring"){
	$b= new dbAkses();
    $kelompok=$_GET['kelompok'];
	$value=$_GET['value'];
	$b->update("update kelompok set jadwal='".$value."' where id='".$kelompok."'");
	
	$data= $b->select("select jadwal_shift.hari, ket_shift.id, ket_shift.jam from jadwal_shift,ket_shift where jadwal_shift.id_ket_shift = ket_shift.id and jadwal_shift.id='".$value."'");
	echo$data[0][0]." shift ".$data[0][1]."  (".$data[0][2].")";
}



//echo json_encode($qty);
?>