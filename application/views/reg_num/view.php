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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
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
									<li><a class="nav-link" href="<?php echo site_url('Home/create') ?>">Tambah Perusahaan <span class="sr-only">(current)</span></a></li>
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
					<section id="main-content">
				      <section class="wrapper">
				        <h3 class="fontstyle"><b>Data Registration Number</b></h3>
				        <div class="row mb">
				          <!-- page start-->
				          <div class="content-panel col-md-12">
				            <div class="adv-table">
				            	<?php if (count($reg_num) == 0): ?>
				            		<a class="btn btn-theme03 fontstyle" href="<?php echo site_url('Reg_num/create') ?>">Tambah Registration Number</a>
				            	<?php endif ?>
				            	<br>
				            	<br>

				              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example">
								<thead>
									<tr>
										<th>ID</th>
										<th>Registration Number</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($reg_num as $key){ ?>
									<tr>
										<!-- <td><?php echo $key->id_perusahaan ?></td> -->
										<td><?php echo $key->id ?></td>
										<td><?php echo $key->reg_number ?></td>
										<td>
										      <a href="<?=site_url()?>/Reg_num/update/<?php echo $key->id ?>"><button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glypchon glypchon-pencil">Edit</span></button></a>
										      <a class="btn btn-danger"  href="<?php echo site_url('Reg_num/delete/'.$key->id) ?>" OnClick="return confirmDialog()">Delete</a>
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


		<!-- jQuery -->
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
		  </section>
	</body>
</html>