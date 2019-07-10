<html>
<head>
    <title>Login</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/logo.png">
    <!-- <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Dashio/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/Dashio/css/style-responsive.css" rel="stylesheet">
    <style>
        body{
                font-family: "CJ ONLYONE NEW title OTF Medium";
                src: url(<?php echo base_url('assets/CJ_ONLYONE_NEW_TITLE_OTF_MEDIUM.otf') ?>);
            }
    </style>
</head>
<body>
<br>
<div id="login-page">
    <div class="container">
        <br><br><br><br><br>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">       
                <div class="panel-heading">
                <legend>
                    <center>
                    <img width="60px" src="<?php echo base_url(); ?>assets/logo.png" alt=""><br>
                    <h3 style="color: black"><b>ID CARD PRINTING</b></h3>
                    <h4>CONTRACTOR</h4>
                    <!-- <h4 style="color: black"><b>PT CHEIL JEDANG INDONESIA</b></h4> -->
                    <h3 style="color: #00d8ff"><b>LOGIN</b></h3></center>
                </legend>
                
                    <div class="login-wrap">
                        <?php echo form_open('login'); ?>
                        <?php echo validation_errors() ?>
                        <div class="form-group">
                                <label for=""><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                                <label for=""><span class="glyphicon glyphicon-lock"></span> Password</label>
                                <input type="Password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-theme btn-block" name="Login"><i class="fa fa-lock"></i> Login</button>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?php echo base_url(); ?>assets/Dashio/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/Dashio/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/Dashio/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("<?php echo base_url(); ?>assets/bg.jpg", {
      speed: 500
    });
  </script>
</body>
</html>