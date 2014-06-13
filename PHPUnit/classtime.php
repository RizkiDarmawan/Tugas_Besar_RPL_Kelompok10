<?php
class time{
   function __construct(){
      date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
   }
   function timer($kode){
	  $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	  $hari = date("w");
      $hari_ini = $seminggu[$hari];
	  
      $tgl_sekarang = date("Y-m-d");
      $tgl_skrg     = date("d");
      $bln_skrg = date("m");
      $thn_skrg = date("Y");
      $jam_sekarang = date("H:i:s");
      $jam_skrg = date("H");
	  $mnt_skrg = date("i");
	  $dtk_skrg = date("s");
	  
      $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
      
	  
	  $kode=strtok($kode,"");
	  $n=strlen($kode);
	  $result="";
	  for($i=0; $i<$n; $i++){
	     if($kode[$i]=="H"){$result .= $hari_ini;
		 }else if(($kode[$i]=="h")){$result .= $tgl_skrg;
		 }else if(($kode[$i]=="B")){$result .= $nama_bln[$bln_skrg+0];
		 }else if(($kode[$i]=="b")){$result .= $bln_skrg;
		 }else if(($kode[$i]=="t")){$result .= $thn_skrg;
		 }else if(($kode[$i]=="j")){$result .= $jam_skrg;
		 }else if(($kode[$i]=="m")){$result .= $mnt_skrg;
		 }else if(($kode[$i]=="d")){$result .= $dtk_skrg;
		 }else{$result .= $kode[$i];
		 }
	  }
	  return $result;
   }
   function namahari($int){
      $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
      $sel_tgl=(date("m")-(6));
	  $sel_bln=(date("m")-(11));
	  $sel_thn=(date("m")-(11));
      $int=explode("-",$int);
	  //$x  = mktime(0, 0, 0, date("m")-$sel_bulan, date("d"),  date("Y")); 
	  $x  = mktime(0, 0, 0, $int[1], $int[0], $int[2]); 
	  return $seminggu[date("w", $x)];
   }
   function namabulan($int){
      $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
      return $nama_bln[$int];      
   }
   function selisih($tanggal){
	  $int = explode("-",$tanggal);
	  $x  = mktime(0, 0, 0, $int[1], $int[0], $int[2]); 
	  $tahun=(date("Y")-date("Y", $x)-1);
	  $bulan=(date("m")-date("m", $x)+12);
	  //$hari=( cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"))-(date("d")-date("d", $x)));
  	  $hari=((date("d")-date("d", $x)));

	  $result=$tahun." tahun & ".$bulan." bulan & ".$hari." hari"; 
	  return $result;
   }

}
?>