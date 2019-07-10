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
		  <link rel="<?php echo base_url(); ?>assets/Dashio/stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
		  <!-- Custom styles for this template -->
		  <link href="<?php echo base_url(); ?>assets/Dashio/css/style.css" rel="stylesheet">
		  <link href="<?php echo base_url(); ?>assets/Dashio/css/style-responsive.css" rel="stylesheet">
		  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
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
	        <h3 class="fontstyle"><b>Detail Perusahaan</b></h3>
	        <br>
			<center><legend style="background-color: grey;color: white" class="fontstyle"><b>Data Perusahaan</b></legend></center>
	        <div class="table-responsive">
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<table class="table table-hover">
									<thead>
										<?php foreach($perusahaan as $key){ ?>
										<tr>
											<td><b>Nama Perusahaan</b></td>
											<td><?php echo $key->nama_perusahaan ?></td>
										</tr>
										<tr>
											<td><b>Alias</b></td>
											<td><?php echo $key->alias ?></td>
										</tr>
										<tr>
											<td><b>Safety Permit Number</b></td>
											<td><div id="trigger">
											<a style="text-decoration: none;color: black" target="_blank" class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" rel="zoom-id:zoom;opacity-reverse:true;">
											<?php echo $key->safety_permit_number ?>
											</a>
											</div>
											<div id="pop-up"><img style="width: 300px;" src="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" alt="" /></div>
											</td>
										</tr>
										<tr>
												<td><b>Jumlah Personil</b></td>
												<td><?php echo $key->jumlah_personil ?></td>
											</tr>
										<?php } ?>
									</thead>
								</table>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<table class="table table-hover">
									<thead>
										<?php foreach ($perusahaan as $val): ?>
											<tr>
												<td><b>Mulai Bekerja</b></td>
												<td><?php 
												echo date("d/m/Y", strtotime($val->mulai_bekerja)); ?></td>
											</tr>
											<tr>
												<td><b>Selesai Bekerja</b></td>
												<td><?php echo date("d/m/Y", strtotime($val->finish_work)); ?></td>
											</tr>
											<tr>
												<td><b>Tanggal Registrasi</b></td>
												<td><?php echo date("d/m/Y", strtotime($val->reg_date)); ?></td>
											</tr>
											<tr>
												<td><b>PIC</b></td>
												<td><?php echo $val->pic; ?></td>
											</tr>
											<!-- <tr>
												<td></td>	
												<td><a class="btn btn-info" href="<?php echo site_url('Perusahaan/update/'.$this->uri->segment(3)) ?>">Edit</a></td>
											</tr> -->
										<?php endforeach ?>
									</thead>
								</table>
							</div>

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<br><br><br>
									<center><legend style="background-color: grey;color: white" class="fontstyle"><b>Data Personil</b></legend></center>
									<?php if ($level == 3): ?>
										<?php echo form_open('Home/add/'.$this->uri->segment(3)); ?>
										<?php echo validation_errors() ?>
											<div class="form-group">
												<label for="">Jumlah Personil</label>
												<input style="width: 120px" type="number" class="form-control" id="" placeholder="Jml Personil" name="jumlah_personil" required="">
											</div>
										
											
											
											<button type="submit" class="btn btn-success">Tambah Personil</button>

											<br>

										<?php echo form_close(); ?>
									<?php endif ?>
									<table class="table" id="example">										
										<thead>
											<th>No.</th>
											<th>Nama Lengkap</th>
											<th>Alamat</th>
											<th>Nomor Registrasi</th>
											<th>Foto KTP</th>
											<th>Foto Diri</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach($person as $key){ ?>
														<tr>
															<td><?php echo $no;$no++; ?></td>
															<td><?php echo $key->nama ?></td>
															<td><?php echo $key->address ?></td>
															<td><?php echo $key->reg_num ?></td>
															<td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_ktp?>" rel="zoom-id:zoom;opacity-reverse:true;"><img style="width: 100px; height: auto;" src="<?=base_url("assets/uploads")."/".$key->foto_ktp?>" alt="" /> </a></td>
															<td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_diri?>" rel="zoom-id:zoom;opacity-reverse:true;"><img style="width: 100px; height: auto;" src="<?=base_url("assets/uploads")."/".$key->foto_diri?>" alt="" /> </a></td>
															<td>
																<?php if ($level == 1 || $level == 3): ?>
																	<a href="<?=site_url()?>/Person/update/<?php echo $key->id_person.'/'.$key->foto_ktp.'/'.$key->foto_diri ?>"><button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glypchon glypchon-pencil">Edit</span></button></a>
																	<a href="<?=site_url()?>/Person/delete2/<?php echo $key->id_person ?>"><button class="btn btn-danger" data-title="Delete" data-toggle="modal" data-target="#edit"><span class="glypchon glypchon-pencil" onclick="return confirmDialog()">Delete</span></button></a>
																<?php endif ?>
															</td>
															
														</tr>
													<?php } ?>
													</tbody>
												</table>
								</div>
						</div>
				</div>
	          <!-- page end-->
	        </div>
	        <!-- /row -->
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
	  <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
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
	</body>
</html>