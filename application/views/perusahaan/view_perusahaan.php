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
	    <header class="header black-bg" id="stylefont">
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
	    <aside style="font-family: 'CJ ONLYONE NEW title OTF Medium';
				src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);">
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
	        <h3 class="fontstyle"><b>Data Perusahaan</b></h3>
	        <div class="row mb">
	          <!-- page start-->
	          <div class="content-panel col-md-12">
	          	<?php if ($level == 1): ?>
	          		<a href="<?php echo site_url('Reg_num') ?>" class="btn btn-theme03 fontstyle">Reset Registration Number</a>
	          	<?php endif ?>
	          	<?php if ($level == 3): ?>
	            	<a class="btn btn-theme03 fontstyle" href="<?php echo site_url('Home/create') ?>">Tambah Perusahaan</a>
	            	<br><br>
	            <?php endif ?>
	            <div class="adv-table">
	              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example">
	                <thead>
	                  <tr>
						<th>No.</th>
						<th>Nama Perusahaan</th>
						<th>Alias</th>
						<th>Safety Permit Number</th>
						<th>Mulai Bekerja</th>
						<th>Selesai Bekerja</th>
						<th>Tanggal Registrasi</th>
						<th style="width: 10px">Jml Personil</th>
						<th>Status Kerja</th>
						<th>PIC</th>
						<th style="width: 70px">Action</th>
					 </tr>
	                </thead>
	                <tbody>
	                  				<?php $no = 1; ?>
									<?php foreach($perusahaan as $key){ ?>
										<tr style="background-color: white">
											<td style="background-color: white"><?php echo $no;
											$no++; ?></td>
											<!-- <td><?php echo $key->id_perusahaan ?></td> -->
											<td><a style="text-decoration: none;color: black;" href="<?php echo site_url('Perusahaan/details/'.$key->id_perusahaan) ?>"><?php echo $key->nama_perusahaan ?></a></td>
											<td><?php echo $key->alias ?></td>
											<td><div id="trigger">
												<a style="text-decoration: none;color: black" target="_blank" class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" rel="zoom-id:zoom;opacity-reverse:true;">
												<?php echo $key->safety_permit_number ?>
												</a>
												</div>
												<div id="pop-up"><img style="width: 100px;" src="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" alt="" /></div>
											</td>
											<td><?php 
											echo date("d/m/Y", strtotime($key->mulai_bekerja)); ?></td>
											<td><?php echo date("d/m/Y", strtotime($key->finish_work)); ?></td>
											<td><?php echo date("d/m/Y", strtotime($key->reg_date)); ?></td>
											<td><?php echo $key->jumlah_personil ?></td>
											<td>
												<?php if ($key->finish_work < date("Y-m-d")){
													$sts = "Tidak Aktif";
													echo "Tidak Aktif";
												}
												else{
													$sts = "Aktif";
													echo "Aktif";
												} ?>
											</td>
											<td>
												<?php echo $key->pic ?>
											</td>
											<!-- <td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" rel="zoom-id:zoom;opacity-reverse:true;">
												<img style="width: 100px; height: 50px;" src="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" alt="" /> 
												</a>
											</td> -->
											<td>
												<!-- <div class="showback"> -->
									              <!-- Split button -->
									              <?php if ($sts == "Aktif"): ?>
									              <div class="btn-group">
									                <button type="button" class="btn btn-theme03">Action</button>
									                <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
									                  <span class="caret"></span>
									                  <span class="sr-only">Toggle Dropdown</span>
									                  </button>
									                <ul class="dropdown-menu" role="menu">
									                	<?php if ($level == 3): ?>
													      	<li>
													      		<a href="<?=site_url()?>/Perusahaan/update/<?php echo $key->id_perusahaan ?>">Edit</a>
													      	</li>
													    <?php endif ?>
													    <?php if ($level == 1): ?>
													    	<li><a href="<?=site_url()?>/Perusahaan/update/<?php echo $key->id_perusahaan ?>">Edit</a></li>
													    	<li><a href="<?php echo site_url('Perusahaan/delete/'.$key->id_perusahaan) ?>" onclick="return confirmDialog()">Delete</a></li>
													    	<li><a href="<?php echo site_url('Cetak/filter/'.$key->id_perusahaan) ?>">Print</a></li>
													    <?php endif ?>
													    <?php if ($level == 2): ?>
													    	<li><a href="<?php echo site_url('Cetak/filter/'.$key->id_perusahaan) ?>">Print</a></li>
													    <?php endif ?>
									                </ul>
									              </div>
									              <?php endif ?>
											</td>
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
	</body>
</html>