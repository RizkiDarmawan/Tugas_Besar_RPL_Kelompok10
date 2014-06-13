<?php

include('../lib/Class.php');
$a = new dbAkses();

if(isset($_GET['cek'])){
	$cek=$_GET['cek'];
	if($cek=="true"){
		 $a->delete("delete from jadwal_shift");

		 $shft= $a->select("select * from ket_shift");
		 $hari= Array("minggu","senin","selasa","rabu","kamis","jumat");
		 $no=1;
		 for($i=1; $i<=5; $i++){
		 	  for($j=0; $j<$a->baris; $j++){
	    	  $status=$a->input("insert into jadwal_shift values('".$no."','".$shft[$j][0]."','".$hari[$i]."')");  
	    	  $no++;
		  	  }
		 }
		 $jadwal= $a->select("select count(*) from jadwal_shift");
    	 $shft= $a->select("select count(*) from ket_shift");
		 if($jadwal[0][0]>= ($shft[0][0]*5)){
	   	  	 echo"Success";
	     }
	}
}else if(isset($_GET['fakultas'])){
	$data=$a->select("select * from fakultas");
    $str='<option value="">- pilih fakultas -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][0].'">'.$data[$i][1].'</option>';
	}
	echo$str;
}else if(isset($_GET['jurusan'])){
    $id_fakultas=$_GET['id_fakultas'];
	$data=$a->select("select * from jurusan where id_fakultas='".$id_fakultas."'");
    $str='<option value="">- pilih jurusan -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][0].'">'.$data[$i][1].'</option>';
	}
	echo$str;
}else if(isset($_GET['mentor'])){
    $id_fakultas=$_GET['id_fakultas'];
    $gender = $_GET['gender'];
	$data=$a->select("select mentor.id,mentor.nama, jurusan.nama from mentor,jurusan,fakultas where mentor.id_jurusan=jurusan.id and jurusan.id_fakultas=fakultas.id and jurusan.id_fakultas='".$id_fakultas."' and mentor.gender='".$gender."'");
    $str='<option value="">- pilih -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][0].'">'.$data[$i][1].' - '.$data[$i][2].'</option>';
	}
	echo$str;
}else if(isset($_GET['kelompok'])){
    $id_jurusan=$_GET['id_jurusan'];
    $gender = $_GET['gender'];
	$data=$a->select("select kelompok.id, kelompok.nama, mentor.nama from kelompok,mentor where kelompok.mentor = mentor.id and kelompok.id_jurusan='".$id_jurusan."' and kelompok.gender='".$gender."'");
    $str='<option value="">- Kelompok -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][0].'">'.$data[$i][1].' - '.$data[$i][2].'</option>';
	}
	echo$str;
}else if(isset($_GET['kelompok_mentor'])){
	$id_m= $_GET['id_m'];
	$data=$a->select("select kelompok.id, kelompok.nama, mentor.nama from kelompok,mentor where kelompok.mentor = mentor.id and kelompok.mentor='".$id_m."' ");
    $str='<option value="">- Kelompok -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][0].'">'.$data[$i][1].' - '.$data[$i][2].'</option>';
	}
	echo$str;
}else if(isset($_GET['kelompok_mente'])){
	$id_kel= $_GET['id_kel'];
	$data=$a->select("select det_kelompok.id, det_kelompok.mente, mente.nama from det_kelompok,mente where det_kelompok.mente = mente.id and det_kelompok.id='".$id_kel."' ");
    $str='<option value="">- pilih mente -</option>';
	for($i=0; $i<$a->baris; $i++){
		 $str.='<option value="'.$data[$i][1].'">'.$data[$i][1].' - '.$data[$i][2].'</option>';
	}
	echo$str;
}
?>