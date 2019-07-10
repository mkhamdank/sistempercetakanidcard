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
	        <h3 class="fontstyle"><b>Data Personil</b></h3>
	        <div class="row mb">
	          <!-- page start-->
	          <div class="content-panel col-md-12">
	            <div class="adv-table">
	              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example">
	                <thead>
						<th>No.</th>
						<th>Nama Perusahaan</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Nomor Registrasi</th>
						<th>Foto KTP</th>
						<th>Foto Diri</th>
						<th>Status Kerja</th>
						<th>Status Cetak</th>
						<?php if ($level == 1 || $level == 3): ?>
							<th style="width: 90px">Action</th>
						<?php endif ?>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($person as $key){ ?>
									<tr style="background-color: white">
										<td style="background-color: white"><?php echo $no;$no++; ?></td>
										<td style="width: 10px"><?php echo $key->nama_perusahaan ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->address ?></td>
										<td><?php echo $key->reg_num ?></td>
										<td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_ktp?>" rel="zoom-id:zoom;opacity-reverse:true;"><img style="width: 100px; height: auto;" src="<?=base_url("assets/uploads")."/".$key->foto_ktp?>" alt="" /> </a></td>
										<td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_diri?>" rel="zoom-id:zoom;opacity-reverse:true;"><img style="width: 100px; height: auto;" src="<?=base_url("assets/uploads")."/".$key->foto_diri?>" alt="" /> </a></td>
										<td><?php if ($key->finish_work < date("Y-m-d")){
													$sts = "Tidak Aktif";
													echo "Tidak Aktif";
												}
												else{
													$sts = "Aktif";
													echo "Aktif";
												} ?>
										</td>
										<td>
											<?php if ($key->status_cetak == 0) {
												echo "Belum Dicetak";
											}else{
												echo "Sudah Dicetak";
											} ?>
										</td>
														<?php if ($level == 3){ ?>
															<td>
															<?php if ($sts == "Aktif"){ ?>
														   <div class="btn-group">
															<button type="button" class="btn btn-theme03">Action</button>
											                <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
											                  <span class="caret"></span>
											                  <span class="sr-only">Toggle Dropdown</span>
											                  </button>
											                <ul class="dropdown-menu" role="menu">
															<li>
													      		<?php if ($key->foto_diri == "" || $key->foto_ktp == ""){ ?>
													      				<a href="" onclick="error_edit();">Edit</a>
													      			<?php } else{ ?>
													      				<a href="<?=site_url()?>/Person/update/<?php echo $key->id_person.'/'.$key->foto_ktp.'/'.$key->foto_diri ?>">Edit</a>
													      			<?php } ?>
													      	</li>
													      	</ul>
													      </div>
													      </td>
														<?php } ?>
													    <?php } ?>
													    <?php if ($level == 1){ ?>
													    	<td>
													    	<div class="btn-group">
													    	<button type="button" class="btn btn-theme03">Action</button>
											                <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
											                  <span class="caret"></span>
											                  <span class="sr-only">Toggle Dropdown</span>
											                  </button>
											                <ul class="dropdown-menu" role="menu">
											                <li>
													      		
													      			<?php if ($key->foto_diri == "" || $key->foto_ktp == ""){ ?>
													      				<a href="" onclick="error_edit();">Edit</a>
													      			<?php } else{ ?>
													      				<a href="<?=site_url()?>/Person/update/<?php echo $key->id_person.'/'.$key->foto_ktp.'/'.$key->foto_diri ?>">Edit</a>
													      			<?php } ?>
													      	</li>
													    	<li>
													      		<a href="<?=site_url()?>/Person/delete/<?php echo $key->id_person ?>" onclick="return confirmDialog()">Delete</a>
													      	</li>
													      	</ul>
													      </div>
													      </td>
													      <?php } ?>
													    	<!-- .'/'.$key->foto_ktp.'/'.$key->foto_diri -->
									</tr>
								<?php } ?>
					</tbody>
	              </table>
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

	  	<script type='text/javascript' language='JavaScript'>
		     function error_edit() {
		       return alert('Data tidak bisa di edit, karena foto tidak tersedia.')
		      }
	  	</script>
	</body>
</html>