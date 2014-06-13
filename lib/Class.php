<?php

class webApp{
     
     private $page; 
     
     function __Construct(){
	        
            if(isset($_GET['pg'])){
                //error_reporting(0);
                $this->page=$_GET['pg'];
                return include($this->page.'.php');
            }else{
                return include('dashboard.php');
            }
     }
     function generatepage(){
            if(isset($_GET['pg'])){
			    $this->page=$_GET['pg'];
                return include($this->page.'.php');
            }
     }
}

/*==============================================================================================================================================*/

class dbKontrol{
   private $host = "localhost";
   private $user = "root";
   private $pass = "";
   private $dbname = "lmai2014";
   protected $conn;
   
   protected function dbBuka(){
      $this->conn = mysqli_connect("$this->host","$this->user","$this->pass","$this->dbname");
	  if(mysqli_connect_error()){
	     echo "Koneksi Ke DB Error Karena : ".mysqli_connect_error();
	  }
   }
   protected function dbTutup(){
      mysqli_close($this->conn);
   }
}
/*==============================================================================================================================================*/

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

/*==================================================================================================================================*/

Class khs{
	
	public $angkatotal=0;
	
	function predikat($nilai){
	    
		$pred="";
		
		if($nilai<=100&&$nilai>=80){
		    $pred="A";
		}else if($nilai<=79&&$nilai>=70){
			$pred="B";
		}else if($nilai<=69&&$nilai>=50){
			$pred="C";
		}else if($nilai<=49&&$nilai>=40){
			$pred="D";
		}else if($nilai<=39&&$nilai>=0){
		    $pred="E";
		}else{
		    $pred="unknow";
		}
		return$pred;
	}

}

/*==================================================================================================================================*/
class security extends dbKontrol{
   function replace($str){
      $str =str_replace('"', "''", $str);
	  $str =str_replace("'", "''", $str);
      $str =str_replace("$", "", $str);
      $str =str_replace("#", "", $str);
      $str =str_replace(";", "", $str);
      $str =str_replace("%", "", $str);
      $str = strip_tags($str);
      return $str;
   }
   function escape($str){
	  $this->dbBuka();
	  $str = mysqli_real_escape_string($this->conn,$str);
	  return $str;
   }
}

/*==============================================================================================================================================*/

class dbAkses extends dbKontrol{
   public $baris;
   public $kolom;
   function __construct(){
      $this->dbBuka();
   }
   function select($sql){
	  $exec= mysqli_query($this->conn,$sql);
	  if(!$exec){echo"##### SQL ANDA SALAH ##### ! ".mysqli_error($this->conn); exit();}

	  $array = array();
	  
	  $this->baris = 0;
	  while($data=mysqli_fetch_row($exec)){
	     $field=mysqli_num_fields($exec);
		 for($this->kolom=0; $this->kolom<$field; $this->kolom++){
		    $array[$this->baris][$this->kolom] = $data[$this->kolom];
		 }
		 $this->baris++;
	  }
	  return $array;
   }
   
