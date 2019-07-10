<!DOCTYPE html>
<html>
<head>
	<title>Capture || Codeigniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form id="register" name="frm">
					<center>
						<div id="my_camera"></div>
					</center>
					<center><input type="text" name="nama_foto" id="nama_foto" class="form-control" value="nama_foto"></center>
					<input type="hidden" name="uri" id="uri" value="<?php echo $this->uri->segment(3) ?>">
					<br>
					<hr>
					<button type="submit" class="btn btn-block">Take Photo</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	<script language="JavaScript">
			Webcam.set({
			width: 640,
			height: 480,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	<script type="text/javascript">
		$('#register').on('submit', function (event) {
			event.preventDefault();
			var image = '';
			var nama_foto = $('#nama_foto').val();
			Webcam.snap( function(data_uri) {
				image = data_uri;
			});
			$.ajax({
				url: '<?php echo site_url("Capture/capture_diri");?>',
				type: 'POST',
				dataType: 'json',
				data: {nama_foto:nama_foto,image:image},
			})
			.done(function(data) {
				if (data > 0) {
					opener.document.f1.nama_foto.value = document.frm.nama_foto.value;
					alert('Take Photo Berhasil');
					$('#register')[0].reset();
					
					window.close();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
		// function post_value(){
		// 	opener.document.f1.fk_foto.value = document.frm.fk_foto.value;
		// 	 self.close();
		// 	}
	</script>
</body>
</html>