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
		<style media="print">
		/*html,body{
			height:297mm;
    		width:210mm;
		}*/
		body{
			-webkit-print-color-adjust: exact !important;
			print-color-adjust: exact !important;
				font-family: "CJ ONLYONE NEW title OTF Medium";
				src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);
			
		}
			@page {
		      size: landscape;
		      /*margin: 20mm 0 10mm 0;*/
		    }
		</style>
	</head>
	<body>
		<!-- <?php var_dump($person) ?> -->
		<?php $this->load->model('Person_model'); ?>
		<?php for ($j=0; $j < count($person); $j++) { 
			$pers[] = $this->Person_model->getPersonById($person[$j]);
		 } ?>
		 <?php for ($row=0; $row <  count($pers); $row++) { 
		 	for ($col=0; $col < 1; $col++) { 
		 		
				if (date("m", strtotime($pers[$row][$col]->finish_work)) == 1) {
				 	$m = "JANUARI";
				 	$bg = base_url('assets/warna/abu.jpg');
				 }elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 2) {
				 	$m = "FEBRUARI";
				 	$bg = base_url('assets/warna/biru.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 3) {
				 	$m = "MARET";
				 	$bg = base_url('assets/warna/biru_muda.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 4) {
				 	$m = "APRIL";
				 	$bg = base_url('assets/warna/coklat_muda.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 5) {
				 	$m = "MEI";
				 	$bg = base_url('assets/warna/hijau.jpeg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 6) {
				 	$m = "JUNI";
				 	$bg = base_url('assets/warna/kuning.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 7) {
				 	$m = "JULI";
				 	$bg = base_url('assets/warna/merah.png');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 8) {
				 	$m = "AGUSTUS";
				 	$bg = base_url('assets/warna/oren.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 9) {
				 	$m = "SEPTEMBER";
				 	$bg = base_url('assets/warna/pink.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 10) {
				 	$m = "OKTOBER";
				 	$bg = base_url('assets/warna/tosca.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 11) {
				 	$m = "NOVEMBER";
				 	$bg = base_url('assets/warna/ungu.jpg');
				 }
				 elseif (date("m", strtotime($pers[$row][$col]->finish_work)) == 12) {
				 	$m = "DESEMBER";
				 	$bg = base_url('assets/warna/biru_tua.jpg');
				 }
		 	}
		 } ?>
		<table style="text-align: center;">
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				    	<td style="padding-left: 30px"></td>
				    	<td style="font-size: 25px;width: 180px;font-family: 'Times New Roman'"><b><div style="background-image: url(<?php echo $bg; ?>) !important;"><?php echo $pers[$row][$col]->alias ?></div></b></td>
				  <?php }
			} ?>
				
			</tr>
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				<td style="padding-left: 30px;"></td>
				<td style="height: 30px;font-size: 1.3vw;font-family: 'Times New Roman'"><b><?php echo $pers[$row][$col]->nama ?></b></td>
			<?php }} ?>
			</tr>
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				<td style="padding-left: 30px"></td>
				<td><img style="width: 100px;height:160px;padding-top: 20px" src="<?php echo base_url('assets/uploads/'.$pers[$row][$col]->foto_diri) ?>" alt=""></td>
			<?php }} ?>
			</tr>
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				<td style="padding-left: 30px"></td>
				<td style="font-family: 'Times New Roman'">Reg.No: <?php echo $pers[$row][$col]->reg_num ?></td>
			<?php }} ?>
			</tr>
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				<td style="padding-left: 30px"></td>
				<td style="font-family: 'Times New Roman'">Masa Berlaku s/d :</td>
			<?php }} ?>
			</tr>
			<tr>
			<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
				<td style="padding-left: 30px"></td>
				<td>
					<b><div style="font-size: 15px;color: red !important;"><?php echo date("d ", strtotime($pers[$row][$col]->finish_work));
						echo $m;
						echo date(" Y", strtotime($pers[$row][$col]->finish_work)); 
						?></div>
					</b>
				</td>
			<?php }} ?>
			</tr>
			<tr>
				<td colspan="2" style="padding-top: 30px"></td>
			</tr>
			<tr>
				<?php for ($row = 0; $row < count($pers); $row++) {
				  	for ($col = 0; $col < 1; $col++) { ?>
					<td style="padding-left: 30px"></td>
					<td><img style="width: 200px" src="<?php echo base_url('assets/belakang.jpeg') ?>" alt=""></td>
				<?php }} ?>
			</tr>
		</table>

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
		 <script>
		    document.addEventListener("DOMContentLoaded", function (event) {
		      setTimeout(() => {
		        window.print()
		      }, 500);
		    });

		</script> 
	</body>
</html>