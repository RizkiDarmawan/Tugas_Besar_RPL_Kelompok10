<?php
include('Class.php');
include('../fpdf/fpdf.php');


class PDF extends FPDF
{
    public $width = array();
    public $align = array();
    
    
    function lebarcell(){
        return $this->width = $this->width;
    }
    
    function text_align(){
        return $this->align = $this->align;
    }
    
    function ambildata($sql){
        $a = new dbAkses();
        return $a->select($sql);
    }
    
    function LoadData($file){
        //Read file lines
        $lines=file($file);
        $data=array();
        foreach($lines as $line)
        $data[]=explode(';',chop($line));
        return $data;
        
        //cara menjalankan fungsi : $data=$pdf->LoadData('countries.txt');

    }
    
    function bagusTable($header,$data){
        //Colors, line width and bold font
        $this->SetFillColor(69,154,27);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = $this->lebarcell();
        $align = $this->text_align();
        //Header
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        
        //Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        //Data
        $fill=false;
        $no=1;
        foreach($data as $row)
        {   
            $i=0;
            
            $this->Cell($w[$i],6,$no,'LR',0,$align[$i],$fill);
            $i++;
            foreach($row as $col){
                $this->Cell($w[$i],6,$col,'LR',0,$align[$i],$fill);
                $i++;
                if($i==count($w)){$i=0;}
            }
            $this->Ln();
            $fill=!$fill;
            $no++;
                
        }
        $this->Cell(array_sum($w),0,'','T');
    }
    
    function menteDoc($kondisi){
        $pdf = new PDF('L');
        $pdf->width= array(10,23,45,7,29,10,40,40,10,10,10,45);
        $pdf->align= array('C','C','L','C','L','R','L','L','C','C','C','L');
        $pdf->SetFont('Arial','',10);

/*        $gender = $_REQUEST['gender'];
    $liqo = $_REQUEST['liqo'];
    $rohis = $_REQUEST['rohis'];*/

        $header=array('No','NIM','Nama','G','Phone','Nilai','Jurusan','Fakultas','Gol','Liqo','Rohis','Prestasi');
        $data=$pdf->ambildata("select mente.id, mente.nama, mente.gender, mente.hp, mente.nilai, jurusan.nama, fakultas.nama, mente.golongan_darah, mente.liqo, mente.rohis, mente.prestasi from mente, jurusan, fakultas where mente.id_jurusan =jurusan.id and jurusan.id_fakultas = fakultas.id ".$kondisi);
        $pdf->AddPage();
        $pdf->bagusTable($header,$data);
        $pdf->Output();
    }
    
    function mentorDoc($kondisi){
        $pdf = new PDF('L');
        $pdf->width= array(10,23,45,7,29,40,40,10,10,10);
        $pdf->align= array('C','C','L','C','L','L','L','C','C','C');
        $pdf->SetFont('Arial','',10);

/*        $gender = $_REQUEST['gender'];
    $liqo = $_REQUEST['liqo'];
    $rohis = $_REQUEST['rohis'];*/

        $header=array('No','NIM','Nama','G','Phone','Jurusan','Fakultas','Gol','PPM','SM');
        $data=$pdf->ambildata("select mentor.id, mentor.nama, mentor.gender, mentor.hp, jurusan.nama, fakultas.nama, mentor.golongan_darah, mentor.ppm, mentor.sm from mentor, jurusan, fakultas where mentor.id_jurusan =jurusan.id and jurusan.id_fakultas = fakultas.id ".$kondisi);
        $pdf->AddPage();
        $pdf->bagusTable($header,$data);
        $pdf->Output();
    }
}



//$newdoc = new PDF();
//$newdoc->menteDoc("id_jurusan='6' order by mente.nama");
//$newdoc2 = new PDF();
//$newdoc2->mentorDoc("id_jurusan='6' order by nama");

//$newdoc->menteDoc("");

    
if(isset($_GET['mente'])){
    
    $gender = $_GET['gender'];
    $liqo = $_GET['liqo'];
    $rohis = $_GET['rohis'];
    
    $tambahan="";
    
    if ($_GET['fakultas']!=""){
        $fakultas = $_GET['fakultas'];
        $tambahan .= " and fakultas.id=".$fakultas;
    }
    if ($_GET['jurusan']!=""){
        $jurusan = $_GET['jurusan'];
        $tambahan .= " and jurusan.id=".$jurusan;
    }
    if ($_GET['gol_dar']!=""){
        $goldar = $_GET['gol_dar'];
        $tambahan .= " and mente.golongan_darah='".$goldar."'";
    }
    
    
    $newdoc = new PDF();
    
    $newdoc->menteDoc(" and mente.gender LIKE '%".$gender."%' and mente.liqo LIKE '%".$liqo."%' and mente.rohis LIKE '%".$rohis."%' ".$tambahan." order by mente.id asc");
}

if(isset($_GET['mentor'])){
    
    $gender = $_GET['gender'];
    $ppm = $_GET['ppm'];
    $sm = $_GET['sm'];
    
    $tambahan="";
    
    if ($_GET['fakultas']!=""){
        $fakultas = $_GET['fakultas'];
        $tambahan .= " and fakultas.id=".$fakultas;
    }
    if ($_GET['jurusan']!=""){
        $jurusan = $_GET['jurusan'];
        $tambahan .= " and jurusan.id=".$jurusan;
    }
    if ($_GET['gol_dar']!=""){
        $goldar = $_GET['gol_dar'];
        $tambahan .= " and mentor.golongan_darah='".$goldar."'";
    }

    $newdoc = new PDF();
    
    $newdoc->mentorDoc(" and mentor.gender LIKE '%".$gender."%' and mentor.ppm LIKE '%".$ppm."%' and mentor.sm LIKE '%".$sm."%' ".$tambahan." order by mentor.id asc");
    //$newdoc->mentorDoc("");
}


?>

