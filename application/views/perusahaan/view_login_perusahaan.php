<!DOCTYPE html>
<html lang="">
	<head>
		<link rel="icon" href="<?php echo base_url(); ?>assets/logo.png">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Contractor PT CJI</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
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
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Data Contractor PT CJI</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<?php if ($level == 3): ?>
								<!-- <li><a class="nav-link" href="<?php echo site_url('Home/create') ?>">Tambah Perusahaan <span class="sr-only">(current)</span></a></li> -->
								<li class="active"><a class="nav-link" href="<?php echo site_url('Home/report_perusahaan') ?>">Data Perusahaan</a></li>
								<li><a class="nav-link" href="<?php echo site_url('Home/report_person') ?>">Data Personil</a></li>
							<?php endif ?>
							<?php if ($level == 1): ?>
								<li class="nav-item active"><a class="nav-link" href="<?php echo site_url('Perusahaan') ?>">Data Perusahaan <span class="sr-only">(current)</span></a></li>
								<li><a class="nav-link" href="<?php echo site_url('Person') ?>">Data Personil</a></li>
								<li><a class="nav-link" href="<?php echo site_url('User') ?>">Data User</a></li>
							<?php endif ?>
							<?php if ($level == 2): ?>
								<li class="nav-item active"><a class="nav-link" href="<?php echo site_url('Perusahaan') ?>">Data Perusahaan <span class="sr-only">(current)</span></a></li>
								<li><a class="nav-link" href="<?php echo site_url('Person') ?>">Data Personil</a></li>
							<?php endif ?>
							<li><a class="nav-link" href="<?php echo site_url('Login/logout') ?>">Logout</a></li>
						</ul>
						
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
						<center><legend>Data Perusahaan</legend></center>
						<div class="col-12">
						<div class="table-responsive">
							<table class="table" id="example">
								<thead>
									<tr>
										<th>Nama Perusahaan</th>
										<th>Alias</th>
										<th>Safety Permit Number</th>
										<th>Mulai Bekerja</th>
										<th>Selesai Bekerja</th>
										<th>Tanggal Registrasi</th>
										<th>Jumlah Personil</th>
										<th>PIC</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($perusahaan as $key){ ?>
									<tr>
										<!-- <td><?php echo $key->id_perusahaan ?></td> -->
										<td><a style="text-decoration: none;color: black" href="<?php echo site_url('Perusahaan/details/'.$key->id_perusahaan) ?>"><?php echo $key->nama_perusahaan ?></a></td>
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
										<td><?php echo $key->pic ?></td>
										<!-- <td><a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" rel="zoom-id:zoom;opacity-reverse:true;">
											<img style="width: 100px; height: 50px;" src="<?=base_url("assets/uploads")."/".$key->foto_safety_permit?>" alt="" /> 
											</a>
										</td> -->
										<td>
										     
										
										      <?php if ($level == 2): ?>

										      	<a class="label label-default" href="<?php echo site_url('Cetak/filter/'.$key->id_perusahaan) ?>"><span class="glyphicon glyphicon-print"></span></a>
										      <?php endif ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>

							</table>
						</div>
						</div>
				</div>
			
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script type="text/javascript">
		$(document).ready(function() {
    		$('#example').DataTable();
		} );	
		</script>
		<!-- <script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();   
		});
		</script> -->
		<script>
			$(function() {
			  $('div#trigger').hover(function() {
			    $('div#pop-up').show();
			  }, function() {
			    $('div#pop-up').hide();
			  });
			});
		</script>
	</body>
</html>