var server='http://localhost/project/rpl-2/lib/';
var textsearch="";
var tapus="";
var rowtable="";
var paksa="";
var idceklis=[];
var idkelompok;
var idjurusan;
var gender;
var maksmente;

//=================================================================================================================================//

var app = {
    
    initialize: function() {
        data_master.quantitas();
        p_kelompok.generatefakultas();
		app.refreshtable('timeline');
	    data_mentor.refreshtable('mente');
        data_mentor.refreshtable('mentor');
        p_kelompok.refreshtable('kelompok');

    },

    refreshtable : function(id,paging){
	  	$("#"+id+"-refresh").click();
      	idceklis.length=0;
	  	paksa="";
   	  	var link;
	  	if(textsearch!=""){
	     	  link="&search="+textsearch;
	  	}	  	
	  	
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p='+paging+''+link,
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
   	  	return false;  
	},
    
    refreshtable2 : function(id,paging){
        var str = id.split("-");
        var nilai = str[1];
        id=str[0];
        var namagender=$("#gen"+str[2]).val();
        var link;
        
	  	if(textsearch!=null){
	     	  link="&search="+textsearch;
	  	}
        $.ajax({
      		  url:server+'tableClass.php?table='+id+'&p='+paging+'&val='+nilai+'&gen='+str[2]+'&gender='+namagender+''+link,
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
                    if(id=="kelmente"){
                       idkelompok=nilai;
                    }else if(id=="mentesel"){
                       idjurusan=nilai;
                       gender=str[2];
                       idceklis.length=0;
                    }
	  		  },
	  	});
   	  	return false;  
	},
	perdana : function(id){
		 $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#formWizard1").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  	  if(id=="mente"||id=="mentor"){
					    $("#"+id+"-fiturinfo").html('<div class="panel-stat3 bg-success fadeInLeft animation-delay1" style="text-align:center; margin-top:10%;"><h2 class="fadeInDown animation-delay3">Syukron Jazakullah Khairan.</h2><h1 class="fadeInDown animation-delay5">Fitur portal anda <strong>telah aktif</strong>. </h1><div class="stat-icon"><i class="fa fa-user fa-3x"></i></div></div>');
				  }
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},

}
//=================================================================================================================================//