   function input($sql){
      $result= mysqli_query($this->conn,$sql);
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
   function update($sql){
      $result= mysqli_query($this->conn,$sql)or die (mysqli_error($this->conn));
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
   function delete($sql){
      $result=mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
}

/*==============================================================================================================================================*/

class paging extends dbKontrol{
    public $listpage;
    public $listpage2;
   	function __construct(){
        $this->dbBuka();
	}	

	function generate_paging_text($curPage,$totalRec,$maxRec,$tablename){
		$totalRec;
		$totalPage=ceil($totalRec/$maxRec);
		$pagedibagi=ceil($totalPage/10);
		$curpagedibagi=ceil($curPage/10);
		$str="";
		/*--------------------------prev button-----------------------*/
		if($curPage>1){ // If current page is not in first page, so show "prev" button			
			$prevPage = $curPage-1;
			$str.=" ".$this->makeLink($prevPage,$tablename,"prev","?p=".$prevPage)." ";	
			$str.=" ".$this->makeLink(1,$tablename,"first","?p=1")." ";		
		}else{
		    $str.=" ".$this->makeLink(0,$tablename,"prev","#")." ";
			$str.=" ".$this->makeLink(1,$tablename,"first","?p=1")." ";
		}	
		/*-------------------------generate page number----------------*/
		if($pagedibagi>1){
		    if($curPage>10){
			   if($pagedibagi==$curpagedibagi){
			      $starthref=(($curpagedibagi-1)*10)+1;
				  $finishref=$totalPage;
			   }
			   else{
			      $starthref=(($curpagedibagi-1)*10)+1;
				  $finishref=($curpagedibagi)*10;
			   }
			   $prevhal=(($curpagedibagi-1)*10);
			   $str.=" ".$this->makeLink($prevhal,$tablename,"...","?p=".$prevhal)." ";
			   for($i=$starthref;$i<=$finishref;$i++){
			      if($i==$curPage){
				     $bold=true;
			      }else{
				     $bold=false;
			      }
			      $str.=" ".$this->makeLink($i,$tablename,$i,"?p=".$i,$bold)." ";
		       }
			   if($pagedibagi!=$curpagedibagi){
			      $nexthal=(($curpagedibagi)*10)+1;
			      $str.=" ".$this->makeLink($nexthal,$tablename,"...","?p=".$nexthal)." ";  
			   }
			}else{
			   for($i=1;$i<=10;$i++){
			      if($i==$curPage){
				     $bold=true;
			      }else{
				     $bold=false;
			      }
			      $str.=" ".$this->makeLink($i,$tablename,$i,"?p=".$i,$bold)." ";
		       }
			   $str.=" ".$this->makeLink($i,$tablename,"...","?p=".$i)." ";  
			}
		}else{
		    for($i=1;$i<=$totalPage;$i++){
			   if($i==$curPage){
				  $bold=true;
			   }else{
				  $bold=false;
			   }
			   $str.=" ".$this->makeLink($i,$tablename,$i,"?p=".$i,$bold)." ";
		    }
		}
		/*--------------------------next button-----------------------*/
		if($curPage<$totalPage){ // If current page is not in last page, so show next button			
			$nextPage=$curPage+1;
			$str.=" ".$this->makeLink($totalPage,$tablename,"last","?p=".$totalPage)." ";
			$str.=" ".$this->makeLink($nextPage,$tablename,"next","?p=".$nextPage)." ";			
		}else{
		    $str.=" ".$this->makeLink($totalPage,$tablename,"last","?p=".$totalPage)." ";
		    $str.=" ".$this->makeLink(0,$tablename,"next","#")." ";
		}
		$str = 
		$this->listpage = $str;
		
	}

	function makeLink($num,$tablename,$str,$url,$bold=false){
		if($url!="#"){
		   if($bold){
			   $str='<li class="active"><a href="#fakultas-start" onclick="return app.refreshtable(\''.$tablename.'\','.$num.')">'.$str.'</a></li>';
		   }else{
		       $str='<li><a href="#fakultas-start" onclick="return app.refreshtable(\''.$tablename.'\','.$num.')">'.$str.'</a></li>';
		   }
		}else{
		   $str='<li class="disabled"><a>'.$str.'</a></li>';
		   //$str='<a class="pagination" style="background:#eee; color:#fff;">'.$str.'</a>';
		}
		return $str;
	}	

	function select($query,$rec){
	
	    $curPage=($_GET['p']==null)?1:$_GET['p']; // IF current page is null, so it means user is in page 1
	    $maxRec=$rec;
   	    
		$startRec = ($curPage-1)*$maxRec; //TO GET START RECORD
		$query=strtolower($query);
		$sql = $query." limit ".$startRec.",".$maxRec;
		$exec=mysqli_query($this->conn,$sql);
		if(!$exec){echo" 2 ##### SQL ANDA SALAH  ##### !<br />"; echo(mysqli_error($this->conn)); exit();}
		
		$array = array();
	  
	  	$this->baris = 0;
	  	while($data=mysqli_fetch_row($exec)){
	     	$field=mysqli_num_fields($exec);
		 	for($this->kolom=0; $this->kolom<$field; $this->kolom++){
		    	$array[$this->baris][$this->kolom] = $data[$this->kolom];
		 	}
		 	$this->baris++;
	  	}
	  	
	    // get total Record from your table in database
   		$strArr=explode("from",strtolower($query));
        $tablename=explode(",",$strArr[1]);
        $tablename=explode(" ",$tablename[0]);
        
		$total_record=mysqli_query($this->conn,"SELECT COUNT(*) FROM".$strArr[1]."");
		$total_record=mysqli_fetch_row($total_record);
		$total_record=$total_record[0];	
	
		$this->generate_paging_text($curPage,$total_record,$maxRec,$tablename[1]);
		return $array;
	
	}
}

/*==============================================================================================================================================*/

class pagingkhusus extends dbKontrol{
    public $listpage;
    public $listpage2;
   	function __construct(){
        $this->dbBuka();
	}	

	function generate_paging_text($curPage,$totalRec,$maxRec,$tablename,$tablelink){
		$totalRec;
		$totalPage=ceil($totalRec/$maxRec);
		$pagedibagi=ceil($totalPage/10);
		$curpagedibagi=ceil($curPage/10);
		$str="";
		/*--------------------------prev button-----------------------*/
		if($curPage>1){ // If current page is not in first page, so show "prev" button			
			$prevPage = $curPage-1;
			$str.=" ".$this->makeLink($tablelink,$prevPage,$tablename,"prev","?p=".$prevPage)." ";	
			$str.=" ".$this->makeLink($tablelink,1,$tablename,"first","?p=1")." ";		
		}else{
		    $str.=" ".$this->makeLink($tablelink,0,$tablename,"prev","#")." ";
			$str.=" ".$this->makeLink($tablelink,1,$tablename,"first","?p=1")." ";
		}	
		/*-------------------------generate page number----------------*/
		if($pagedibagi>1){
		    if($curPage>10){
			   if($pagedibagi==$curpagedibagi){
			      $starthref=(($curpagedibagi-1)*10)+1;
				  $finishref=$totalPage;
			   }
			   else{
			      $starthref=(($curpagedibagi-1)*10)+1;
				  $finishref=($curpagedibagi)*10;
			   }
			   $prevhal=(($curpagedibagi-1)*10);
			   $str.=" ".$this->makeLink($tablelink,$prevhal,$tablename,"...","?p=".$prevhal)." ";
			   for($i=$starthref;$i<=$finishref;$i++){
			      if($i==$curPage){
				     $bold=true;
			      }else{
				     $bold=false;
			      }
			      $str.=" ".$this->makeLink($tablelink,$i,$tablename,$i,"?p=".$i,$bold)." ";
		       }
			   if($pagedibagi!=$curpagedibagi){
			      $nexthal=(($curpagedibagi)*10)+1;
			      $str.=" ".$this->makeLink($tablelink,$nexthal,$tablename,"...","?p=".$nexthal)." ";  
			   }
			}else{
			   for($i=1;$i<=10;$i++){
			      if($i==$curPage){
				     $bold=true;
			      }else{
				     $bold=false;
			      }
			      $str.=" ".$this->makeLink($tablelink,$i,$tablename,$i,"?p=".$i,$bold)." ";
		       }
			   $str.=" ".$this->makeLink($tablelink,$i,$tablename,"...","?p=".$i)." ";  
			}
		}else{
		    for($i=1;$i<=$totalPage;$i++){
			   if($i==$curPage){
				  $bold=true;
			   }else{
				  $bold=false;
			   }
			   $str.=" ".$this->makeLink($tablelink,$i,$tablename,$i,"?p=".$i,$bold)." ";
		    }
		}
		/*--------------------------next button-----------------------*/
		if($curPage<$totalPage){ // If current page is not in last page, so show next button			
			$nextPage=$curPage+1;
			$str.=" ".$this->makeLink($tablelink,$totalPage,$tablename,"last","?p=".$totalPage)." ";
			$str.=" ".$this->makeLink($tablelink,$nextPage,$tablename,"next","?p=".$nextPage)." ";			
		}else{
		    $str.=" ".$this->makeLink($tablelink,$totalPage,$tablename,"last","?p=".$totalPage)." ";
		    $str.=" ".$this->makeLink($tablelink,0,$tablename,"next","#")." ";
		}
		$str = 
		$this->listpage = $str;
		
	}

	function makeLink($tablelink,$num,$tablename,$str,$url,$bold=false){
		if($url!="#"){
		   if($bold){
			   $str='<li class="active"><a href="#fakultas-start" onclick="return app.refreshtable2(\''.$tablelink.'\','.$num.')">'.$str.'</a></li>';
		   }else{
		       $str='<li><a href="#fakultas-start" onclick="return app.refreshtable2(\''.$tablelink.'\','.$num.')">'.$str.'</a></li>';
		   }
		}else{
		   $str='<li class="disabled"><a>'.$str.'</a></li>';
		   //$str='<a class="pagination" style="background:#eee; color:#fff;">'.$str.'</a>';
		}
		return $str;
	}	

	function select($query,$rec,$tablelink){
	
	    $curPage=($_GET['p']==null)?1:$_GET['p']; // IF current page is null, so it means user is in page 1
	    $maxRec=$rec;
   	    
		$startRec = ($curPage-1)*$maxRec; //TO GET START RECORD
		$query=strtolower($query);
		$sql = $query." limit ".$startRec.",".$maxRec;
		$exec=mysqli_query($this->conn,$sql);
		if(!$exec){echo" 2 ##### SQL ANDA SALAH  ##### !<br />"; echo(mysqli_error($this->conn)); exit();}
		
		$array = array();

        $this->baris = 0;
	  	while($data=mysqli_fetch_row($exec)){
	     	$field=mysqli_num_fields($exec);
		 	for($this->kolom=0; $this->kolom<$field; $this->kolom++){
		    	$array[$this->baris][$this->kolom] = $data[$this->kolom];
		 	}
		 	$this->baris++;
	  	}
	  	
	    // get total Record from your table in database
   		$strArr=explode("from",strtolower($query));
        $tablename=explode(",",$strArr[1]);
        $tablename=explode(" ",$tablename[0]);
        
		$total_record=mysqli_query($this->conn,"SELECT COUNT(*) FROM".$strArr[1]."");
		$total_record=mysqli_fetch_row($total_record);
		$total_record=$total_record[0];	
	
		$this->generate_paging_text($curPage,$total_record,$maxRec,$tablename[1],$tablelink);
		return $array;
	
	}
}
/*==============================================================================================================================================*/

Class userSession extends dbKontrol{
	function __construct(){
        $this->dbBuka();
		session_start();
	}	
	public function userLogin(){
		$user = mysqli_real_escape_string($this->conn, $_POST['user']);
        $pass = mysqli_real_escape_string($this->conn, $_POST['pass']);  
		$passAslab = md5($passAslab);
        $sql="SELECT id,nama FROM mente WHERE (id='".$user."' OR nama='".$user."' OR email='".$user."') AND password='".$pass."'";
        $query=mysqli_query($this->conn, $sql);
		
		if(mysqli_num_rows($query)==1){
		    $rememberme = $_REQUEST['rememberme'];
			if ($rememberme==1) {setcookie('rememberme','true',time() + 7200);}
				
			$row=  mysqli_fetch_array($query);
		    $_SESSION['lmai_id'] = $row['id'];
			$_SESSION['lmai_nama'] = $row['nama'];
			$_SESSION['lmai_login'] = true;
			$_SESSION['lmai_jabatan'] = "Mente";
			header('Location: ../portal/');
		}else{
			$sql="SELECT id,nama FROM mentor WHERE (id='".$user."' OR nama='".$user."' OR email='".$user."') AND password='".$pass."'";
        	$query=mysqli_query($this->conn, $sql);
			if(mysqli_num_rows($query)==1){
			    $rememberme = $_REQUEST['rememberme'];
				if ($rememberme==1) {setcookie('rememberme','true',time() +7200);}
						
		    	$row=  mysqli_fetch_array($query);
		        $_SESSION['lmai_id'] = $row['id'];
			    $_SESSION['lmai_nama'] = $row['nama'];
				$_SESSION['lmai_login'] = true;
				$_SESSION['lmai_jabatan'] = "Mentor";
			    header('Location: ../portal');
			}
			else{
			    $_SESSION['lmai_loginfail'] = 1;
				return"failed";
			}
		}
  	
	}
    public function userLogout($useratauadmin) {
        if($useratauadmin=="user"){
            unset($_SESSION['lmai_id']);
            unset($_SESSION['lmai_nama']);
            unset($_SESSION['lmai_login']);
            unset($_SESSION['lmai_jabatan']);
		    header('Location: ../reg/');
        }else if($useratauadmin=="admin"){
            unset($_SESSION['lmai_id_admin']);
            unset($_SESSION['lmai_nama_admin']);
            unset($_SESSION['lmai_login_admin']);
            unset($_SESSION['lmai_level_admin']);
		    header('Location: ./login.php'); 
        }else if($useratauadmin=="dosen"){
            unset($_SESSION['lmai_id_dosen']);
            unset($_SESSION['lmai_nama_dosen']);
            unset($_SESSION['lmai_login_dosen']);
		    header('Location: ./login.php'); 
        }
    }
	public function adminLogin(){
		$user = mysqli_real_escape_string($this->conn, $_POST['user']);
        $pass = mysqli_real_escape_string($this->conn, $_POST['pass']);  
		$sql="SELECT id,nama,id_fakultas FROM admin_f WHERE (id='".$user."' OR nama='".$user."' OR email='".$user."') AND password='".$pass."'";
        $query=mysqli_query($this->conn, $sql);
		
		if(mysqli_num_rows($query)==1){
		    $rememberme = $_REQUEST['rememberme'];
			if ($rememberme==1) {setcookie('rememberme','true',time() + 7200);}
				
			$row=  mysqli_fetch_array($query);
		    $_SESSION['lmai_id_admin'] = $row['id'];
			$_SESSION['lmai_nama_admin'] = $row['nama'];
			$_SESSION['lmai_login_admin'] = true;
			$_SESSION['lmai_level_admin'] = $row['id_fakultas'];
			header('Location: ../admin/admin_f');
		}else{
			$sql="SELECT id,nama FROM admin_p WHERE (id='".$user."' OR nama='".$user."' OR email='".$user."') AND password='".$pass."' AND nama!='dosen agama islam'";
			$query=mysqli_query($this->conn, $sql);
			
			if(mysqli_num_rows($query)==1){
				$row=  mysqli_fetch_array($query);
				$_SESSION['lmai_id_admin'] = $row['id'];
				$_SESSION['lmai_nama_admin'] = $row['nama'];
				$_SESSION['lmai_login_admin'] = true;
				
				header('Location: ../admin/admin_p');
			}else{
				$_SESSION['lmai_loginfail'] = 1;
				return"failed";
			}
		}		
	}
	
	public function dosenLogin(){
		$user = mysqli_real_escape_string($this->conn, $_POST['user']);
        $pass = mysqli_real_escape_string($this->conn, $_POST['pass']);  
		$sql="SELECT id,nama FROM admin_p WHERE (id='".$user."' OR nama='".$user."' OR email='".$user."') AND password='".$pass."'";
		$query=mysqli_query($this->conn, $sql);
			
		if(mysqli_num_rows($query)==1){
			$row=  mysqli_fetch_array($query);
			$_SESSION['lmai_id_dosen'] = $row['id'];
			$_SESSION['lmai_nama_dosen'] = $row['nama'];
			$_SESSION['lmai_login_dosen'] = true;
				
			header('Location: ../dosen');
		}else{
			$_SESSION['lmai_loginfail'] = 1;
			return"failed";
		}
				
	}
}

Class userReg extends dbKontrol{
	function __construct(){
        $this->dbBuka();
		session_start();
	}
	public function register($table){
	    
		if(isset($_POST['submit'])){
			$secur = new security();		
			$nama =  $secur->escape($_POST['nama']);
			$id = $secur->escape($_POST['id']);
			$pass = md5($secur->escape($_POST['password']));
			$gender = $secur->escape($_POST['gender']);
			$jurusan = $secur->escape($_POST['jurusan']);
			
			$a= new dbAkses();
			$qty = $a->select("select count(id) from mente where id='".$id."'");
			if($qty[0][0]!=1){
			    $sql="insert into ".$table."(id,nama,password,gender,id_jurusan) values('".$id."','".$nama."','".$pass."','".$gender."','".$jurusan."')";
				$rs = $a->input($sql);
				if($rs=="Success"){
					$_SESSION['lmai_id'] = $id;
			    	$_SESSION['lmai_nama'] = $nama;
					$_SESSION['lmai_login'] = true;
					$_SESSION['lmai_jabatan'] = $table;
			    	
					header('Location: ../open');
				}else{
					return("double");
				}
			}else{
			    return("double");
			}			
		
		}
	}	
}

/*==============================================================================================================================================*/

class forgotPass extends dbKontrol{
	function __construct(){
        $this->dbBuka();
	}
	
	function cekEmail(){
		//$a=new dbAkses();
		//$cek = $a->select("select count(id) from ");
	}
	
	function kirimEmail($email){
		$pesan = "Untuk Mengganti Password Anda Silahkan klik Link Berikut: <br/>";
		$pesan .= '<a href="http://localhost">LINK CHANGE PASSWORD</a>';
		
		$header = "From: admin@lmai.unand.ac.id \n";
		$header .= "Content-type: text/html \r \n";
		
		$kirimEmail = mail($email, "Token Change Password", $pesan, $header);
		
		if ($kirimEmail)
			return true;
		else
			return false;
	
	}
}

/*==============================================================================================================================================*/


?>
