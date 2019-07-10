<!DOCTYPE html>
<html lang="">
	<head>
		<link rel="icon" href="<?php echo base_url(); ?>assets/logo.png">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Contractor PT CJI</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url(); ?>assets/Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  <!--external css-->
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
		  <link href="<?php echo base_url(); ?>assets/Dashio/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
		  <link rel="<?php echo base_url(); ?>assets/Dashio/stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
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
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('') ?>assets/webcamjs-master/webcam.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
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

		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%;
		}

		/* The Close Button */
		.close {
		    color: #aaaaaa;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}
		img{
		  max-width:180px;
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
	      	<h4 class="mb fontstyle">Tambah Personil Contractor <?php echo $nama_perusahaan ?></h4>
	        <div class="row mt">
	          <div class="col-lg-12">
	            <div class="form-panel">
	              				<?php $attributes = array('name' => 'f1'); ?>
								<?php echo form_open_multipart('Home/create_personil/'.$this->uri->segment(3).'/'.$this->uri->segment(4), $attributes); ?>
								<?php echo validation_errors() ?>
							
								<div class="form-group">
									<?php for ($i=0; $i < $jumlah_personil; $i++) { ?>
										<!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> -->
										<!-- <div class="form-group"> -->
											<label for="">Nama</label>
											<input style="width: 220px" type="text" class="form-control" id="nama" placeholder="Nama" name="nama[]" required="">
										<!-- </div> <--><br>
										<label for="" class="">Foto Diri</label>
										<!-- <label for="" class="col-sm-2 col-sm-2 control-label"></label> -->
										<input style="width: 220px" type="file" class="form-control" name="filefoto<?php echo $i;?>" id="filefoto" onchange="readURL(this);">
										<!-- <label for="" class="col-sm-2 col-sm-2 control-label"></label> -->
										<img id="blah" src="" style="display: none" alt="your image" />
										<br>

										<input type="button" class="btn btn-info" value="Akses Kamera" onClick="setup(); $(this).hide().next().show();" id="akses_kamera">

										<input type="button" value="Ambil Foto" id="btnTake" onClick="take_snapshot();" style="display:none" class="btn btn-primary">
										<div id="my_camera"></div>
										<div id="results"></div>
										<br>

										<label for="" class="">Foto KTP</label>
										<input style="width: 220px" type="file" class="form-control" name="filefotoktp<?php echo $i;?>" onchange="readURL2(this);" id="filektp">
										<!-- <label for="" class="col-sm-2 col-sm-2 control-label"></label> -->
										<img id="blah2" src="" style="display: none" alt="your image" />
										<br>

										<input type="button" class="btn btn-info" value="Akses Kamera" onClick="setup2(); $(this).hide().next().show();" id="akses_kamera2">

										<input type="button" value="Ambil Foto" id="btnTake2" onClick="take_snapshot2();" style="display:none" class="btn btn-primary">
										<div id="my_camera2"></div>
										<div id="results2"></div>
										<br>

										<label for="">Alamat</label>
										<input style="width: 400px" type="text" class="form-control" id="" placeholder="Alamat" name="address[]"required="">
										<br><br><br>
										<!-- </div> -->


									<?php } ?>
									<input type="hidden" value="hidden" name="hidden">
							
								<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									
								</div> -->
								<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
									<!-- <label for="" class="col-sm-2 col-sm-2 control-label"></label> -->
									<button type="submit" id="submit" style="width: 200px" class="btn btn-block btn-success">Tambah</button>
								<!-- </div> -->
								</div>
							<?php echo form_close(); ?>
				</div>
		      </div>
		    </div>
	      </section>
	      <!-- /wrapper -->
	    </section>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
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
		<!-- Bootstrap JavaScript -->
		<!-- <script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"></script> -->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<script src="<?php echo base_url().'assets/jquery-ui.js'?>" type="text/javascript"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script> -->
		<script type="text/javascript">
		$(document).ready(function() {
    		$('#example').DataTable();
		} );	
		</script>
		<script language="JavaScript">
			Webcam.set({
				// live preview size
				width: 320,
				height: 240,
				
				// device capture size
				dest_width: 320,
				dest_height: 240,
				
				// final cropped size
				crop_width: 180,
				crop_height: 240,
				
				// format and quality
				image_format: 'jpeg',
				jpeg_quality: 90
			});
		</script>
		<script language="JavaScript">
			Webcam2.set({
				// live preview size
				width: 320,
				height: 240,
				
				// device capture size
				dest_width: 320,
				dest_height: 240,
				
				// final cropped size
				crop_width: 180,
				crop_height: 240,
				
				// format and quality
				image_format: 'jpeg',
				jpeg_quality: 90
			});
		</script>
		<script language="JavaScript">
			function setup() {
				if (document.getElementById('nama').value == 0) {
					alert('Isikan nama terlebih dahulu');
					document.location.reload();
				}
				Webcam.reset();
				Webcam.attach( '#my_camera' );
				document.getElementById('filefoto').style.display="none";
				document.getElementById('filektp').style.display="none";
			}
			function setup2() {
				if (document.getElementById('nama').value == 0) {
					alert('Isikan nama terlebih dahulu');
					document.location.reload();
				}
				Webcam.reset();
				Webcam.attach( '#my_camera2' );
				document.getElementById('filefoto').style.display="none";
				document.getElementById('filektp').style.display="none";
			}
			
			function take_snapshot() {
				// take snapshot and get image data
				var image = '';
				var nama_foto = $('#nama').val();
				Webcam.snap( function(data_uri) {
					// display results in page
					document.getElementById('results').innerHTML =
						'<img src="'+data_uri+'"/>';
					document.getElementById('my_camera').style.display = "none";
					document.getElementById('btnTake').style.display = "none";
					image = data_uri;

				} );
				$.ajax({
					url: '<?php echo site_url("Capture/capture_diri");?>',
					type: 'POST',
					dataType: 'json',
					data: {nama_foto:nama_foto,image:image},
				})
				.done(function(data) {
					if (data > 0) {
						// opener.document.f1.nama_foto.value = document.frm.nama_foto.value;
						// alert('Take Photo Berhasil');
						// $('#register')[0].reset();
						
						// window.close();
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}

			function take_snapshot2() {
				// take snapshot and get image data
				var image = '';
				var nama_foto = $('#nama').val();
				Webcam.snap( function(data_uri) {
					// display results in page
					document.getElementById('results2').innerHTML =
						'<img src="'+data_uri+'"/>';
					document.getElementById('my_camera2').style.display = "none";
					document.getElementById('btnTake2').style.display = "none";
					image = data_uri;

				} );
				$.ajax({
					url: '<?php echo site_url("Capture/capture_ktp");?>',
					type: 'POST',
					dataType: 'json',
					data: {nama_foto:nama_foto,image:image},
				})
				.done(function(data) {
					if (data > 0) {
						// opener.document.f1.nama_foto.value = document.frm.nama_foto.value;
						// alert('Take Photo Berhasil');
						// $('#register')[0].reset();
						
						// window.close();
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
		</script>
		<script type="text/javascript">
        $(document).ready(function(){
	            $( ".auto" ).autocomplete({
	              source: "<?php echo site_url('Home/get_autocomplete_foto/?');?>"
	            });
	        });
	    </script>
	    <script type="text/javascript">
	    	function readURL(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                	$('#blah').show();
	                    $('#blah')
	                        .attr('src', e.target.result);
	                    document.getElementById('akses_kamera').style.display = "none";
	                    document.getElementById('akses_kamera2').style.display = "none";
	                };

	                reader.readAsDataURL(input.files[0]);
	            }
	        }
	        function readURL2(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                	$('#blah2').show();
	                    $('#blah2')
	                        .attr('src', e.target.result);
	                    document.getElementById('akses_kamera2').style.display = "none";
	                    document.getElementById('akses_kamera').style.display = "none";
	                };

	                reader.readAsDataURL(input.files[0]);
	            }
	        }
	    </script>
	</body>
</html>