<!DOCTYPE html> 
<html lang="">
	<head>
		<link rel="icon" href="<?php echo base_url(); ?>assets/logo.png">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Contractor PT CJI</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css"> -->
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  <!--external css-->
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/css/DT_bootstrap.css" />
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datepicker/css/datepicker.css" />
		  <!-- Custom styles for this template -->
		  <link href="<?php echo base_url(); ?>assets/Dashio/css/style.css" rel="stylesheet">
		  <link href="<?php echo base_url(); ?>assets/Dashio/css/style-responsive.css" rel="stylesheet">
		  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">
		  <link rel="stylesheet" href="<?php echo base_url().'assets/jquery-ui.css'?>">
			<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso16.css" /> 
			<script src="<?php echo base_url().'assets/jquery-ui.js'?>" type="text/javascript"></script>
		  <style>
			.form-control:focus{border-color: #5cb85c;  box-shadow: none; -webkit-box-shadow: none;} 
			.form-control:invalid{box-shadow: none; -webkit-box-shadow: none;border-color: #ff5454;}
		  </style>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
		<style>
			div#pop-up {
			  display: none;
			  position: relative;
			  width: auto;
			  padding: 10px;
			  background: #eeeeee;
			  color: #000000;
			  border: 1px solid #1a1a1a;
			  font-size: 90%;
			  align-content: center;
			}
			header{
				font-family: 'CJ ONLYONE NEW title OTF Medium';
				src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);
			}
			aside{
				font-family: 'CJ ONLYONE NEW title OTF Medium';
				src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);
			}
			.fontstyle{
				font-family: 'CJ ONLYONE NEW title OTF Medium';
				src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);
			}
		</style>
	</head>
	<body>
		<section id="container">
	    <!-- **********************************************************************************************************************************************************
	        TOP BAR CONTENT & NOTIFICATIONS
	        *********************************************************************************************************************************************************** -->
	    <!--header start-->
	    <header class="header black-bg">
	      <div class="sidebar-toggle-box">
	        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
	      </div>
	      <!--logo start-->
	      <a href="" class="logo">
	      	<img style="width: 40px;background-color: white;border-radius: 50%" src="<?php echo base_url(); ?>assets/logo.png" alt="">  ID CARD PRINTING <span>CONTRACTOR</span>
	      </a>
	      <!--logo end-->
	      <div class="nav notify-row" id="top_menu">
	      </div>
	      <div class="top-menu">
	        <ul class="nav pull-right top-menu">
	          <li><a class="logout" href="<?php echo site_url('Login/logout') ?>"><b>Logout</b></a></li>
	        </ul>
	      </div>
	    </header>
	    <!--header end-->
	    <!-- **********************************************************************************************************************************************************
	        MAIN SIDEBAR MENU
	        *********************************************************************************************************************************************************** -->
	    <!--sidebar start-->
	    <aside>
	      <div id="sidebar" class="nav-collapse ">
	        <!-- sidebar menu start-->
	        <ul class="sidebar-menu" id="nav-accordion">
				<h5 class ="centered" ><?php echo $nama; ?></h5>
	        	<h5 class ="centered" >
	        								<?php if ($level==1) {
												echo "Admin";
											} elseif ($level==2) {
												echo "PIC";
											} elseif ($level==3) {
												echo "User";
											}
											?></h5>
	          					<?php if ($level == 3): ?>
									<!-- <li><a class="nav-link" href="<?php echo site_url('Home/create') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah Perusahaan <span class="sr-only">(current)</span></a></li> -->
									<li class="active"><a class="nav-link" href="<?php echo site_url('Home/report_perusahaan') ?>"><i class="fa fa-cogs"></i>Data Perusahaan</a></li>
									<li><a class="nav-link" href="<?php echo site_url('Home/report_person') ?>"><i class="fa fa-th"></i>Data Personil</a></li>
								<?php endif ?>
								<?php if ($level == 1): ?>
									<li class="nav-item active"><a class="nav-link" href="<?php echo site_url('Perusahaan') ?>"><i class="fa fa-cogs"></i>Data Perusahaan <span class="sr-only">(current)</span></a></li>
									<li><a class="nav-link" href="<?php echo site_url('Person') ?>"><i class="fa fa-th"></i>Data Personil</a></li>
									<li><a class="nav-link" href="<?php echo site_url('User') ?>"><i class="fa fa-desktop"></i>Data User</a></li>
								<?php endif ?>
								<?php if ($level == 2): ?>
									<li class="nav-item active"><a class="nav-link" href="<?php echo site_url('Perusahaan') ?>"><i class="fa fa-cogs"></i>Data Perusahaan <span class="sr-only">(current)</span></a></li>
									<li><a class="nav-link" href="<?php echo site_url('Person') ?>"><i class="fa fa-th"></i>Data Personil</a></li>
								<?php endif ?>
								<!-- <li><a class="nav-link" href="<?php echo site_url('Login/logout') ?>">Logout</a></li> -->
	        </ul>
	        <!-- sidebar menu end-->
	      </div>
	    </aside>
	    <!--sidebar end-->
	    <!-- **********************************************************************************************************************************************************
	        MAIN CONTENT
	        *********************************************************************************************************************************************************** -->
	    <!--main content start-->
	    <section id="main-content">
	      <section class="wrapper">
	      	<h4 class="mb fontstyle">Tambah Data Perusahaan</h4>
	        <div class="row mt">
	          <div class="col-lg-12">
	            <div class="form-panel">
	              
	              
	              
							<p style="color: red"><?php echo form_open_multipart('Home/create'); ?></p>
							<?php echo validation_errors() ?>
							<?php if (ISSET($error)): ?>
								<?php echo $error; ?>
							<?php endif ?>
						
							
								<div class="form-group">
		                			<label for="" class="col-sm-2 col-sm-2 control-label">Nama Perusahaan</label>
									<input style="width: 250px" type="text" class="form-control has-error" id="nama_perusahaan" placeholder="Nama Perusahaan" name="nama_perusahaan" required="" autocomplete="off" value="" onchange="autofill()">
									 <!-- onchange="readNamaPer(this.value);" -->
								</div>
								<br>
								<div class="form-group">
		                			<label for="" class="col-sm-2 col-sm-2 control-label">Alias</label>
									<input style="width: 250px" type="text" class="form-control" id="alias" placeholder="Alias" name="alias" required="" value="">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">Safety Permit Number</label>
									<input style="width: 250px" type="text" class="form-control" id="" placeholder="Safety Permit Number" name="safety_permit_number" required="" value="SP/SC.">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">File Safety Permit (PDF)</label>
									<input style="width: 250px" type="file" class="form-control" id="" name="userfile" required="" onchange="readURL(this);">
									<!-- <label for="" class="col-sm-2 col-sm-2 control-label"></label>
									<img id="blah" src="" style="display: none;height: 200px;width: 150px;" alt="your image" /> -->
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Bekerja</label>
									<input style="width: 170px" type="text" class="form-control datepicker" id="" name="mulai_bekerja" required="" autocomplete="off">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">Tanggal Selesai Bekerja</label>
									<input style="width: 170px" type="text" class="form-control datepicker2" id="" name="finish_work" required="" autocomplete="off">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">Jumlah Personil</label>
									<input style="width: 170px" type="number" class="form-control" id="" name="jumlah_personil" placeholder="Jumlah Personil" required="">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label">PIC</label>
									<input style="width: 170px" type="text" class="form-control" id="" name="pic" placeholder="PIC" required="">
								</div>
								<br>
								<div class="form-group">
			                		<label for="" class="col-sm-2 col-sm-2 control-label"></label>
									<button style="width: 170px"  type="submit" class="btn btn-success" onclick="validate()">Tambah</button>
								</div>
							<?php echo form_close(); ?>
							
						<!-- </div>

						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							
						</div> -->
					
						
					
						
					</div>

		          </div>
		          <!-- col-lg-12-->
		        </div>
	      </section>
	      <!-- /wrapper -->
	    </section>
	    <!-- /MAIN CONTENT -->
	    <!--main content end-->
	    <!--footer start-->
	    <footer class="site-footer">
	      <div class="text-center">
	        <p>
	          &copy; Copyrights <strong>PT CJI</strong>. All Rights Reserved
	        </p>
	        <div class="credits">	          
	        </div>
	      </div>
	    </footer>
	    <!--footer end-->
	  </section>

	  <script src="<?php echo base_url(); ?>assets/Dashio/lib/jquery/jquery.min.js"></script>
	  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/js/jquery.js"></script>
	  <script src="<?php echo base_url(); ?>assets/Dashio/lib/bootstrap/js/bootstrap.min.js"></script>
	  <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/Dashio/lib/jquery.dcjqaccordion.2.7.js"></script>
	  <script src="<?php echo base_url(); ?>assets/Dashio/lib/jquery.scrollTo.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/Dashio/lib/jquery.nicescroll.js" type="text/javascript"></script>
	  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/js/jquery.dataTables.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/js/DT_bootstrap.js"></script>
	  <!--common script for all pages-->
	  <script src="<?php echo base_url(); ?>assets/Dashio/lib/common-scripts.js"></script>
	  <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
	  <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
	  <script src="<?php echo base_url().'assets/jquery-ui.js'?>" type="text/javascript"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script type="text/javascript">
		$(document).ready(function() {
    		$('#example').DataTable();
		} );	
		</script>
		<script type='text/javascript' language='JavaScript'>
		     function confirmDialog() {
		       return confirm('Apakah Anda yakin akan menghapus data ini?')
		      }
	  	</script>
	  	<script type="text/javascript">
        	$(document).ready(function(){
	            $( "#nama_perusahaan" ).autocomplete({
	              source: "<?php echo site_url('Home/get_autocomplete/?');?>"
	            });
	        });
	    </script>
	    <script type="text/javascript">
	    	$('.datepicker').datepicker({
	    		dateFormat: 'dd/mm/yy'
	    	})
	    </script>
	    <script type="text/javascript">
	    	$('.datepicker2').datepicker({
	    		dateFormat: 'dd/mm/yy'
	    	})
	    </script>
	    <script type="text/javascript">
	    	function readURL(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                	$('#blah').show();
	                    $('#blah')
	                        .attr('src', e.target.result);
	                };

	                reader.readAsDataURL(input.files[0]);
	            }
	        }
	    </script>
	    <!-- <script>
		    function readNamaPer(input) {
		        let x = document.getElementById("nama_perusahaan").value;
		        let y = document.getElementById("alias").value = x;
		        $( "#alias" ).autocomplete({
	              source: "<?php echo site_url('Home/get_alias/x');?>"
	            });
	        }
	    </script> -->
	    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/jQuery-2.2.4/jquery-2.2.4.min.js"></script> -->
	    <script type="text/javascript">
	    	function autofill() {
	    		var nama = $("#nama_perusahaan").val();
	    		$.ajax({
	    			url:'get_alias/'+nama,
	    		}).success(function(data){
	    			var json = data,
	    			obj = JSON.parse(json);
	    			$("#alias").val(obj.alias);
	    			// document.getElementById("alias").value = obj.alias;
	    		});
	    	}
	    </script>
	    <script>
	    	function funup() {
	        	let al = document.getElementById("alias").value;
	        	// $( "#alias" ).value({
	            let ali = source: "<?php echo site_url('Home/get_alias/al');?>"
	            // });
	            document.getElementById("alias").value = ali;
	        }
	    </script>
	</body>
</html>