var data_mentor = {
    
    refreshtable : function(id){
	  	
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
	  	data_master.pengenerate(id);
		
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p=1',
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},
    
    searching : function(id){
        $.ajax({
      		  url:server+'tableClass.php',
	  		  data:$("#"+id+"-searchform").serialize(),
	  		  beforeSend:function(){
	     	       $("#"+id+"-tableinfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
                  $("#"+id+"-table").html(""); 
                  $("#"+id+"-table").html(data);
                  $("#"+id+"-tableinfo").html(""); 
	    	  },
	  		  error:function(){$("#"+id+"-tableinfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	
        
        return false;
	},

    update : function(id,sql){
        $.ajax({
      		 url:server+'updateClass.php?sql='+sql+'&table='+id,
	  		 dataType:"json",
	  		 beforeSend:function(){
	     	 },
	  		 success:function(data){
        			$(".profil-nama").html(data[0][3]);
					$(".profil-email").html(data[0][2]);
					$(".profil-id").html(data[0][0]);
					$(".profil-hp").html(data[0][5]);
					$(".profil-gender").html(data[0][4]);
					
					
					if(id=="mente"){
						$(".profil-alamat").html(data[0][12]);
						$(".profil-golongan_darah").html(data[0][8]);
                        var prestasi = data[0][11];
                        prestasi = prestasi.split(', ');
                        var strpres = "";
                        for (var j=0; j<prestasi.length; j++){
                            strpres += '<span class="badge badge-warning">'+prestasi[j]+'</span><br /><br />';
                        }
                        $("#prestasi").html(strpres);
                        
                        if(data[0][9]=="y"){
                            $("#contr1").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Pernah Mentoring</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr1").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum Mentoring</div><div class="text-muted"></div></div>');
                        }
                        
                        if(data[0][10]=="y"){
                            $("#contr2").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Alumni Rohis</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr2").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Bukan Rohis</div><div class="text-muted"></div></div>');
                        }
                        
					
					}else if(id=="mentor"){
						$(".profil-alamat").html(data[0][6]);
						$(".profil-golongan_darah").html(data[0][7]);
                        
                        if(data[0][8]=="y"){
                            $("#contr1").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Sudah PPM</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr1").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum PPM</div><div class="text-muted"></div></div>');
                        }
                        
                        if(data[0][9]=="y"){
                            $("#contr2").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Sudah SM</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr2").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum SM</div><div class="text-muted"></div></div>');
                        }

					}
					
                    $("#tabbar").html('<li ><a href="#overview" onclick="" data-toggle="tab"><span class="block text-center"><i class="fa fa-home fa-2x"></i></span>Overview</a></li><li class="active"><a href="#'+id+'" onclick="data_mentor.refreshtable(\''+id+'\')" data-toggle="tab"><span class="block text-center"><i class="fa fa-edit fa-2x"></i></span>Detail '+id+'</a></li><li><a href="#rekap_'+id+'" onclick="data_master.generatefakultas()" data-toggle="tab"><span class="block text-center"><i class="fa fa-save fa-2x"></i></span>Rekap Data '+id+'</a></li>');
                    
                    
	  		 },
	  		 error:function(){
	     	 }
   	  	});
   	  	return false;   
	},
}

//=================================================================================================================================//
var data_master = {
    
    quantitas : function(){
		$.ajax({
      		 url:server+'qtyClass.php',
	  		 dataType:"json",
	  		 beforeSend:function(){
	  		 },
	  		 success:function(data){
					for(var i=0; i<15; i++){
		 			    if(data[i]!=null){
						   $("#qty"+(i+1)).html(data[i]);
						}else{
						   i=15;
						}
					}
	  		 },
	  		 error:function(){
	  		 }
   	  	});
   	  	return false;
	},
    
    refreshtable : function(id){
	  	
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
	  	data_master.pengenerate(id);
		
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p=1',
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},
    
    refreshtable2 : function(id,paging){
	  	$("#"+id+"-refresh").click();
      	idceklis.length=0;
	  	paksa="";
   	  	var link;
	  	if(textsearch!=""){
	     	  link="&search="+textsearch;
	  	}	  	
	  	
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p='+paging+''+link,
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
   	  	return false;  
	},

    
    insert : function(form,id){
		 $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#"+id+"-form").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  		if(data=='Success'){$("#"+id+"-forminfo").html('<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Well done!</strong> You '+data+'.</div>');
		 	 		    if(id=="fakultas"){data_master.generatefakultas();}
						if(id=="mente"||id=="mentor"){
						    $("#"+id+"-fiturinfo").html('<div class="panel-stat3 bg-success fadeInLeft animation-delay1" style="text-align:center;"><h3 class="fadeInDown animation-delay4">Fitur portal anda <strong>telah aktif</strong>. </h3><div class="stat-icon"><i class="fa fa-user fa-3x"></i></div></div>');
						}
					}else{$("#"+id+"-forminfo").html('<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Warning!</strong>'+data+'.</div>');
		 			}
		 			$("#"+id+"-focus").val("");
		 			$("#"+id+"-focus").focus();
					$("#"+id+"-form [name='inup']").val("in");
					
					for(var i=1; i<15; i++){
					    $("#"+id+"-form [name='v"+i+"']").val("");
					}
		 			data_master.refreshtable(id);
					
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
    
    update : function(id,sql){
   	  	$.ajax({
      		 url:server+'updateClass.php?sql='+sql+'&table='+id,
	  		 dataType:"json",
	  		 beforeSend:function(){
	     	 		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		 },
	  		 success:function(data){
		 	 		$("#"+id+"-forminfo").html('<div class="alert alert-info fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"> Anda akan mengupdate data dengan id : <strong>'+data[0][0]+'</strong> .</div>');
					for(var i=0; i<15; i++){
		 			    if(data[0][i]!=null){
						   $("#"+id+"-form [name='v"+(i+1)+"']").val(data[0][i]);
						}else{
						   i=15;
						}
					}
					$("#"+id+"-form [name='inup']").val("up");
		 			$("#"+id+"-submit").val("update");
 		 			$("#"+id+"-submit").css("background","#FFAAD4");
		 			$("#"+id+"-focus").focus();
	  		 },
	  		 error:function(){
	     	 		$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		 }
   	  	});
   	  	return false;   
	},

    ceklis : function(id,status,value,aku){
   		if(status==true){
       		idceklis.push(value);
   	   		rowtable=aku.parentNode;
   		}else{
       		for(var i=0; i<idceklis.length; i++){
	      		if(idceklis[i]==value){
		     		for(var j=i; j<(idceklis.length-1); j++){
			     		idceklis[j]=idceklis[j+1];
			 		}
			 		idceklis.length=idceklis.length-1;
		  		}	  
	   		}
	   		rowtable="";
   		}   
  		data_master.tomboldelete(id);
	},
    
    tomboldelete : function(id){
    	if(idceklis.length==0){
	    	$("#"+id+"-hapus").html("");
    	}else if(idceklis.length==1){
   	    	$("#"+id+"-hapus").html('<a class="btn btn-xs btn-warning main-link logoutConfirm_open fadeInDown animation-delay1" href="#logoutConfirm" onclick="data_master.calonhapusall(\''+id+'\')">Delete (checked)</a>');
		}
	},
    
    calonhapus : function(id,no,aku){
   	 	idceklis.push(no);
   	 	tapus=id;
   	 	rowtable=aku;
	 	$("#logoutConfirm").html('<div class="padding-md"><h4 class="m-top-none"> Are You Sure to Remove Data (id = '+idceklis+') ?</h4></div><div class="text-center"><a class="btn btn-success m-right-sm logoutConfirm_close" onClick=data_master.hapus("'+id+'")>I`m Sure</a><a class="btn btn-danger logoutConfirm_close" onClick="data_master.batalhapus()">Cancel</a></div>');
	},
    
    calonhapusall : function(id){
   	 	tapus=id;
        if(idceklis.length!=0){
     	    $("#logoutConfirm").html('<div class="padding-md"><h4 class="m-top-none"> Are You Sure to Remove Data (id = '+idceklis+') ?</h4></div><div class="text-center"><a class="btn btn-success m-right-sm logoutConfirm_close" onClick=data_mentor.hapus("'+id+'")>I`m Sure</a><a class="btn btn-danger logoutConfirm_close" onClick="">Cancel</a></div>');
        }else{
            $("#logoutConfirm").html('<div class="padding-md"><h4 class="m-top-none"> Please Checked Your Choise ?</h4></div><div class="text-center"><a class="btn btn-danger logoutConfirm_close" onClick="">Cancel</a></div>');
        }
	},

    
    batalhapus : function(){
   	 	tapus="";
   	 	rowtable="";
   	 	paksa="";
	 	idceklis.length=0;
	},

	hapuspaksa : function(){
   	 	paksa="1";
	},

	hapus : function(id){
  	  	$("#"+id+"-forminfo").html("");
	  	$("#"+id+"-refresh").click();
		
     	$.ajax({
      		 url:server+'hapusClass.php?table='+tapus+'&id='+idceklis+'&length='+idceklis.length+'&paksa='+paksa,
	  		 beforeSend:function(){
	     	 		$("#"+id+"-tableinfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		 },
	  		 success:function(data){
	     	 		if(data=='Success'){
            			if(idceklis.length<=1){
						   var baris = rowtable.parentNode.parentNode;
            			   baris.parentNode.removeChild(baris);
						   data_master.pengenerate(id);
						}else{
						   data_master.refreshtable2(id,1);
						}
						$("#"+id+"-tableinfo").html('<div class="alert alert-success fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:12px;"><strong>Well done!</strong> You have been delete.</div>');
		 			    if(id=="fakultas"){data_master.generatefakultas();}    
					}else{
 	    			    $("#"+id+"-tableinfo").html('<div class="alert alert-warning fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:12px; "><strong>Warning!</strong> '+data+'.</div>');
					}
					
					
	  		 },
	  		 error:function(){
	     	 		$("#"+id+"-tableinfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:12px;"><strong>Afwan !,</strong> please Try Again</div>');
	  		 }
	  	});
	},
    
    resetpage : function(id){   	  	
	  	$("#"+id+"-focus").focus();
   	  	$("#"+id+"-forminfo").html("");
   	  	data_master.refreshtable(id); 
	},
    
    searching : function(id){
		var text=$("#"+id+"-search [name='search']").val();
      	textsearch=text;
	  	data_master.refreshtable2(id,1);
	  	return false;
	},
    
    validatePass : function(p1, p2) {
    	var p1= $("#"+p1).val();
		if (p1 != p2.value) {
           	p2.setCustomValidity('Password incorrect');
    	} else {
          	p2.setCustomValidity('');
    	}
	},
    
    generatefakultas : function(){
	 	$.ajax({
      		 url:server+'shiftClass.php?fakultas=true',
	  		 success:function(data){
			        var i;
					for(i=0; i<6; i++ ){
    			        $("#fak"+i+"-option").html(data);
	  		        }
			 },
	  	});
	},
    
    generatejurusan : function(id_fakultas,opt){
	 	$.ajax({
      		 url:server+'shiftClass.php?jurusan=true&id_fakultas='+id_fakultas,
	  		 success:function(data){
			     $("#jur"+opt+"-option").html(data);
	  		     
			 },
	  	});
	},

    
    refreshuser : function(id){
	 	$.ajax({
      		 url:server+'userClass.php?table='+id,
	  		 success:function(data){
	              $("#"+id+"-user").html(data);
			 },
	  	});
	},
    
    pengenerate : function(id){
	  	if(id=="ket_shift"){
		      data_master.generateshift(id,'cek=true');
	    }else if(id=="admin_f"){
	       	  data_master.refreshuser(id);
		      data_master.generatefakultas();
	  	}else if(id=="admin_p"){
	      	  data_master.refreshuser(id);
	    }else if(id=="timeline"){
	      	  data_master.refreshuser(id);
	    }else if(id=="jurusan"){
		      data_master.generatefakultas();
		}else if(id=="kode_mentor"){
		      $("#"+id+"-form [name='v1']").val("1");
		}
	},
    
    generateshift : function(id,cek){
	 	$.ajax({
      		 url:server+'shiftClass.php?'+cek,
	  		 beforeSend:function(){
	     	 		$("#"+id+"-tableinfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		 },
	  		 success:function(data){
	     	 		if(data=='Success'){
            			$("#"+id+"-tableinfo").html('<div class="alert alert-info fadeInUp animation-delay1" style="text-align:center; padding:7px; font-size:12px;"><strong>Status :</strong> Data Telah Lengkap.</div>');
					}else{
 	    			    $("#"+id+"-tableinfo").html('<div class="alert alert-warning fadeInUp animation-delay1" style="text-align:center; padding:7px; font-size:12px; "><strong>Warning!</strong> Data Shift Tidak Lengkap. '+data+'</div>');
					}	
	  		 },
	  		 error:function(){
	     	 		$("#"+id+"-tableinfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:12px;"><strong>Afwan !,</strong> please Try Again</div>');
	  		 }
	  	});
	},

}

//=================================================================================================================================//
var p_kelompok = {
    
    refreshtable : function(id){
	  	
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
		
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p=1',
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},

    searching : function(id){
        $.ajax({
      		  url:server+'tableClass.php',
	  		  data:$("#"+id+"-searchform").serialize(),
	  		  beforeSend:function(){
	     	       $("#"+id+"-tableinfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
                  $("#"+id+"-table").html(""); 
                  $("#"+id+"-table").html(data);
                  $("#"+id+"-tableinfo").html(""); 
	    	  },
	  		  error:function(){$("#"+id+"-tableinfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	
        
        return false;
	},

	resetpage : function(id){   	  	
	  	$("#"+id+"-focus").focus();
   	  	$("#"+id+"-forminfo").html("");
   	  	data_master.refreshtable(id); 
	},
    
	insert : function(form,id){
		 $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#"+id+"-form").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  		if(data=='Success'){$("#"+id+"-forminfo").html('<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Well done!</strong> You '+data+'.</div>');
		 	 		    if(id=="fakultas"){p_kelompok.generatefakultas();}
						if(id=="mente"||id=="mentor"){
						    $("#"+id+"-fiturinfo").html('<div class="panel-stat3 bg-success fadeInLeft animation-delay1" style="text-align:center;"><h3 class="fadeInDown animation-delay4">Fitur portal anda <strong>telah aktif</strong>. </h3><div class="stat-icon"><i class="fa fa-user fa-3x"></i></div></div>');
						}
					}else{$("#"+id+"-forminfo").html('<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Warning!</strong>'+data+'.</div>');
		 			}
		 			$("#"+id+"-focus").val("");
		 			$("#"+id+"-focus").focus();
					$("#"+id+"-form [name='inup']").val("in");
					
					for(var i=1; i<15; i++){
					    $("#"+id+"-form [name='v"+i+"']").val("");
					}
		 			p_kelompok.refreshtable(id);
					
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
    
    update : function(id,sql){
        $.ajax({
      		 url:server+'updateClass.php?sql='+sql+'&table='+id,
	  		 dataType:"json",
	  		 beforeSend:function(){
	     	 },
	  		 success:function(data){
        			$(".profil-nama").html(data[0][3]);
					$(".profil-email").html(data[0][2]);
					$(".profil-id").html(data[0][0]);
					$(".profil-hp").html(data[0][5]);
					$(".profil-gender").html(data[0][4]);
					
					
					if(id=="mente"){
						$(".profil-alamat").html(data[0][12]);
						$(".profil-golongan_darah").html(data[0][8]);
                        var prestasi = data[0][11];
                        prestasi = prestasi.split(', ');
                        var strpres = "";
                        for (var j=0; j<prestasi.length; j++){
                            strpres += '<span class="badge badge-warning">'+prestasi[j]+'</span><br /><br />';
                        }
                        $("#prestasi").html(strpres);
                        
                        if(data[0][9]=="y"){
                            $("#contr1").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Pernah Mentoring</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr1").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum Mentoring</div><div class="text-muted"></div></div>');
                        }
                        
                        if(data[0][10]=="y"){
                            $("#contr2").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Alumni Rohis</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr2").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Bukan Rohis</div><div class="text-muted"></div></div>');
                        }
                        
					
					}else if(id=="mentor"){
						$(".profil-alamat").html(data[0][6]);
						$(".profil-golongan_darah").html(data[0][7]);
                        
                        if(data[0][8]=="y"){
                            $("#contr1").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Sudah PPM</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr1").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum PPM</div><div class="text-muted"></div></div>');
                        }
                        
                        if(data[0][9]=="y"){
                            $("#contr2").html('<div class="overview-icon bg-success"><i class="fa fa-check"></i></div><div class="overview-value"><div class="h2">Sudah SM</div><div class="text-muted"></div></div>');
                        }else{
                            $("#contr2").html('<div class="overview-icon bg-danger"><i class="fa fa-warning"></i></div><div class="overview-value"><div class="h2">Belum SM</div><div class="text-muted"></div></div>');
                        }

					}
					
                    $("#tabbar").html('<li ><a href="#overview" onclick="" data-toggle="tab"><span class="block text-center"><i class="fa fa-home fa-2x"></i></span>Overview</a></li><li class="active"><a href="#mente" onclick="app.refreshtable(\''+id+'\')" data-toggle="tab"><span class="block text-center"><i class="fa fa-edit fa-2x"></i></span>Detail '+id+'</a></li>');
                    
                    
	  		 },
	  		 error:function(){
	     	 }
   	  	});
   	  	return false;   
	},
    
	refreshtable3 : function(id,paging){
        var str = id.split("-");
        var nilai = str[1];
        id=str[0];
        var namagender=$("#gen"+str[2]).val();
        var link;
        
	  	if(textsearch!=null){
	     	  link="&search="+textsearch;
	  	}
        $.ajax({
      		  url:server+'tableClass.php?table='+id+'&p='+paging+'&val='+nilai+'&gen='+str[2]+'&gender='+namagender+''+link,
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
                    if(id=="kelmente"){
                       idkelompok=nilai;
                    }else if(id=="mentesel"){
                       idjurusan=nilai;
                       gender=str[2];
                       idceklis.length=0;
                    }
	  		  },
	  	});
   	  	return false;  
	},

    ceklis : function(id,status,value,aku){
        if(status==true){
       		idceklis.push(value);
   	   		rowtable=aku.parentNode;
   		}else{
       		for(var i=0; i<idceklis.length; i++){
	      		if(idceklis[i]==value){
		     		for(var j=i; j<(idceklis.length-1); j++){
			     		idceklis[j]=idceklis[j+1];
			 		}
			 		idceklis.length=idceklis.length-1;
		  		}	  
	   		}
	   		rowtable="";
   		}   
        p_kelompok.tombolpilih(id);
	},
		
    pilihmente : function(id){
        $.ajax({
      		 url:server+'insertdetailClass.php?table='+id+'&id='+idceklis+'&length='+idceklis.length+'&id_kelompok='+idkelompok,
	  		 beforeSend:function(){
	  		 },
	  		 success:function(data){
                 if(data=="Success"){
                     if(id=="mentesel"){
                        id=id+'-'+idjurusan+'-'+gender;
                        p_kelompok.refreshtable3(id,1);
                        var lagi = 'kelmente-'+idkelompok;
                        p_kelompok.refreshtable3(lagi,1);
                     }
                 }	
	  		 },
	  		 error:function(){
	  		 }
	  	});
    
    },
    
    mentehap : function(kode,aku){
        $.ajax({
      		 url:server+'insertdetailClass.php?table=mentehap&id='+kode,
	  		 beforeSend:function(){
	  		 },
	  		 success:function(data){
                 if(data=="Success"){
                     var lag='mentesel-'+idjurusan+'-'+gender;
                     p_kelompok.refreshtable3(lag,1);
                     var baris = aku.parentNode.parentNode;
    			     baris.parentNode.removeChild(baris);
                 }	
	  		 },
	  		 error:function(){
	  		 }
	  	});
    
    },
    
	    
    tombolpilih : function(id){
    	if(idceklis.length==0){
	    	$("#"+id+"-pilih").html("");
    	}else if(idceklis.length==1){
   	    	$("#"+id+"-pilih").html('<a class="btn btn-sm btn-warning fadeInDown animation-delay1" onclick="p_kelompok.pilihmente(\''+id+'\')"><< Pilih (checked)</a>');
		}
	},

	generate : function(form,id){
	 	$.ajax({
      		 url:server+'tableClass.php',
             data:$("#"+id+"-form").serialize(),
	  		 success:function(data){
                 $("#"+id+"-generate").html(data);
                 if(id=="manual"){
                     generatefakultas();
                 }
			 },
	  	});
        return false;
	},
    
    generatefakultas : function(){
	 	$.ajax({
      		 url:server+'shiftClass.php?fakultas=true',
	  		 success:function(data){
			        var i;
					for(i=0; i<6; i++ ){
    			        $("#fak"+i+"-option").html(data);
	  		        }
			 },
	  	});
	},
    
    generatejurusan : function(id_fakultas,opt){
	 	$.ajax({
      		 url:server+'shiftClass.php?jurusan=true&id_fakultas='+id_fakultas,
	  		 success:function(data){
			     $("#jur"+opt+"-option").html(data);
	  		     
			 },
	  	});
	},
    
    generatementor : function(id_fakultas,opt,gen){
	 	var namagender = $("#gen"+gen).val();
        $.ajax({
      		 url:server+'shiftClass.php?mentor=true&id_fakultas='+id_fakultas+'&gender='+namagender,
	  		 success:function(data){
			     $("#men"+opt+"-option").html(data);
			 },
	  	});
	},
    
    generatekelompok : function(id_jurusan,opt,gen){
	 	var namagender = $("#gen"+gen).val();
        $.ajax({
      		 url:server+'shiftClass.php?kelompok=true&id_jurusan='+id_jurusan+'&gender='+namagender,
	  		 success:function(data){
			     $("#kel"+opt+"-option").html(data);
			 },
	  	});
	},
	
    quantitas : function(form){
        $.ajax({
      		 url:server+'qtyClass.php?automatis=true',
	  		 data:$("#kawasanautomatis").serialize(),
	  		 dataType:"json",
	  		 beforeSend:function(){
	  		 },
	  		 success:function(data){
					for(var i=0; i<3; i++){
		 			    if(data[i]!=null){
						   $("#qtym"+(i+1)).html(data[i]);
						}
					}
                    $("#tombolautomatis").html('<div class="panel panel-default fadeInRight animation-delay1 " style="padding:20px;" id="panelauto1"><button class="btn btn-lg btn-success" type="button" onclick="p_kelompok.bagiautomatis1(\''+data[3]+'\',\''+data[4]+'\')" style="width:100%;">Bagi Berdasarkan Jumlah Mentor </button></div><!-- /panel --><div class="panel panel-default fadeInRight animation-delay2" style="padding:20px;" id="panelauto2"><div class="input-group" style="z-index:0; width100%;"><input type="text" name="text" id="maksmente" class="form-control input-lg" placeholder="exp : 10"><div class="input-group-btn"><button type="submit" onclick=" maksmente=$(\'#maksmente\').val(); p_kelompok.bagiautomatis2(\''+data[3]+'\',\''+data[4]+'\');" class="btn btn-lg btn-success" tabindex="-1">Bagi Maks Mente/Kelp</button></div></div></div><!-- /panel -->');
	  		 },
	  		 error:function(){
	  		 }
   	  	});
   	  	return false;
        
        
	},
    
    bagiautomatis1 : function(gender,jurusan){
        $.ajax({
      		 url:server+'khususClass.php?hal=bagimodel1&gender='+gender+'&jurusan='+jurusan,
	  		 beforeSend:function(){
                 $("#panelauto1").html('<dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		 },
	  		 success:function(data){
                 $("#panelauto1").html(data);
        	 },
	  		 error:function(){
                $("#panelauto1").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');

	  		 }
   	  	});
   	  	return false;
        
    },
    
    bagiautomatis2 : function(gender,jurusan){
        $.ajax({
      		 url:server+'khususClass.php?hal=bagimodel2&gender='+gender+'&jurusan='+jurusan+'&maksmente='+maksmente,
	  		 beforeSend:function(){
                 $("#panelauto2").html('<dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');

	  		 },
	  		 success:function(data){
                 $("#panelauto2").html(data);
        	 },
	  		 error:function(){
                  $("#panelauto2").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');

	  		 }
   	  	});
   	  	return false;
        
    },
};

//================================================================================================================================//
var portal = {
	
	initialize: function() {
        portal.refreshtable('timeline_p');
	},
	
	quantitas : function(){
		$.ajax({
      		 url:server+'qtyClass.php',
	  		 dataType:"json",
	  		 beforeSend:function(){
	  		 },
	  		 success:function(data){
					for(var i=0; i<15; i++){
		 			    if(data[i]!=null){
						   $("#qty"+(i+1)).html(data[i]);
						}else{
						   i=15;
						}
					}
	  		 },
	  		 error:function(){
	  		 }
   	  	});
   	  	return false;
	},
	
	refreshtable : function(id){
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
		
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&p=1',
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},
	
	refresh_mkuliah : function(id,bp){
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
		
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&id_m='+bp,
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},
	
	refresh_kelompok : function(id,jabatan,bp){
		$("#"+id+"-refresh").click();
      	idceklis.length=0;
   	  	textsearch="";
	  	paksa="";
		$.ajax({
      		  url:server+'tableClass.php?table='+id+'&id_m='+bp+'&jabatan='+jabatan,
	  		  beforeSend:function(){
	     	  		$("#"+id+"-table").html('<tr><dl><dt>Loading... </dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl></tr>');
	  		  },
	  		  success:function(data){
	            	$("#"+id+"-table").html("");
	     			$("#"+id+"-table").html(data);
		 			$("#"+id+"-tableinfo").html("");
   	  				$("#"+id+"-submit").val("Save");
   	  				$("#"+id+"-submit").css("background","#88ca4a");
	  		  },
	  		  error:function(){
	     	  		$("#"+id+"-table").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');
	  		  }
	  
   	  	});
		
		return false;  
 	},
	
	edit_profil : function(form,id){
	    $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#"+id+"-form").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  		if(data=='Success'){$("#"+id+"-forminfo").html('<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Well done!</strong> You '+data+'.</div>');
		 	 		    if(id=="fakultas"){app.generatefakultas();}
					}else{$("#"+id+"-forminfo").html('<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Warning!</strong>'+data+'.</div>');
		 			}
                    var sql='id='+$("#"+id+"-id").val();
					portal.update_profil(id,sql);
		 			
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
	
	update_profil : function(id,sql){
   	  	$.ajax({
      		 url:server+'updateClass.php?sql='+sql+'&table='+id,
	  		 dataType:"json",
	  		 beforeSend:function(){
	     	 },
	  		 success:function(data){
					$(".profil-nama").html(data[0][3]);
					$(".profil-email").html(data[0][2]);
					$(".profil-id").html(data[0][0]);
					$(".profil-hp").html(data[0][5]);
					
					$("#"+id+"-form [name='v1']").val(data[0][0]);
					
					$("#"+id+"-form [name='v2']").val(data[0][3]);
					$("#"+id+"-form [name='v3']").val(data[0][2]);
					$("#"+id+"-form [name='v4']").val(data[0][4]);
					$("#"+id+"-form [name='v6']").val(data[0][5]);
					
					if(id=="mente"){
					    $("#"+id+"-form [name='v5']").val(data[0][12]);
						$("#"+id+"-form [name='v7']").val(data[0][8]);
						$(".profil-alamat").html(data[0][12]);
						$(".profil-golongan_darah").html(data[0][8]);
					
					}else{
					    $("#"+id+"-form [name='v5']").val(data[0][6]);
						$("#"+id+"-form [name='v7']").val(data[0][7]);
						$(".profil-alamat").html(data[0][6]);
						$(".profil-golongan_darah").html(data[0][7]);
					}
					
					$("#"+id+"-form [name='inup']").val("up");
		 			
	  		 },
	  		 error:function(){
	     	 }
   	  	});
   	  	return false;   
	},
	
	generatekelompok : function(id_m){
        $.ajax({
      		 url:server+'shiftClass.php?kelompok_mentor=true&id_m='+id_m,
	  		 success:function(data){
			     $("#kel-option").html(data);
			 },
	  	});
	},
	
	generatemente : function(id_kel){
        $.ajax({
      		 url:server+'shiftClass.php?kelompok_mente=true&id_kel='+id_kel,
	  		 success:function(data){
			     $("#mente-option").html(data);
			 },
	  	});
	},

	simpan_khs : function(form,id){
		
	    $.ajax({
      		  url:server+'khususClass.php',
	  		  data:$("#"+id+"-form").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  		if(data=='Success'){$("#"+id+"-forminfo").html('<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Well done!</strong> You '+data+'.</div>');
		 	 		    if(id=="fakultas"){app.generatefakultas();}
					}else{$("#"+id+"-forminfo").html('<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Warning!</strong>'+data+'.</div>');
		 			}
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
	
}

var ndktau = {
    insert2 : function(form,id){
	    $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#"+id+"-form").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  		if(data=='Success'){$("#"+id+"-forminfo").html('<div class="alert alert-success fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Well done!</strong> You '+data+'.</div>');
		 	 		    if(id=="fakultas"){p_kelompok.generatefakultas();}
					}else{$("#"+id+"-forminfo").html('<div class="alert alert-warning fadeInLeft animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Warning!</strong>'+data+'.</div>');
		 			}
                    var sql='id='+$("#"+id+"-id").val();
					p_kelompok.update2(id,sql);
		 			
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
	
	perdana : function(id){
		 $.ajax({
      		  url:server+'insertClass.php',
	  		  data:$("#formWizard1").serialize(),
	  		  beforeSend:function(){
	     	  		$("#"+id+"-forminfo").html('<dl><dt>Loading... <span class="pull-right label label-success">100%</span></dt><dd><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%"></div></div></dd></dl>');
	  		  },
	  		  success:function(data){
	     	  	  if(id=="mente"||id=="mentor"){
					    $("#"+id+"-fiturinfo").html('<div class="panel-stat3 bg-success fadeInLeft animation-delay1" style="text-align:center; margin-top:10%;"><h2 class="fadeInDown animation-delay3">Syukron Jazakullah Khairan.</h2><h1 class="fadeInDown animation-delay5">Fitur portal anda <strong>telah aktif</strong>. </h1><div class="stat-icon"><i class="fa fa-user fa-3x"></i></div></div>');
				  }
	  		  },
	  		  error:function(){$("#"+id+"-forminfo").html('<div class="alert alert-danger fadeInDown animation-delay1" style="text-align:center; padding:7px; font-size:10px; margin:0;"><strong>Afwan !,</strong> please Try Again</div>');}
   	  	});   
   	  	return false;
	},
	
	

}
    